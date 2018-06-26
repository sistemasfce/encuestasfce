<?php
class ci_informes_pasantes extends encuestasfce_ci
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
            $request =  $cliente->put('informespasantes/'. $hash);
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
        // con este hash tengo que obtener el id persona y devolverlos
        $cliente = toba::servicio_web_rest('guarani')->guzzle();
        $request = $cliente->get('informespasantes/'. $hash);
        //$response = $request->send();
        $resultado = rest_decode($request->json());       

        $persona = $resultado['persona'];

        $datos['fecha'] = date('Y-m-d');;
        $datos['persona'] = $persona;
        $form->set_datos($datos);
    }
	
    function evt__form__modificacion($datos)
    {
        $this->tabla('informes_pasantes')->set($datos);
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