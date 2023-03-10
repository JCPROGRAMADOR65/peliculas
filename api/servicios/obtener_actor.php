<?php
	$objBD = new clsBD;
	$objConfiguracion = new clsConfiguracion;
	$objUtilidades = new clsUtilidades;
	$objConsultaSQL = new clsConsultaSQL();

	if(defined('TOKEN_WEBSERVICE')){

		if(constant('TOKEN_WEBSERVICE')==$objConfiguracion->obtenerTokenWebservices()){	

			//Recogemos los parámetros que lleguen por POST (raw y form-data)
			$parametrosRecibidos = $objUtilidades->obtenerParametrosPOST();

			$objConsultaSQL->addCampoSelect('actores.id',  		  'id');
			$objConsultaSQL->addCampoSelect('actores.nombre',     'nombre');
			$objConsultaSQL->addCampoSelect('actores.apellidos',  'apellidos');
			$objConsultaSQL->addCampoSelect('peliculas.id',       'id_pelicula');
			$objConsultaSQL->addCampoSelect('peliculas.titulo',   'titulo_pelicula');
			$objConsultaSQL->addCampoSelect('peliculas.ano',      'ano_pelicula');

			$objConsultaSQL->addTablaFrom('actores'); 
			// Left joins para obtener las pelis en las que ha trabajado
			$objConsultaSQL->addTablaLeftJoin('peliculas_actores', 
					'actores.id = peliculas_actores.id_actor');
			$objConsultaSQL->addTablaLeftJoin('peliculas', 
					'peliculas.id = peliculas_actores.id_pelicula');

			$objConsultaSQL->addCondicionWhere('actores.id', '= ' . $parametrosRecibidos['id']);
			$objConsultaSQL->addCampoOrderBy('peliculas.ano', 'ASC');
			//DEBUG. SOLO DESCOMENTAR SI QUERÉIS VER LA CONSULTA QUE SE EJECUTA
			//AL DESCOMENTAR, NO EJECUTARÁ LA CONSULTA, SOLO LA MOSTRARÁ
		    //echo $objConsultaSQL->obtenerConsultaSQL();die();

			//EJECUTAMOS LA CONSULTA
			$resultado= $objBD->ejecutarConsulta($objConsultaSQL->obtenerConsultaSQL()); 

			//Comprobamos si el resultado contiene filas
			if (!$resultado) {
					$response['code'] = 0;				
				    $response['status'] = $api_response_code[0]['HTTP Response'];
			        $response['message'] = $api_response_code[0]['Message'];
			    	$response['numero_filas']=0;
					$response['data']=array(
			       	 		'resultado' => 'error_servidor_bd',
							'datos' => array()
			        );
			}
			else{
				//Si la consulta se ha podido ejecutar  			
				//Si no se devuelven filas
				if (mysqli_num_rows($resultado) == 0){
					$response['code'] = 1;				
				   	$response['status'] = $api_response_code[ $response['code'] ]['HTTP Response'];
					$response['message'] = $api_response_code[$response['code'] ]['Message'];
			    	$response['numero_filas']=0;
					$response['data']=array(
						'resultado' => 'sin_resultados',
						'datos' => array()
					);
				}
				else{
					//Si se devuelven filas
					$response['code'] = 1;				
				   	$response['status'] = $api_response_code[ $response['code'] ]['HTTP Response'];
					$response['message'] = $api_response_code[$response['code'] ]['Message'];
			    	$response['numero_filas']=mysqli_num_rows($resultado);
					$response['data']=array(
						'resultado' => 'ok',
						'datos' => array()
					);
					$primeraFila = mysqli_fetch_assoc($resultado);

					$response['data']['datos'] = [
						"id" => $primeraFila["id"],
						"nombre" => $primeraFila["nombre"],
						"apellidos" => $primeraFila["apellidos"],
						"peliculas" => [
							$primeraFila['id_pelicula'] => [
								"titulo" => $primeraFila["titulo_pelicula"],
								"ano" => $primeraFila["ano_pelicula"]
							]
						]
					];

					$indice=1;
					while ($fila = mysqli_fetch_assoc($resultado)) {
						$response['data']['datos']['peliculas'][$fila['id_pelicula']] = 
						[
							"titulo" => $fila["titulo_pelicula"],
							"ano" => $fila["ano_pelicula"]
						];

						$indice++;					
					}
				}
			}
		}
  		else{
			echo _("Token incorrecto");
		}
    }
    else{
		echo _("Llamada no autorizada");
	}
?>