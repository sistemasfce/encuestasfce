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
            //toba::memoria()->set_dato('terminado',1); 
        } catch (Exception $e) {
            echo 'Error: '.  $e->getMessage(). "\n";
        }
        //toba::vinculador()->navegar_a("encuestasfce","280000003");
    }

    function evt__cancelar()
    {
        $this->dep('relacion')->resetear();
    }
/*
    function conf()
    {
        toba::memoria()->set_dato('terminado',0); 

    }
 */       
    //-----------------------------------------------------------------------------------
    //---- form -------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function conf__form(encuestasfce_ei_formulario $form)
    { 
        $param = toba::memoria()->get_parametros();
        $hash = $param['c']; 
        toba::memoria()->set_dato('hash',$hash);

        if (!isset($hash)) {
            return;
        }

        //--------------------------------------------------------------
        // llega por parametro el hash utilizado por la tabla gde_encuestas_pendientes
        // con este hash tengo que obtener el id comision y el id persona y devolverlos
        $cliente = toba::servicio_web_rest('guarani')->guzzle();
        $request = $cliente->get('encuestascatedras/'. $hash);
        //$response = $request->send();
        $encuesta = rest_decode($request->json());       

        $comision = $encuesta['comision'];
        $persona = $encuesta['persona'];                

        //--------------------------------------------------------------	
        //$cliente = toba::servicio_web_rest('guarani')->guzzle();
        $request = $cliente->get('comisiones/'. $comision);
        //$response = $request->send();
        $datos_comision = rest_decode($request->json());

        toba::memoria()->set_dato('persona',$persona);
        toba::memoria()->set_dato('comision',$comision);
        toba::memoria()->set_dato('datos_comision',$datos_comision);

        
        /*
        $terminado = toba::memoria()->get_dato('terminado'); 
        if ($terminado == 1) {
            $this->evento('procesar')->desactivar();
            return;                   
        }
        $hash = toba::memoria()->get_dato('hash');                
        if (!isset($hash)) {
            $this->evento('procesar')->desactivar();
            return;
        }
<<<<<<< HEAD
        
	//-----------------------------------------------------------------------------------
	//---- form -------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__form(encuestasfce_ei_formulario $form)
	{ 
                $terminado = toba::memoria()->get_dato('terminado'); 
                if ($terminado == 1) {
 			$this->evento('procesar')->desactivar();
			return;                   
                }
		$hash = toba::memoria()->get_dato('hash');                
		if (!isset($hash)) {
			$this->evento('procesar')->desactivar();
			return;
		}

                $datos_comision = toba::memoria()->get_dato('datos_comision');
                $persona = toba::memoria()->get_dato('persona');
                
		//--------------------------------------------------------------		
		$datos['comision'] = $datos_comision['comision'];
		$datos['persona'] = $persona;
		$datos['comision_nombre'] = $datos_comision['catedra']. ' - ' .$datos_comision['nombre'];
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
                $terminado = toba::memoria()->get_dato('terminado'); 
                if ($terminado == 1) {
 			$this->evento('procesar')->desactivar();
			return;                   
                }            
		$hash = toba::memoria()->get_dato('hash');
		if (!isset($hash))
			return;
		   
		$comision = toba::memoria()->get_dato('comision');	
                $datos_comision = toba::memoria()->get_dato('datos_comision');
                
                $docentes = $datos_comision['docentes'];
		
		if (!isset($docentes[0])) {
			return;
		}
		foreach ($docentes as $doc) {
					$fila['responsabilidad_nombre'] = $doc['responsabilidad'];
					$fila['apex_ei_analisis_fila'] = 'A';
					$fila['docente'] = $doc['docente'];
					$fila['nombre'] = $doc['apellido']. ', '.$doc['nombres'];
					$aux[] = $fila;
		}
		$form_ml->set_datos($aux);
		
	}

	function evt__form_ml__modificacion($datos)
	{
		$this->tabla('encuestas_catedras_docentes')->procesar_filas($datos);
	}
	
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
=======
        */
        
        
        //$datos_comision = toba::memoria()->get_dato('datos_comision');
        //$persona = toba::memoria()->get_dato('persona');

        //--------------------------------------------------------------		
        $datos['comision'] = $datos_comision['comision'];
        $datos['persona'] = $persona;
        $datos['comision_nombre'] = $datos_comision['catedra']. ' - ' .$datos_comision['nombre'];
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
        /*
        $terminado = toba::memoria()->get_dato('terminado'); 
        if ($terminado == 1) {
            $this->evento('procesar')->desactivar();
            return;                   
        }            
        */
         
        $hash = toba::memoria()->get_dato('hash');
        if (!isset($hash))
            return;

        $comision = toba::memoria()->get_dato('comision');	
        $datos_comision = toba::memoria()->get_dato('datos_comision');
>>>>>>> ff87ceddc4366b018e2a1a9704ee7894aa929453

        $docentes = $datos_comision['docentes'];

        if (!isset($docentes[0])) {
            return;
        }

        foreach ($docentes as $doc) {
            $fila['responsabilidad_nombre'] = $doc['responsabilidad'];
            $fila['apex_ei_analisis_fila'] = 'A';
            $fila['docente'] = $doc['docente'];
            $fila['nombre'] = $doc['apellido']. ', '.$doc['nombres'];
            $aux[] = $fila;
        }
        $form_ml->set_datos($aux);
    }

    function evt__form_ml__modificacion($datos)
    {
        $this->tabla('encuestas_catedras_docentes')->procesar_filas($datos);
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
