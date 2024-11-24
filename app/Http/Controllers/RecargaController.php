<?php

namespace App\Http\Controllers;

use App\Models\Recarga;
use App\Models\Tarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class RecargaController extends Controller
{
    protected $paypalService;

    public function __construct(PayPalClient $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    // Obtener los datos del cliente y la tarjeta
    public function obtenerDatosDelCliente($id)
    {
        if (!is_numeric($id)) {
            return response()->json([
                'success' => false,
                'error' => 'El ID de la tarjeta no es válido.',
            ], 400);
        }

        try {
            $tarjeta = Tarjeta::findOrFail($id);

            return response()->json([
                'success' => true,
                'usuario' => [
                    'id' => $tarjeta->id,
                    'nombre' => $tarjeta->nombre,
                    'saldo' => $tarjeta->saldototal,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error al buscar la tarjeta.',
            ], 500);
        }
    }

    // Realizar recarga normal (manual)
    public function realizarRecarga(Request $request)
    {
        $validated = $request->validate([
            'tarjeta_id' => 'required|exists:tarjeta,id',
            'monto' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();

        try {
            $tarjeta = Tarjeta::findOrFail($validated['tarjeta_id']);
            $tarjeta->saldototal += $validated['monto'];
            $tarjeta->save();

            Recarga::create([
                'monto' => $validated['monto'],
                'fecha' => now(),
                'tarjeta_id' => $tarjeta->id,
                'usuario_id' => Auth::id(),
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'mensaje' => 'Recarga realizada con éxito.',
                'nuevoSaldo' => $tarjeta->saldototal,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error en realizarRecarga: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'error' => 'Error al realizar la recarga.',
            ], 500);
        }
    }

    // Iniciar recarga con PayPal
    public function iniciarRecarga(Request $request)
    {
        $validated = $request->validate([
            'tarjeta_id' => 'required|exists:tarjeta,id',
            'monto' => 'required|numeric|min:1',
        ],  [
            'tarjeta_id.required' => 'El ID de tarjeta es obligatorio.',
            'tarjeta_id.exists' => 'El ID de tarjeta no es válido.',
            'monto.required' => 'El monto es obligatorio.',
            'monto.numeric' => 'El monto debe ser un número.',
            'monto.min' => 'El monto debe ser al menos 1.',
        ]);

        $tarjeta = Tarjeta::findOrFail($validated['tarjeta_id']);
        $monto = $validated['monto'];

        // Si se selecciona PayPal
        if ($request->has('redirigir_paypal') && $request->redirigir_paypal == 'on') {
            try {
                $this->paypalService->setApiCredentials(config('paypal'));
                $accessToken = $this->paypalService->getAccessToken();
                $this->paypalService->setAccessToken($accessToken);

                $order = $this->paypalService->createOrder([
                    "intent" => "CAPTURE",
                    "purchase_units" => [
                        [
                            "amount" => [
                                "currency_code" => "MXN",
                                "value" => $monto,
                            ],
                            "description" => "Recarga de saldo para tarjeta ID {$tarjeta->id}",
                        ],
                    ],
                    "application_context" => [
                        "cancel_url" => route('paypal.cancel'),
                        "return_url" => route('paypal.success'),
                    ],
                ]);

                if (isset($order['links'])) {
                    foreach ($order['links'] as $link) {
                        if ($link['rel'] === 'approve') {
                            session(['paypal_payment_id' => $tarjeta->id]); // Guarda el ID de la tarjeta temporalmente
                            return redirect($link['href']);
                        }
                    }
                }
            } catch (\Exception $e) {
                Log::error('Error al crear el pedido en PayPal: ' . $e->getMessage());
                return redirect()->route('recargas')->with('error', 'Error al procesar con PayPal.');
            }
        }

        // Recarga manual
        return $this->realizarRecarga($request);
    }

    // Confirmar el pago de PayPal y actualizar saldo
    public function success(Request $request)
    {
        $orderId = $request->get('token');

        if (empty($orderId)) {
            return redirect()->route('recargas')->with('error', 'Error al procesar el pago.');
        }

        try {
            $this->paypalService->setApiCredentials(config('paypal'));
            $accessToken = $this->paypalService->getAccessToken();
            $this->paypalService->setAccessToken($accessToken);

            $result = $this->paypalService->capturePaymentOrder($orderId);

            if ($result['status'] === 'COMPLETED') {
                $tarjetaId = session('paypal_payment_id');
                $monto = $result['purchase_units'][0]['amount']['value'];

                $tarjeta = Tarjeta::findOrFail($tarjetaId);
                $tarjeta->saldototal += $monto;
                $tarjeta->save();

                Recarga::create([
                    'monto' => $monto,
                    'fecha' => now(),
                    'tarjeta_id' => $tarjeta->id,
                    'usuario_id' => Auth::id(),
                ]);

                return redirect()->route('recargas')->with('success', 'Recarga realizada con éxito.');
            }

            return redirect()->route('recargas')->with('error', 'El pago no fue aprobado.');
        } catch (\Exception $e) {
            Log::error('Error al capturar el pago de PayPal: ' . $e->getMessage());
            return redirect()->route('recargas')->with('error', 'Error al completar el pago.');
        }
    }

    // Cancelar la recarga de PayPal
    public function cancel()
    {
        return redirect()->route('recargas')->with('error', 'El pago fue cancelado.');
    }
}
