<?php
session_start();
include_once("MySqlDatabase.php");

$config = parse_ini_file('config.ini');
$database = new MySqlDatabase($config["host"], $config["usuario"], $config["clave"], $config["base"]);

//obtengo valores del form
$numeroNuevo =$_POST['numeroNuevo'];
$nombreNuevo =$_POST['nombreNuevo'];
$tipoNuevo = $_POST['tipoNuevo'];
$descripNuevo = $_POST['descripcion'];
$_FILE =['imagenNueva'];
$imagenNueva = $_FILE;
$nombreImagen = $_POST["nombreImagen"];

$id = $_POST["invisible"];

//guardo imagen en pokedex/img
$rutaArchivoTemporal=$_FILES["imagenNueva"]["tmp_name"];
$rutaArchivoFinal= "img/" . $nombreImagen . ".svg";
move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);


$database->modificarPokemon("
UPDATE pokemon
SET numero = '$numeroNuevo', nombre = '$nombreNuevo', tipo = '$tipoNuevo', descripcion = '$descripNuevo', imagen = '$nombreImagen'
WHERE id='$id'");


header("location: index.php");


