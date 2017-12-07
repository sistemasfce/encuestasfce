<?php
class ci_encuestas_ing extends encuestasfce_ci
{
    private $s__filtro;
    
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
    //---- cuadro -----------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function conf__cuadro(encuestasfce_ei_cuadro $cuadro)
    {
        $datos = toba::consulta_php('co_encuestas_ing')->get_encuestas();
        $cuadro->set_datos($datos);
    }

    function evt__cuadro__seleccion($seleccion)
    {
        $this->dep('relacion')->cargar($seleccion);
        $this->set_pantalla('edicion');
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

    function evt__agregar()
    {
        $this->set_pantalla('edicion');
    }

    function evt__cancelar()
    {
        $this->dep('relacion')->resetear();
        $this->set_pantalla('seleccion');
    }

    function evt__eliminar()
    {
        try {
            $this->dep('relacion')->eliminar_todo();
            $this->set_pantalla('seleccion');
        } catch (toba_error $e) {
            toba::notificacion()->agregar('No es posible eliminar el registro.');
        }
    }

    function evt__guardar()
    {
        $this->dep('relacion')->sincronizar();
        $this->dep('relacion')->resetear();
        $this->set_pantalla('seleccion');
    }
    
    //-----------------------------------------------------------------------------------
    //---- filtro -----------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function conf__filtro(encuestasfce_ei_filtro $filtro)
    {   
        if (isset($this->s__filtro)) {
            $filtro->set_datos($this->s__filtro);
        }   
    }  

    function evt__filtro__filtrar($datos)
    {   
        $this->s__filtro = $datos;
    }   

    function evt__filtro__cancelar()
    {   
        unset($this->s__filtro);
    } 
	    
}