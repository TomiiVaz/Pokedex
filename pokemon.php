<?php
include_once("MySqlDatabase.php");
$personaje = $_GET["name"];

$config = parse_ini_file('config.ini');
$database = new MySqlDatabase($config["host"], $config["usuario"], $config["clave"], $config["base"]);

$pokemon = $database->query("SELECT * FROM pokemon where nombre = '$personaje'");

foreach ($pokemon as $pokemon) {

    $numero = $pokemon['numero'];
    $nombre = $pokemon['nombre'];
    $tipo = $pokemon["tipo"];
    $descripcion = $pokemon["descripcion"];
    $imagenCargada = $pokemon["imagen"];
}
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

    <div class="container mt-5">

        <div class="row">


            <div class="col-sm-4">
                <?php

                echo "<img class='img-fluid' src='img/". $imagenCargada .".svg'>"
                ?>

            </div>

            <div class="col-sm-8">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <?php

                            echo "<img src='img/". $tipo .".svg' class='m-2' style='width: 50px;'>"
                            ?>
                            
                        </div>
                        <div class="col-2">
                            <h2 class="d-inline text-white">
                            <?php

                            echo "$numero"
                            ?>
                            </h2>
                        </div>
                        <div class="col-4">
                            <h2 class="d-inline text-white">
                                <?php

                                echo "$nombre "
                                ?>

                            </h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p class="text-white">
                                <?php

                                echo "$descripcion "
                                ?>
                            </p>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

    <!-- Boton VOLVER-->
    <div class="container mt-5 d-flex justify-content-center">
        <a href="index.php" class="mt-3"><button type="button" class="btn btn-warning">Volver</button></a>
    </div>


</main>

<footer>
    <p class="text-white text-center mt-5">Pokedex</p>


</footer>


<!-- Script de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</body>
</html>


