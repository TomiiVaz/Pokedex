<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokedex - Personaje</title>

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
        <div class="container-fluid d-flex">
            <a class="navbar-brand font" href="index.php">
                <img src="img/pokebola.png" class="m-2" style="width: 50px;">
            </a>
            <h1 class="text-white ">Pokedex</h1>

            <a class="navbar-brand font" href="index.php">
                <img src="img/pokebola.png" class="m-2" style="width: 50px;">
            </a>


        </div>
    </nav>


    <!-- /NavBar-->

</header>


<main>

    <h1 class="m-5 text-white text-center">Modificar Datos</h1>

    <div style='min - height: 120px;' class="container">

        <form class='text-center d-flex flex-column px-5 px-5 py-2 border-0'
              method='post'
              action='modificar.php'
              enctype='multipart/form-data'>
            <input class='my-2 form-control' type='text' name='nombreNuevo' id='nombreNuevo'
                   placeholder='Ingrese el nombre de Pokemon'>
            <select name='tipoNuevo' class='form-control my-2'>
                <option value='Default' selected hidden>Seleccionar un tipo</option>
                <option value='Aire'>Aire</option>
                <option value='Fuego'>Fuego</option>
                <option value='Tierra'>Tierra</option>
                <option value='Viento'>Viento</option>
            </select>
            <input class='my-2 form-control' type='number' name='numeroNuevo' id='numeroNuevo'
                   placeholder='Ingrese el numero de Pokemon'>
            <div class='my-2'>
                <input type='file' class='form-control' aria-label='file example' name='imagenNueva'>
                <div class='invalid-feedback'>Example invalid form file feedback</div>
            </div>
            <input class='my-2 form-control' type='text' name='nombreImagen' id='nombreImagen'
                   placeholder='Ingrese nombre de la imagen'>

            <input class='my-2 form-control' type='text' name='descripcion' id='descripcion'
                   placeholder='Ingrese descripcion'>
            <input class='invisible' type='text' value='<?php
            $id = $_GET["id"];
            echo "$id";

            ?>' name='invisible'>

            <button type='submit' class='btn btn-success'>Modificar</button>
        </form>
        <div class="container mt-5 d-flex justify-content-center">
            <a href="index.php" class="mt-3">
                <button type="button" class="btn btn-warning">Volver</button>
            </a>
        </div>
    </div>

</main>

<footer>
    <p class="text-white text-center mt-5">Pokedex</p>


</footer>


<!-- Script de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>


