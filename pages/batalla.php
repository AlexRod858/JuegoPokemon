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
            var index = 0; // Cambiado a 1 para que inicie con la segunda pareja

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

            // Mostrar la primera pareja al cargar la página
            mostrarSiguientePareja();

            // Agregar evento click al botón "PELEAR"
            document.getElementById('pelea').addEventListener('click', function () {
                mostrarSiguientePareja();
                // iniciarTemporizador(); 
            });
        });
    </script>
</div>










<?php include('../partials/footer.php') ?>