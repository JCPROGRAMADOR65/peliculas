<?php
include_once('clase_cliente_API.php');

if ( !isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: /peliculas/cliente/');
    die();
}

$clienteAPI = new clase_cliente_API();
$clienteAPI->setNombreServicioAPI('obtener_pelicula');
$clienteAPI->setDatosJSON(["id"=>$_GET['id']]);
$respuesta = json_decode($clienteAPI->ejecutar(), true);

if ( $respuesta['data']['resultado'] != "ok") {
    header('Location: /peliculas/cliente/');
    die();
}


$pelicula = $respuesta['data']['datos'];
$director = $pelicula['director'];
$actores = $pelicula['actores'];


$templatePath = realpath(__DIR__ . '/../templates/pelicula-template.php');
include_once($templatePath);