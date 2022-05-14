<?php
session_start();
include_once("MySqlDatabase.php");
$pokemonEliminado = $_GET["pokemon"];

$config = parse_ini_file('config.ini');
$database = new MySqlDatabase($config["host"], $config["usuario"], $config["clave"], $config["base"]);

$database->queryDeleted("DELETE FROM pokemon WHERE id = '$pokemonEliminado'");

header("location: index.php");