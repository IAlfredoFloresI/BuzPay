<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FaceAuthController extends Controller
{
    public function authenticate(Request $request)
    {
        try {
            // Obtener el descriptor desde la solicitud
            $descriptor = $request->input('descriptor');
            
            // Verificar que el descriptor no esté vacío y sea un array
            if (!$descriptor || !is_array($descriptor)) {
                return response()->json(['status' => 'failed', 'message' => 'Descriptor facial no válido.'], 400);
            }

            // Verificar que el descriptor contenga los datos esperados (ejemplo: longitud)
            if (count($descriptor) < 1) {
                return response()->json(['status' => 'failed', 'message' => 'El descriptor está vacío.'], 400);
            }

            // Buscar usuarios en la base de datos
            $users = User::all();
            foreach ($users as $user) {
                $savedDescriptor = json_decode($user->face_descriptor, true); // Convertir a array

                // Verificar si los descriptores coinciden
                if ($this->compareDescriptors($savedDescriptor, $descriptor)) {
                    Auth::login($user); // Loguear al usuario si coincide
                    return response()->json(['status' => 'success', 'redirect' => url('/admin')]);
                }
            }

            return response()->json(['status' => 'failed', 'message' => 'No se encontró coincidencia.'], 401);

        } catch (\Exception $e) {
            // Capturar cualquier error y devolverlo
            Log::error("Error en FaceAuthController: " . $e->getMessage());
            return response()->json(['status' => 'failed', 'message' => 'Hubo un error interno.'], 500);
        }
    }
    
    private function compareDescriptors($savedDescriptor, $currentDescriptor)
    {
        // Verificar que ambos descriptores sean arrays antes de contar
        if (!is_array($savedDescriptor) || !is_array($currentDescriptor)) {
            return false;
        }
    
        // Comprobamos si ambos descriptores están bien definidos
        if (count($savedDescriptor) !== count($currentDescriptor)) {
            return false;
        }
    
        $distance = 0;
        for ($i = 0; $i < count($savedDescriptor); $i++) {
            $distance += pow($savedDescriptor[$i] - $currentDescriptor[$i], 2);
        }
        $distance = sqrt($distance);
    
        // Umbral de coincidencia (ajústalo si es necesario)
        return $distance < 0.6;
    }
    
    
}
