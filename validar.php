<?php
session_start();
include_once("MySqlDatabase.php");

$config = parse_ini_file('config.ini');
$database = new MySqlDatabase($config["host"], $config["usuario"], $config["clave"], $config["base"]);

$usuario = $_POST["usuario"];
$clave = md5($_POST["clave"]);
var_dump($clave);
// a futuro intentar dividir las consultas.
$resultado = $database->query("SELECT * FROM usuario");

foreach ($resultado as $resul) {
    if ($resul["usuario"] == $usuario) {
        if ($resul["clave"] == $clave) {
            $_SESSION["logueado"] = 1;
            header("location: index.php");
            exit();
        }
    }
    header("location: index.php");
}
