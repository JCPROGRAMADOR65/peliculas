<?php

include_once('clase_cliente_API.php');

$clienteAPI = new clase_cliente_API();
$clienteAPI->setNombreServicioAPI('obtener_peliculas');

if(isset($_POST['Filtrar'])) {
    $clienteAPI->setDatosJSON($_POST);
}

$respuesta = json_decode($clienteAPI->ejecutar(), true);
$peliculas = $respuesta['data']['datos'];


$templatePath = realpath(__DIR__ . '/../templates/peliculas-template.php');
include_once($templatePath);