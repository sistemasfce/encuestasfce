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
/*
    function conf()
    {
        $param = toba::memoria()->get_parametros();
        self::debug_to_console( $param );
        $hash = $param['c']; 
        toba::memoria()->set_dato('hash',$hash);
    }
*/    
    function evt__procesar()
    {
        try {
            $this->dep('relacion')->sincronizar();
            $this->dep('relacion')->resetear();
            toba::consulta_php('co_guarani')->put_encuesta($hash);
            //$hash = toba::memoria()->get_dato('hash');
            //$cliente = toba::servicio_web_rest('guarani')->guzzle();
            //$request =  $cliente->put('encuestascatedras/'. $hash);
            //self::validar_response($request, 204, __FUNCTION__);
            toba::notificacion()->agregar('Los datos se guardaron correctamente.','info');
            toba::vinculador()->navegar_a("encuestasfce","280000182");
        } catch (Exception $e) {
            toba::logger()->error('Error en put, el hash es: '.$hash);
            echo 'Error en put: '.  $e->getMessage(). "\n";
        }
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
        //toba::memoria()->set_dato('hash',$hash);
        //$hash = toba::memoria()->get_dato('hash');
        if (!isset($hash)) {
            return;
        }

        //--------------------------------------------------------------
        // llega por parametro el hash utilizado por la tabla gde_encuestas_pendientes
        // con este hash tengo que obtener el id comision y el id persona y devolverlos
        //$cliente = toba::servicio_web_rest('guarani')->guzzle();
        //$request = $cliente->get('encuestascatedras/'. $hash);
        //$encuesta = rest_decode($request->json());    
        $encuesta = toba::consulta_php('co_guarani')->get_encuestas($hash);

        $comision = $encuesta['comision'];
        $persona = $encuesta['persona'];                
	
        //$request = $cliente->get('comisiones/'. $comision);
        //$datos_comision = rest_decode($request->json());
        
        $datos_comision = toba::consulta_php('co_guarani')->get_comision($comision);

        toba::memoria()->set_dato('persona',$persona);
        toba::memoria()->set_dato('comision',$comision);

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
        $param = toba::memoria()->get_parametros();
        $hash = $param['c']; 
        
        //$hash = toba::memoria()->get_dato('hash');
        if (!isset($hash))
            return;

        $comision = toba::memoria()->get_dato('comision');	
        $docentes = toba::consulta_php('co_guarani')->get_docentes_comision($comision);

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
    /*
    protected static function validar_response($response, $status, $desc_error){
        if($response->getStatusCode() != $status){
            toba::logger()->error('Error en '. $desc_error . ". Se esperaba $status y se obtuvo {$response->getStatusCode()}");
            toba::logger()->var_dump(rest_decode($response->json()));
            throw guarani::error(self::get_mensaje_descripcion($response));
        }
    }    
    */
}
?>
