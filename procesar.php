<?php
session_start();
include_once("MySqlDatabase.php");
$busqueda = ucfirst($_GET["busqueda"]);

$config = parse_ini_file('config.ini');
$database = new MySqlDatabase($config["host"], $config["usuario"], $config["clave"], $config["base"]);

$pokemones = $database->query("SELECT * FROM pokemon");

include_once("parteArriba.php");

function buscarPokemon($pokemones, $busqueda)
{
    $arrayPokemonesDeBusqueda = array();
    foreach ($pokemones as $pokemon) {
        if ($pokemon["nombre"] == $busqueda || $pokemon["tipo"] == $busqueda || $pokemon["numero"] == $busqueda) {
            array_push($arrayPokemonesDeBusqueda, $pokemon);
        }
    }
    return $arrayPokemonesDeBusqueda;
}

$pokemonEncontrado = buscarPokemon($pokemones, $busqueda);


if (!isset($busqueda) || $busqueda == "" || $pokemonEncontrado == null) {
    echo "<h1 class='text-white text-center'>Pokemon no encontrado</h1>";


    foreach ($pokemones as $pokemon) {

        $numero = $pokemon['numero'];
        $nombre = $pokemon['nombre'];
        $tipo = $pokemon["tipo"];
        $imagen = $pokemon["imagen"];

        echo "<tr>
                        <th scope='row'><img src='img/" . $imagen . ".svg' style='width: 32px;'></th>
                        <td><img src='img/" . $tipo . ".svg' style='width: 32px;'></td> 
                        <td >" . $numero . "</td >
                        <td ><a href='pokemon.php?name=${nombre}'>" . $nombre . "</a></td >";
        if (isset($_SESSION["logueado"]) == 1) {
            echo "<td ><a href='' class='text-decoration-none'><button type='button' class='btn btn-info d-inline me-1 p-1'>Modificar</button></a><a href=''><button type='button' class='btn btn-danger d-inline'>Baja</button></a></td >";

        }
        echo "</tr>";
    }

} elseif (isset($pokemonEncontrado)) {
    foreach ($pokemonEncontrado as $pokemon) {
        $numero = $pokemon['numero'];
        $nombre = $pokemon['nombre'];
        $tipo = $pokemon["tipo"];
        $id = $pokemon["id"];
        $imagen = $pokemon["imagen"];

        echo "<tr>
                        <th scope='row'><img src='img/" . $imagen . ".svg' style='width: 32px;'></th>
                        <td><img src='img/" . $tipo . ".svg' style='width: 32px;'></td> 
                        <td >" . $numero . "</td >
                        <td ><a style='text-decoration: none' href='pokemon.php?name=${nombre}'>" . $nombre . "</a></td >";
        if (isset($_SESSION["logueado"]) == 1) {
            echo "<td ><a href='' class='text-decoration-none'><button type='button' class='btn btn-info d-inline me-1'>Modificar</button></a><a href='baja.php?pokemon=" . $id . "' style='text-decoration: none'><button type='button' class='btn btn-danger d-inline'>Baja</button></a></td >";

        }
        echo "</tr>";
    }
}

include_once("parteAbajo.php");
?>
