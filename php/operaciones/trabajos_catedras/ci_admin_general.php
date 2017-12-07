<?php

class ci_admin_general extends encuestasfce_ci
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

    //-----------------------------------------------------------------------------------
    //---- form -------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function evt__form__modificacion($datos)
    {
        $this->tabla('comercio')->set($datos);
    }
    
    function get_subrubros($rubro) 
    {
        $subrubros = array(); 
        
        $aux[1]['descripcion'] = "Kioscos";
        $aux[2]['descripcion'] = "Maxi kioscos";
        $subrubros[1] = $aux; 
        $aux = array();
        $aux[1]['descripcion'] = "Almacenes";
        $aux[2]['descripcion'] = "Autoservicios";
        $aux[3]['descripcion'] = "Mercados";
        $aux[4]['descripcion'] = "Carnicerías";
        $aux[5]['descripcion'] = "Pescaderías";
        $aux[6]['descripcion'] = "Pollerías";
        $aux[7]['descripcion'] = "Verdulerías";
        $subrubros[2] = $aux; 
        $aux = array();
        $aux[1]['descripcion'] = "Mueblerías";
        $aux[2]['descripcion'] = "Bazares";
        $aux[3]['descripcion'] = "Blanquerías";
        $aux[4]['descripcion'] = "Artículos para el hogar";
        $subrubros[3] = $aux; 
        $aux = array();
        $aux[1]['descripcion'] = "Regalerías";
        $aux[2]['descripcion'] = "Articulos regionales";
        $aux[3]['descripcion'] = "Jugueterías";
        $aux[4]['descripcion'] = "Cotillones";
        $subrubros[4] = $aux;
        $aux = array();
        $aux[1]['descripcion'] = "Zapaterías";
        $subrubros[5] = $aux;
        $aux = array();
        $aux[1]['descripcion'] = "Indumentaria";
        $subrubros[6] = $aux; 
        $aux = array();
        $aux[1]['descripcion'] = "Librerías";
        $subrubros[7] = $aux;
        $aux = array();
        $aux[1]['descripcion'] = "Artículos para construcción";
        $subrubros[8] = $aux; 
        $aux = array();
        $aux[1]['descripcion'] = "Artículos informáticos";
        $aux[2]['descripcion'] = "Electrónica";
        $aux[3]['descripcion'] = "Audio";
        $aux[4]['descripcion'] = "Música y telefonía";        
        $subrubros[9] = $aux;
        $aux = array();
        $aux[1]['descripcion'] = "Farmacias";
        $aux[2]['descripcion'] = "Insumos para la salud";
        $aux[3]['descripcion'] = "Ópticas";        
        $subrubros[10] = $aux;
        $aux = array();
        
        return $subrubros[$rubro];
        
    }
    
    function get_fortalezas()
    {
        $aux = array();
        $aux['codigo'] = 'F.1.';
        $aux['descripcion'] = 'F.1. Personal altamente capacitado';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.2.';
        $aux['descripcion'] = 'F.2. Personal motivado';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.3.';
        $aux['descripcion'] = 'F.3. Personal orientado al cliente';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.4.';
        $aux['descripcion'] = 'F.4. Ubicación estratégica del negocio';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.5.';
        $aux['descripcion'] = 'F.5. Trayectoria en el mercado';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.6.';
        $aux['descripcion'] = 'F.6. Variedad de productos';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.7.';
        $aux['descripcion'] = 'F.7. Oferta de servicios al cliente';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.8.';
        $aux['descripcion'] = 'F.8. Adecuada exhibición de productos';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.9.';
        $aux['descripcion'] = 'F.9. Adecuada calidad del producto';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.10.';
        $aux['descripcion'] = 'F.10. Local - instalaciones en buen estado';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.11.';
        $aux['descripcion'] = 'F.11. Precios adecuados - competitivos';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.12.';
        $aux['descripcion'] = 'F.12. Tecnologías modernas - adecuadas';
                $fortalezas[] = $aux;
        $aux['codigo'] = 'F.13.';
        $aux['descripcion'] = 'F.13. Adecuado posicionamiento del negocio en redes sociales';
                $fortalezas[] = $aux;
        $fortalezas[] = $aux;
        
        return $fortalezas;
    }
    
    function get_debilidades()
    {
        $aux = array();
        $aux['codigo'] = 'D.1.';
        $aux['descripcion'] = 'D.1. Elevada estructura de costos fijos';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.2.';
        $aux['descripcion'] = 'D.2. Personal con baja formación';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.3.';
        $aux['descripcion'] = 'D.3. Personal desmotivado';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.4.';
        $aux['descripcion'] = 'D.4. Mala ubicación del negocio';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.5.';
        $aux['descripcion'] = 'D.5. Escasa trayectoria';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.6.';
        $aux['descripcion'] = 'D.6. Inadecuada exhibición de productos';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.7.';
        $aux['descripcion'] = 'D.7. Problemas de calidad en el producto';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.8.';
        $aux['descripcion'] = 'D.8. Déficits en el local y sus instalaciones';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.9.';
        $aux['descripcion'] = 'D.9. Precios por encima de los valores del mercado';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.10.';
        $aux['descripcion'] = 'D.10. Tecnologías obsoletas';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.11.';
        $aux['descripcion'] = 'D.11. Bajo desarrollo de redes sociales';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.12.';
        $aux['descripcion'] = 'D.12. Problemas de organización';
                $debilidades[] = $aux;
        $aux['codigo'] = 'D.13.';
        $aux['descripcion'] = 'D.13. Bajo desarrollo de sistemas de información';
                $debilidades[] = $aux;
        $debilidades[] = $aux;
        
        return $debilidades;
    }
    
    function get_oportunidades()
    {
        $aux = array();
        $aux['codigo'] = 'O.1.';
        $aux['descripcion'] = 'O.1. Aumento de la demanda';
                $oportunidades[] = $aux;
        $aux['codigo'] = 'O.2.';
        $aux['descripcion'] = 'O.2. Aumento de la capacidad de compra de los clientes';
                $oportunidades[] = $aux;
        $aux['codigo'] = 'O.3.';
        $aux['descripcion'] = 'O.3. Políticas de gobierno favorables';
                $oportunidades[] = $aux;
        $aux['codigo'] = 'O.4.';
        $aux['descripcion'] = 'O.4. Cambios positivos en los gustos de los clientes';
                $oportunidades[] = $aux;
        $aux['codigo'] = 'O.5.';
        $aux['descripcion'] = 'O.5. Disminución de la fuerza de los competidores';
                $oportunidades[] = $aux;
        $aux['codigo'] = 'O.6.';
        $aux['descripcion'] = 'O.6. Desarrollos tecnológicos favorables en el sector';
                $oportunidades[] = $aux;
        $aux['codigo'] = 'O.7.';
        $aux['descripcion'] = 'O.7. Desarrollo de nuevos proveedores';
                $oportunidades[] = $aux;
        $aux['codigo'] = 'O.8.';
        $aux['descripcion'] = 'O.8. Mayor seguridad';
                $oportunidades[] = $aux;
        $aux['codigo'] = 'O.9.';
        $aux['descripcion'] = 'O.9. Mayores controles sobre venta ilegal';
                $oportunidades[] = $aux;
        //$aux['codigo'] = 'O.10.';
        // $aux['descripcion'] = 'O.10. Tecnologías obsoletas';
        //        $oportunidades[] = $aux;

        
        return $oportunidades;
    }
    
    function get_amenazas()
    {
        $aux = array();
        $aux['codigo'] = 'A.1.';
        $aux['descripcion'] = 'A.1. Incremento de costos asociados a servicios';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.2.';
        $aux['descripcion'] = 'A.2. Disminución de la demanda';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.3.';
        $aux['descripcion'] = 'A.3. Recesión';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.4.';
        $aux['descripcion'] = 'A.4. Disminución de la capacidad de compra de los clientes';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.5.';
        $aux['descripcion'] = 'A.5. Incremento de precios de insumos y servicios';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.6.';
        $aux['descripcion'] = 'A.6. Cambios negativos respecto de los gustos y preferencias';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.7.';
        $aux['descripcion'] = 'A.7. Políticas de gobierno desfavorables';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.8.';
        $aux['descripcion'] = 'A.8. Incremento de la fuerza de los competidores';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.9.';
        $aux['descripcion'] = 'A.9. Incremento de la inseguridad';
                $amenazas[] = $aux;
        $aux['codigo'] = 'A.10.';
        $aux['descripcion'] = 'A.10. Incremento de prácticas de comercio desleal';
                $amenazas[] = $aux;

        
        return $amenazas;
    }
}
