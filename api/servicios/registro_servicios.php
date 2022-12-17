<?php
    //AQUI TENEMOS QUE REGISTRAR CADA UNO DE LOS SERVICIOS 
    switch ($servicio) {
        //================================================
        //INICIOS DE SESION
        //================================================
        case 'ping':
            include_once('servicios/ping.php');
            break;
        //================================================
        //ALTAS
        //================================================ 
  
        //================================================
        //MODIFICACIONES
        //================================================ 

        //================================================     
        //CONSULTAS
        //================================================    
        case 'obtener_peliculas':
            include_once('servicios/obtener_peliculas.php');
            break;

        case 'obtener_pelicula':
            include_once('servicios/obtener_pelicula.php');
            break;

        case 'obtener_actor':
            include_once('servicios/obtener_actor.php');
            break;

        case 'obtener_director':
            include_once('servicios/obtener_director.php');
            break;
        //================================================     
        //ELIMINACIONES     
        //================================================     
             
        //TEST DE ESTADO    

        default:
            $response['code'] = 5;
            $response['status'] = $api_response_code[ $response['code'] ]['HTTP Response'];
            $response['data'] = $api_response_code[$response['code']]['Message'];
            break;
        }
