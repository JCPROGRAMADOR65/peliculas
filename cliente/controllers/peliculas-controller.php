<?php

include_once('clase_cliente_API.php');

$clienteAPI = new clase_cliente_API();
$clienteAPI->setNombreServicioAPI('obtener_peliculas');

$titulo = '';
$actor = '';
$director = '';
$genero = '';
$anoDesde = '';
$anoHasta = '';
if(isset($_POST)) {
    if (isset($_POST['titulo'])) { $titulo = $_POST['titulo']; }
    if (isset($_POST['actor'])) { $actor = $_POST['actor']; }
    if (isset($_POST['director'])) { $director = $_POST['director']; }
    if (isset($_POST['genero'])) { $genero = $_POST['genero']; }
    if (isset($_POST['ano-desde'])) { $anoDesde = $_POST['ano-desde']; }
    if (isset($_POST['ano-hasta'])) { $anoHasta = $_POST['ano-hasta']; }
    $clienteAPI->setDatosJSON($_POST);
}

$respuesta = json_decode($clienteAPI->ejecutar(), true);
$peliculas = $respuesta['data']['datos'];


$templatePath = realpath(__DIR__ . '/../templates/peliculas-template.php');
include_once($templatePath);