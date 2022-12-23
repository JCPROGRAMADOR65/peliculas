<?php
	
	$objBD = new clsBD;
	$objConfiguracion = new clsConfiguracion;
	$objUtilidades = new clsUtilidades;
	$objConsultaSQL = new clsConsultaSQL();

	if(defined('TOKEN_WEBSERVICE')){

		if(constant('TOKEN_WEBSERVICE')==$objConfiguracion->obtenerTokenWebservices()){	

			//Recogemos los parámetros que lleguen por POST (raw y form-data)
			$parametrosRecibidos = $objUtilidades->obtenerParametrosPOST();

			//CONSTRUIMOS LA CONSULTA
			$objConsultaSQL->addCampoSelect('peliculas.id',       'id');
			$objConsultaSQL->addCampoSelect('peliculas.titulo',   'titulo');
			$objConsultaSQL->addCampoSelect('peliculas.ano',      'ano');
			$objConsultaSQL->addCampoSelect('peliculas.pais',     'pais');
			$objConsultaSQL->addCampoSelect('directores.id',      'id_director');
			$objConsultaSQL->addCampoSelect('directores.nombre',  'nombre_director');
			$objConsultaSQL->addCampoSelect('directores.apellidos','apellidos_director');

			$objConsultaSQL->addTablaFrom('peliculas'); 
			// Left join para expandir los datos del director.
			$objConsultaSQL->addTablaLeftJoin('directores', 
											  'peliculas.director = directores.id');

			if(isset($parametrosRecibidos['ano-desde'])
				&& is_numeric($parametrosRecibidos['ano-desde'])) {
				$ano = $parametrosRecibidos['ano-desde'];
				$objConsultaSQL->addCondicionWhere('ano', ">= $ano", "AND");
			}

			if(isset($parametrosRecibidos['ano-hasta'])
				&& is_numeric($parametrosRecibidos['ano-hasta'])) {
				$ano = $parametrosRecibidos['ano-hasta'];
				$objConsultaSQL->addCondicionWhere('ano', "<= $ano", "AND");
			}

			if(isset($parametrosRecibidos['titulo'])) {
				$titulo = trim($parametrosRecibidos['titulo']);
				if (strlen($titulo) > 0) {
					$objConsultaSQL->addCondicionWhere('titulo', "LIKE '%$titulo%'", "AND");
				}
			}

			if(isset($parametrosRecibidos['director'])) {
				$director = trim($parametrosRecibidos['director']);
				if (strlen($director) > 0) {
					$objConsultaSQL->addCondicionWhere('(directores.nombre', "LIKE '%$director%' OR directores.apellidos LIKE '%$director%')", "AND");
				}
			}

			if(isset($parametrosRecibidos['genero'])) {
				$genero = trim($parametrosRecibidos['genero']);
				if (strlen($genero) > 0) {
					$objConsultaSQL->addCondicionWhere('genero', "LIKE '%$genero%'", "AND");
				}
			}

			if(isset($parametrosRecibidos['actor'])) {
				$actor = trim($parametrosRecibidos['actor']);

				if (strlen($actor) > 0) {
					$subconsultaIn = new clsConsultaSQL();
					$subconsultaIn->addCampoSelect('peliculas_actores.id_pelicula', 'id_pelicula');
					$subconsultaIn->addTablaFrom('actores');
					$subconsultaIn->addTablaLeftJoin('peliculas_actores',
														 'peliculas_actores.id_pelicula = peliculas.id'
													   . ' AND peliculas_actores.id_actor = actores.id');
					$subconsultaIn->addCondicionWhere('actores.nombre', "LIKE '%$actor%'", 'OR');
					$subconsultaIn->addCondicionWhere('actores.apellidos', "LIKE '%$actor%'", 'OR');
					$subsql = $subconsultaIn->obtenerConsultaSQL();
					$objConsultaSQL->addCondicionWhereSecundario('peliculas.id', "IN ($subsql)", "AND");
				}
			}

			//DEBUG. SOLO DESCOMENTAR SI QUERÉIS VER LA CONSULTA QUE SE EJECUTA
			//AL DESCOMENTAR, NO EJECUTARÁ LA CONSULTA, SOLO LA MOSTRARÁ
		    //echo $objConsultaSQL->obtenerConsultaSQL(); die();

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
					$indice=0;
					while ($fila = mysqli_fetch_assoc($resultado)) {
						$response['data']['datos'][$indice]= 
							array(
								"id" => $fila["id"],
                                "titulo" => $fila["titulo"],
                                "ano" => $fila["ano"],
                                "pais" => $fila["pais"],
								"director" => [
									"id" => $fila["id_director"],
									"nombre" => $fila["nombre_director"],
									"apellidos" => $fila["apellidos_director"]
								]
                            );
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