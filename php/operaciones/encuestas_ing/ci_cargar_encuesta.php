<?php
class ci_cargar_encuesta extends encuestasfce_ci
{
    
     //-------------------------------------------------------------------------
    function relacion()
    {
        return $this->dep('relacion');
    }
    
    //-------------------------------------------------------------------------
    function tabla($id)
    {
        return $this->dep('relacion')->tabla($id);    
    }   
    
    //-----------------------------------------------------------------------------------
    //---- form -------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function conf__form(encuestasfce_ei_formulario $form)
    {
        if ($this->relacion()->esta_cargada()) {
            $datos = $this->tabla('encuestas_ing')->get();            
            $form->set_datos($datos);
        }
    }

    function evt__form__modificacion($datos)
    {
        $this->tabla('encuestas_ing')->set($datos);
    }

    //-----------------------------------------------------------------------------------
    //---- Eventos ----------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function evt__cancelar()
    {
        $this->dep('relacion')->resetear();
        $this->set_pantalla('seleccion');
    }

    function evt__guardar()
    {
        $this->dep('relacion')->sincronizar();
        $this->dep('relacion')->resetear();
        $this->set_pantalla('seleccion');
    }
    
	    
}