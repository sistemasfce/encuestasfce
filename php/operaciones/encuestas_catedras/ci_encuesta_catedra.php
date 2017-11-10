<?php
class ci_encuesta_catedra extends encuestasfce_ci
{
	
	protected static $cliente_guarani;
	
	
	//  ejemplo de ingreso a una encuesta
	//  http://guarani.sistemasfce.com.ar/encuestasfce/1.0/?ai=encuestasfce||280000002&tcm=previsualizacion&tm=1&c=16d5f6ad0b0326ef992aad5ec5f13c2de76c3699
	
	
	//-------------------------------------------------------------------------
	function relacion()
	{
		return $this->controlador->dep('relacion');
	}
	
	//-------------------------------------------------------------------------
	function tabla($id)
	{
		return $this->controlador->dep('relacion')->tabla($id);    
	}
	
	//-----------------------------------------------------------------------------------
	//---- Eventos ----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function evt__procesar()
	{
		try {
			$this->dep('relacion')->sincronizar();
			$this->dep('relacion')->resetear();
			$hash = toba::memoria()->get_dato('hash');
			$cliente = toba::servicio_web_rest('guarani')->guzzle();
			$request =  $cliente->put('encuestascatedras/'. $hash);
			self::validar_response($request, 204, __FUNCTION__);
			toba::notificacion()->agregar('Los datos se guardaron correctamente.','info');

		} catch (Exception $e) {
				echo 'Error: '.  $e->getMessage(). "\n";
		}
		//toba::vinculador()->navegar_a("encuestasfce","280000003");
	}

	function evt__cancelar()
	{
		$this->dep('relacion')->resetear();
	}

	//-----------------------------------------------------------------------------------
	//---- form -------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__form(encuestasfce_ei_formulario $form)
	{ 
		$param = toba::memoria()->get_parametros();
		$hash = $param['c']; 
		toba::memoria()->set_dato('hash',$hash);

		if (!isset($hash)) {
			$this->evento('procesar')->desactivar();
			return;
		}
		
		//--------------------------------------------------------------
		// llega por parametro el hash utilizado por la tabla gde_encuestas_pendientes
		// con este hash tengo que obtener el id comision y el id persona y devolverlos
		$cliente = toba::servicio_web_rest('guarani')->guzzle();
		$request = $cliente->get('encuestascatedras/'. $hash);
		//$response = $request->send();
		$resultado = rest_decode($request->json());       
		
		$comision = $resultado['comision'];
		$persona = $resultado['persona'];
		
		//--------------------------------------------------------------
			
		//$cliente = toba::servicio_web_rest('guarani')->guzzle();
		$request = $cliente->get('comisiones/'. $comision);
		//$response = $request->send();
		$res = rest_decode($request->json());

		//--------------------------------------------------------------
		
		$datos['comision'] = $res['comision'];
		$datos['persona'] = $persona;
		$datos['comision_nombre'] = $res['catedra']. ' - ' .$res['nombre'];
		$form->set_datos($datos);

	}
	
	function evt__form__modificacion($datos)
	{
		$this->tabla('encuestas_catedras')->set($datos);
	}
	//-----------------------------------------------------------------------------------
	//---- form_ml ----------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__form_ml(encuestasfce_ei_formulario_ml $form_ml)
	{
		//Recibe por parametro el numero de comision y con un webservice busca los docentes
		//Carga los docentes en el form_ml
		//--------------------------------------------------------------
		//$param = toba::memoria()->get_parametros();
		//$hash = $param['c'];   
		$hash = toba::memoria()->get_dato('hash');
		
		if (!isset($hash))
			return;
		
		$cliente = toba::servicio_web_rest('guarani')->guzzle();
		$request = $cliente->get('encuestascatedras/'. $hash);
		//$response = $request->send();
		$resultado = rest_decode($request->json());       
		
		$comision = $resultado['comision'];
		
		
		$docentes = $this->get_docentes_ws($comision);
		
		if (!isset($docentes[0])) {
			return;
		}
		
		foreach ($docentes as $doc) {
					$fila['responsabilidad_nombre'] = $doc['responsabilidad'];
					$fila['apex_ei_analisis_fila'] = 'A';
					$fila['docente'] = $doc['docente']['docente'];
					$fila['nombre'] = $doc['docente']['apellido']. ', '.$doc['docente']['nombres'];
					$aux[] = $fila;
		}
		$form_ml->set_datos($aux);
		
	}

	function evt__form_ml__modificacion($datos)
	{
		$this->tabla('encuestas_catedras_docentes')->procesar_filas($datos);
	}
	/*
	function get_docentes($id){
		
		$sql = "SELECT sga_docentes_comision.docente,
			mdp_personas.apellido || ', '  || mdp_personas.nombres as nombre,
			sga_docentes_responsabilidades.nombre as responsabilidad_nombre,
			sga_docentes_comision.responsabilidad
			FROM sga_docentes_comision LEFT OUTER JOIN sga_docentes ON (sga_docentes_comision.docente = sga_docentes.docente)
			LEFT OUTER JOIN mdp_personas ON (sga_docentes.persona = mdp_personas.persona)
			LEFT OUTER JOIN sga_docentes_responsabilidades ON (sga_docentes_comision.responsabilidad = sga_docentes_responsabilidades.responsabilidad)
			WHERE comision = ".$id. 'ORDER BY responsabilidad, nombre';
		return toba::db('guarani')->consultar($sql);
		
	}
	*/
	
	function get_docentes_ws($id)
	{
		$cliente = toba::servicio_web_rest('guarani')->guzzle();
		$request = $cliente->get('comisiones/'. $id.'/docentes');
		//$response = $request->send();
		return rest_decode($request->json());
	}
	
	protected static function validar_response($response, $status, $desc_error){
		if($response->getStatusCode() != $status){
			toba::logger()->error('Error en '. $desc_error . ". Se esperaba $status y se obtuvo {$response->getStatusCode()}");
			toba::logger()->var_dump(rest_decode($response->json()));
			throw guarani::error(self::get_mensaje_descripcion($response));
		}
	
	}


}
?>