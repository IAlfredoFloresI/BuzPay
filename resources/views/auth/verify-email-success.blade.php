<x-guest-layout>
    <div class="verification-success">
        <h1>¡Cuenta activada con éxito!</h1>
        <p>Su cuenta ha sido activada y ahora puede cerrar esta ventana.</p>
        <p>¡Gracias por formar parte de PayBus!</p>
    </div>

    <script>
        // Enviar mensaje a la ventana de verificación original para que se recargue
        window.opener.postMessage({ message: 'verified' }, '*');
    </script>
</x-guest-layout>
