<?php
include_once('clase_cliente_API.php');

if ( !isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: /peliculas/cliente/');
    die();
}

$clienteAPI = new clase_cliente_API();
$clienteAPI->setNombreServicioAPI('obtener_director');
$clienteAPI->setDatosJSON(["id"=>$_GET['id']]);
$respuesta = json_decode($clienteAPI->ejecutar(), true);

if ( $respuesta['data']['resultado'] != "ok") {
    header('Location: /peliculas/cliente/');
    die();
}

$actor     = $respuesta['data']['datos'];
$id        = $actor['id'];
$nombre    = $actor['nombre'];
$apellidos = $actor['apellidos'];
$peliculas = $actor['peliculas'];

$templatePath = realpath(__DIR__ . '/../templates/actor-template.php');
include_once($templatePath);