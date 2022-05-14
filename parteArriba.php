<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokedex</title>

    <!-- Bootstrap CSS Jquery Google Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons+Round"> <!-- google icons-->
    <link rel="stylesheet" href="css/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="js/jquery-3.6.0.min.js"></script>

    <!-- Favicon-->
    <link rel="icon" href="img/favicon.ico">
</head>

<body class="bg-dark">

<header>

    <!-- NavBar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand font" href="index.php">
                <img src="img/pokebola.png" class="m-2" style="width: 50px;">

            </a>
            <h1 class="d-flex align-items-center text-white ">Pokedex</h1>
            <button class='navbar-toggler' type='button'
            ' data-bs-toggle='collapse' data-bs-target='#navbarNav'
            aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNav'>
                <ul class='navbar-nav ms-auto'>
                    <!--                    Agrego form para tener un action y un submit. No se rompio el codigo en cuanto frontend (web)-->
                    <?php
                    if (!isset($_SESSION["logueado"]) != 1) {
                        include_once("validarLogout.php");
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION["logueado"])) {
                        echo "<form class='d-flex'
                          method='post'
                          action='validar.php'>";
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION["logueado"])) {
                        echo "
                            <li class='nav-item m-1'>
                            <input type='text' class='form-control' id='usuario' placeholder='Ingrese usuario'
                                   name='usuario'>
                        </li>";
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION["logueado"])) {
                        echo "
                            <li class='nav-item m-1'>
                            <input type='password' class='form-control' id='password' placeholder='Ingrese password'
                                   name='clave'>
                        </li>";
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION["logueado"])) {
                        echo "
                            <li class='nav-item m-1 d-grid gap-2'>
                            <button type='submit' class='btn btn-success'>Ingresar</button>
                        </li>";
                    }
                    ?>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /NavBar-->

</header>


<main>
    <form method="get"
          action="./procesar.php"
          class="mb-4">
        <div class="container-fluid mt-5">
            <div class="input-group mb-3">

                <input type="text" class="form-control" name="busqueda" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default"
                       placeholder="Ingrese el nombre, el tipo o numero de pokemon">
                <button type="submit" class="btn btn-success">Quien es este pokemon?</button>

            </div>
        </div>
    </form><!-- Boton pokemon nuevo-->
    <?php
    if (isset($_SESSION["logueado"]) == 1) {

        echo
        "
        <div class='container-fluid d-grid gap-2 mt-4 mt-5 mb-5' >
            <button type='button' class='btn btn-primary' data-bs-toggle='collapse' data-bs-target='#collapseWidthExample' aria-expanded='false' aria-controls='collapseWidthExample'>Nuevo Pokemon</button>
        </div>
        <div style='min - height: 120px;' class='container-fluid' >
            <div class='collapse collapse - horizontal border-0' id='collapseWidthExample'>
                <div class='card card - body border-0' style=''width: 300px;'>  
                    <form class='text-center d-flex flex-column px-5 px-5 py-2 bg-dark border-0'
                          method='post'
                          action='alta.php' 
                          enctype='multipart/form-data'>
                        <input class='my-2 form-control' type='text' name='nombreNuevo' id='nombreNuevo' placeholder='Ingrese el nombre de Pokemon'>
                        <select name='tipoNuevo' class='form-control my-2'>
                            <option value='Default' selected hidden>Seleccionar un tipo</option>
                            <option value='Aire'>Aire</option>
                            <option value='Fuego'>Fuego</option>
                            <option value='Tierra'>Tierra</option>
                            <option value='Viento'>Viento</option>
                        </select>
                        <input class='my-2 form-control' type='number' name='numeroNuevo' id='numeroNuevo' placeholder='Ingrese el numero de Pokemon'>
                        <div class='my-2'>
                            <input type='file' class='form-control' aria-label='file example' name='imagenNueva'>
                            <div class='invalid-feedback'>Example invalid form file feedback</div>
                        </div>
                        <input class='my-2 form-control' type='text' name='nombreImagen' id='nombreImagen' placeholder='Ingrese nombre de la imagen'>
                        <input class='my-2 form-control' type='text' name='nuevaDescripcion' id='nuevaDescripcion' placeholder='Ingrese descripcion del pokemon'>
                        <button type='submit' class='btn btn-success my-2'>Agregar</button>
                    </form>
                </div>
            </div>
        </div>
        ";
    }
    ?>
    <!-- /Boton pokemon nuevo-->

    <!-- Tabla-->
    <div class="container-fluid">
        <table class="table table-dark table-striped table-hover mt-5">
            <thead>
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Tipo</th>
                <th scope="col">Numero</th>
                <th scope="col">Nombre</th>
                <?php
                if (isset($_SESSION["logueado"]) == 1) {

                    echo
                    "<th scope='col'>Accion</th>";
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <tr>