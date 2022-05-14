<?php
session_start();
include_once("MySqlDatabase.php");

$config = parse_ini_file('config.ini');
$database = new MySqlDatabase($config["host"], $config["usuario"], $config["clave"], $config["base"]);

$numeroNuevo =$_POST['numeroNuevo'];
$nombreNuevo =$_POST['nombreNuevo'];
$tipoNuevo = $_POST['tipoNuevo'];
$descripNuevo = $_POST['nuevaDescripcion'];;
$_FILE =null;
$imagenNueva = $_FILE['imagenNueva'];
$nombreImagen = $_POST["nombreImagen"];

/* intento de persistencia de imagen */

    $rutaArchivoTemporal=$_FILES["imagenNueva"]["tmp_name"];
    $rutaArchivoFinal= "img/" . $_POST["nombreImagen"] . ".svg";
    move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);

////////////////////////////////////////


$database->nuevoPokemon("insert into pokemon(numero, nombre, tipo, descripcion, imagen)
values('$numeroNuevo', '$nombreNuevo', '$tipoNuevo', '$descripNuevo','$nombreImagen')");

header("location: index.php");