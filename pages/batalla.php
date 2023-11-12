<?php include('../partials/header.php') ?>
<?php include('../Pokemon.php') ?>

<!-- Contenido superior -->
<div style="background-image: url(https://images5.alphacoders.com/608/608323.png); background-position: center;
    background-repeat: no-repeat;
    background-size: cover; width: auto; min-height: 90vh;">

    <a href="../index.php" class="btn btn-primary ms-2 mt-2">Inicio</a>
    <div class="row text-center pt-3">
        <div class="col-4">
            <span class="fs-1">
                🔴🔴🔴🔴🔴
            </span>
        </div>
        <div class="col-4">
            <!-- Contenido -->
            <div id="temporizador" class="fs-1"></div>
            <button id="pelea" class="btn btn-success">¡PELEAR!</button>
        </div>
        <div class="col-4">
            <span class="fs-1">
                🔴🔴🔴🔴🔴
            </span>
        </div>
    </div>

    <?php $equipo_rival = equipo_rival() ?>

    <div class="row">
        <div class="col-4 d-flex flex-column align-items-center justify-content-end" style="min-height: 90vh;" id="usuario-container">
            <!-- Contenido del usuario -->
            <img src="" alt="Imagen del usuario" id="usuario-imagen" style="width: 500px; height: auto;">
        </div>
        <div class="col-4">
            <!-- Contenido -->
        </div>
        <div class="col-4 d-flex flex-column align-items-center justify-content-end" style="min-height: 80vh;" id="rival-container">
            <!-- Contenido del rival -->
            <img src="" alt="Imagen del rival" id="rival-imagen" style="width: 500px; height: auto;">
        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var cinturonUsuario = <?php echo json_encode($cinturon); ?>;
            var cinturonRival = <?php echo json_encode($equipo_rival); ?>;
            var index = 0;

            // Función para mostrar la siguiente pareja
            function mostrarSiguientePareja() {
                document.getElementById('usuario-imagen').src = cinturonUsuario[index].imagen;
                document.getElementById('rival-imagen').src = cinturonRival[index].imagen;
                index++;

                // Reiniciar el índice si se han mostrado todas las parejas
                if (index >= cinturonUsuario.length) {
                    index = 0;
                }
            }

            // Mostrar las dos primeras parejas al cargar la página
            mostrarSiguientePareja();

            // Función para iniciar el temporizador
            function iniciarTemporizador() {
                var segundos = 5;
                var temporizador = document.getElementById('temporizador');

                function actualizarTemporizador() {
                    temporizador.innerText = segundos;
                    segundos--;

                    // Mostrar la siguiente pareja cuando el temporizador llega a 0
                    if (segundos < 0) {
                        mostrarSiguientePareja();
                        clearInterval(intervalo);
                        temporizador.innerText = ''; // Limpiar el temporizador
                    }
                }

                actualizarTemporizador(); // Mostrar el primer segundo inmediatamente

                // Actualizar el temporizador cada segundo
                var intervalo = setInterval(actualizarTemporizador, 1000);
            }

            // Agregar evento click al botón "PELEAR"
            document.getElementById('pelea').addEventListener('click', function () {
                iniciarTemporizador();
            });
        });
    </script>
</div>









<?php include('../partials/footer.php') ?>