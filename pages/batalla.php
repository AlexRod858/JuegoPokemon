<?php include('../partials/header.php') ?>
<?php include('../Pokemon.php') ?>

<!-- Contenido superior -->
<div style="background-image: url(https://images5.alphacoders.com/608/608323.png); background-position: center;
    background-repeat: no-repeat;
    background-size: cover; width: auto; min-height: 90vh;">

    <a href="../index.php" class="btn btn-primary ms-2 mt-2">Inicio</a>
    <div class="row text-center pt-3">
        <div class="col-4">
            <span id="vidas" class="fs-1">
            </span>
        </div>
        <div class="col-4">
            <!-- Contenido -->
            <div id="resultado" class="fs-1"></div>
            <div id="temporizador" class="fs-1"></div>
            <button id="pelea" class="btn btn-success">¡PELEAR!</button>
        </div>
        <div class="col-4">
            <span id="vidas_rival" class="fs-1">
            </span>
        </div>
    </div>

    <?php $equipo_rival = equipo_rival() ?>

    <div class="row">
        <div class="col-4 d-flex flex-column align-items-center justify-content-end" style="min-height: 80;" id="usuario-container">
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
        document.addEventListener("DOMContentLoaded", function() {
            var cinturonUsuario = <?php echo json_encode($cinturon); ?>;
            var cinturonRival = <?php echo json_encode($equipo_rival); ?>;
            var index = 0;
            var temporizadorIntervalo;

            // Función para mostrar la pareja actual
            function mostrarParejaActual() {
                // Limpiar el resultado de la batalla anterior
                document.getElementById('resultado').innerText = '';

                // Mostrar la pareja actual
                document.getElementById('usuario-imagen').src = cinturonUsuario[index].imagen;
                document.getElementById('rival-imagen').src = cinturonRival[index].imagen;
            }

            /////////////////////////////////////
            /////////////////////////////////////
            /////////////////////////////////////

            // Función para calcular el promedio de ataque, vida y defensa
            function calcularPromedio(pokemon) {
                if (pokemon && pokemon.ataque !== undefined && pokemon.vida !== undefined && pokemon.defensa !== undefined) {
                    var ataque = pokemon.ataque;
                    var vida = pokemon.vida;
                    var defensa = pokemon.defensa;

                    return (ataque + vida + defensa) / 3;
                } else {
                    console.error('Error: Pokémon indefinido o falta alguna propiedad.');
                    return 0; // o algún valor predeterminado
                }
            }

            // Función para determinar el ganador y actualizar visualmente
            function determinarGanador() {
                var usuario = cinturonUsuario[index];
                var rival = cinturonRival[index];

                var promedioUsuario = calcularPromedio(usuario);
                var promedioRival = calcularPromedio(rival);

                // Determinar el ganador y actualizar visualmente
                var resultado = document.getElementById('resultado');
                if (promedioUsuario > promedioRival) {
                    resultado.innerHTML = '<span style="color: green;">¡Ganaste!</span>';
                    let vidas = document.getElementById('vidas');
                    vidas.innerHTML += '🟢';
                } else if (promedioUsuario < promedioRival) {
                    resultado.innerHTML = '<span style="color: red;">¡Perdiste!</span>';
                    let vidas = document.getElementById('vidas');
                    vidas.innerHTML += '🔴';
                } else {
                    resultado.innerHTML = '<span style="color: blue;">¡Empate!</span>';
                    let vidas = document.getElementById('vidas');
                    vidas.innerHTML += '🔵';
                }
            }
            /////////////////////////////////////
            /////////////////////////////////////
            /////////////////////////////////////
            /////////////////////////////////////

            // Función para iniciar el temporizador
            function iniciarTemporizador() {
                var segundos = 5;
                var temporizador = document.getElementById('temporizador');

                function actualizarTemporizador() {
                    temporizador.innerText = segundos;
                    segundos--;

                    // Mostrar el resultado cuando el temporizador llega a 0
                    if (segundos < 0) {
                        determinarGanador();
                        clearInterval(temporizadorIntervalo);
                        temporizador.innerText = ''; // Limpiar el temporizador
                    }
                }

                mostrarParejaActual(); // Mostrar la primera pareja al iniciar
                actualizarTemporizador(); // Mostrar el primer segundo inmediatamente

                // Actualizar el temporizador cada segundo
                temporizadorIntervalo = setInterval(actualizarTemporizador, 1000);
            }
            /////////////////////////////////////
            /////////////////////////////////////
            /////////////////////////////////////


            // Llamar a iniciarTemporizador al cargar la página
            iniciarTemporizador();

            // Agregar evento click al botón "PELEAR"
            document.getElementById('pelea').addEventListener('click', function() {
                index++; // Mover al siguiente índice al hacer clic en el botón
                mostrarParejaActual();
                iniciarTemporizador();
            });
            /////////////////////////////////////
            /////////////////////////////////////
            /////////////////////////////////////

        });
    </script>
</div>


<?php include('../partials/footer.php') ?>