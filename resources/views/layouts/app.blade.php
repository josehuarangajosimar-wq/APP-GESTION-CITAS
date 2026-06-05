<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SANAR + | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 antialiased">
    
    @yield('content')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            
            // 1. Manejo de Alertas Flash de Laravel (Toasts)
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            @if(Session::has('success'))
                Toast.fire({ icon: 'success', title: '{{ Session::get('success') }}' });
            @endif
            @if(Session::has('error'))
                Toast.fire({ icon: 'error', title: '{{ Session::get('error') }}' });
            @endif
            @if(Session::has('info'))
                Toast.fire({ icon: 'info', title: '{{ Session::get('info') }}' });
            @endif

            // 2. Lógica Funcional para TODOS los botones "Eliminar" del sistema
            const formsEliminar = document.querySelectorAll('.form-eliminar');
            formsEliminar.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Detenemos el envío inmediato
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "Esta acción eliminará el registro permanentemente.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#52B7A0',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit(); // Solo si confirma, enviamos el POST al controlador
                        }
                    })
                });
            });
        });
    </script>
</body>
</html>