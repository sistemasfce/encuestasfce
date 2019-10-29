<?php

class ci_encuesta_depto_contable extends encuestasfce_ci
{
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
    //---- form -------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function evt__form__modificacion($datos)
    {
        $inv_causa = $datos['inv_causa'];
        $temp_inv_causa = '';      
        foreach($inv_causa as $ic)
            $temp_inv_causa .= $ic . '-';
        $datos['inv_causa'] = $temp_inv_causa;
        
        $inv_linea = $datos['inv_linea'];
        $temp_inv_linea = '';      
        foreach($inv_linea as $ic)
            $temp_inv_linea .= $ic . '-';
        $datos['inv_linea'] = $temp_inv_linea;  
        
        $ext_causa = $datos['ext_causa'];
        $temp_ext_causa = '';      
        foreach($ext_causa as $ic)
            $temp_ext_causa .= $ic . '-';
        $datos['ext_causa'] = $temp_ext_causa;   
        
        $ext_linea = $datos['ext_linea'];
        $temp_ext_linea = '';      
        foreach($ext_linea as $ic)
            $temp_ext_linea .= $ic . '-';
        $datos['ext_linea'] = $temp_ext_linea;  
        
        $this->tabla('encuestas_ext_inv')->set($datos);
    }
    
    //-----------------------------------------------------------------------------------
    //---- Eventos ----------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function evt__procesar()
    {
        $this->dep('relacion')->sincronizar();
        $this->dep('relacion')->resetear();
        toba::notificacion()->agregar('Los datos se guardaron correctamente.','info');
    }

    function evt__cancelar()
    {
        $this->dep('relacion')->resetear();
    }
}