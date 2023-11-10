<?php include('partials/header.php') ?>
<?php session_start(); ?>
<?php include('Pokemon.php') ?>
<header>
    <nav class="navbar navbar-expand-lg bg-danger rounded ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">POKE-mooon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <h5 class="px-2">0/5</h5>
                <!--  -->
                <form action="cinturon.php" method="POST" class="d-flex gap-2" role="search">
                    <input name="input" class="form-control me-2" type="search" placeholder="Pikachu" aria-label="Search">
                    <button name="add" class="btn btn-outline-primary" type="submit">Añadir</button>
                    <button class="btn btn-outline-primary" type="submit">Random</button>
                </form>
                <!--  -->
            </div>
        </div>
    </nav>
</header>
<!-- -------------------------- -->
<div style="background-image: url(https://i.pinimg.com/originals/a1/86/a8/a186a8aff83506c70b0b307e3fb062c8.png); background-position: center;
  background-repeat: no-repeat;
  background-size: cover; min-height: 92vh;">
    <div class="row w-100 d-flex align-items-center" style="min-height: 75vh;">
        <!-- ----------------------- -->
        <div class="col-md-4 col-sm-12 d-flex flex-column align-items-start justify-content-center rounded p-4">
            <!-- Contenido de la primera columna -->
            <div class="bg-warning p-3 rounded shadow-lg">
                <h2 class="text-center mb-3">Cinturón</h2>
                <hr>
                <ul class="list-group">
            
                        <li class="list-group-item d-flex justify-content-between align-items-center">







                            <span class="me-2"><?php '<pre>' . print_r($cinturon, true) . '</pre>'; ?></span>

















                            <span>
                                <!-- Puedes agregar enlaces o botones para acciones, por ejemplo, un botón de eliminar -->
                                <a href="#" class="me-1">Eliminar</a>
                            </span>
                            <span>
                                <!-- Agrega aquí más información según tus necesidades, por ejemplo, la imagen, ataque, vida, defensa -->
                                <!-- <img src="<?php echo $pokemon->imagen; ?>" alt="Imagen de <?php echo $pokemon->nombre; ?>" style="width: 50px; height: auto;">
                                <span class="ms-2">Ataque: <?php echo $pokemon->ataque; ?></span>
                                <span class="ms-2">Vida: <?php echo $pokemon->vida; ?></span>
                                <span class="ms-2">Defensa: <?php echo $pokemon->defensa; ?></span> -->
                            </span>
                        </li>
     
                </ul>

            </div>
        </div>
        <!-- -------------------------- -->
        <div class="col-md-4 col-sm-12 text-center d-flex align-items-center justify-content-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/70/Street_Fighter_VS_logo.png" alt="">
        </div>
        <!-- -------------------------- -->
        <div class="col-md-4 col-sm-12 text-center d-flex align-items-center justify-content-center">
            <!-- Contenido de la tercera columna -->
            <img src="https://cdn-icons-png.flaticon.com/512/57/57108.png" alt="">
        </div>
        <!-- ------------------------- -->
    </div>
    <!-- ------------------------- -->
    <!-- ------------------------- -->
    <!-- ------------------------- -->

    <div class="row align-items-center">
        <div class="col text-center d-flex flex-column">
            <button class="btn btn-warning btn-lg mx-auto shadow-lg">Comenzar</button>
            <button type="button" class="btn btn-danger btn-lg mx-auto mt-2 shadow-lg">Salir</button>
        </div>
    </div>

    <!-- ------------------------- -->
    <!-- ------------------------- -->
    <!-- ------------------------- -->

</div>



<?php include('partials/footer.php') ?>