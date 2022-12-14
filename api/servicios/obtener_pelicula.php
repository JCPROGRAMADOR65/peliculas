<?php
	$objBD = new clsBD;
	$objConfiguracion = new clsConfiguracion;
	$objUtilidades = new clsUtilidades;
	$objConsultaSQL = new clsConsultaSQL();

	if(defined('TOKEN_WEBSERVICE')){

		if(constant('TOKEN_WEBSERVICE')==$objConfiguracion->obtenerTokenWebservices()){	

			//Recogemos los parámetros que lleguen por POST (raw y form-data)
			$parametrosRecibidos = $objUtilidades->obtenerParametrosPOST();

			$objConsultaSQL->addCampoSelect('peliculas.id',       'id');
			$objConsultaSQL->addCampoSelect('peliculas.titulo',   'titulo');
			$objConsultaSQL->addCampoSelect('peliculas.ano',      'ano');
			$objConsultaSQL->addCampoSelect('peliculas.pais',     'pais');
			$objConsultaSQL->addCampoSelect('peliculas.genero',   'genero');
			$objConsultaSQL->addCampoSelect('peliculas.sinopsis', 'sinopsis');
			$objConsultaSQL->addCampoSelect('directores.id',  	  'id_director');
			$objConsultaSQL->addCampoSelect('directores.nombre',  'nombre_director');
			$objConsultaSQL->addCampoSelect('directores.apellidos','apellidos_director');
			$objConsultaSQL->addCampoSelect('actores.id',  		'id_actor');
			$objConsultaSQL->addCampoSelect('actores.nombre',  'nombre_actor');
			$objConsultaSQL->addCampoSelect('actores.apellidos','apellidos_actor');

			$objConsultaSQL->addTablaFrom('peliculas'); 
			// Left join para expandir los datos del director.
			$objConsultaSQL->addTablaLeftJoin('directores', 
											  'peliculas.director = directores.id');

			// Left join para unir con actores y otro para expandir datos
			$objConsultaSQL->addTablaLeftJoin('peliculas_actores', 
					'peliculas.id = peliculas_actores.id_pelicula');
			$objConsultaSQL->addTablaLeftJoin('actores', 
					'actores.id = peliculas_actores.id_actor');

			$objConsultaSQL->addCondicionWhere('peliculas.id', '= ' . $parametrosRecibidos['id']);
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
						"titulo" => $primeraFila["titulo"],
						"ano" => $primeraFila["ano"],
						"sinopsis" => $primeraFila["sinopsis"],
						"genero" => $primeraFila["genero"],
						"director" => [
							"id" => $primeraFila["id_director"],
							"nombre" => $primeraFila["nombre_director"],
							"apellidos" => $primeraFila["apellidos_director"]
						],
						"actores" => [
							$primeraFila['id_actor'] => 
								"$primeraFila[nombre_actor] $primeraFila[apellidos_actor]"
						]
					];

					$indice=1;
					while ($fila = mysqli_fetch_assoc($resultado)) {
						$response['data']['datos']['actores'][$fila['id_actor']] = 
							"$fila[nombre_actor] $fila[apellidos_actor]";

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