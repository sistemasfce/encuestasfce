<?php

class ci_resultados_encuestas_ing extends encuestasfce_ci
{
    private $s__filtro;
    private $s__sede;
    protected $s__cantidad;
    
    //-----------------------------------------------------------------------------------
    //---- form_boton3a -----------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function conf__boton3a(encuestasfce_ei_formulario $form)
    {
        $form->evento('ver_otros_3a')->vinculo()->agregar_parametro('evento', '3a');
        $form->evento('ver_otros_3a')->vinculo()->agregar_parametro('filtro', $this->s__sede);
    }
    
    function conf__boton3b(encuestasfce_ei_formulario $form)
    {
        $form->evento('ver_otros_3b')->vinculo()->agregar_parametro('evento', '3b');
        $form->evento('ver_otros_3b')->vinculo()->agregar_parametro('filtro', $this->s__sede);
    }
    
    function conf__boton5(encuestasfce_ei_formulario $form)
    {
        $form->evento('ver_otros_5')->vinculo()->agregar_parametro('evento', '5');
        $form->evento('ver_otros_5')->vinculo()->agregar_parametro('filtro', $this->s__sede);
    }
    
    function conf__boton6(encuestasfce_ei_formulario $form)
    {
        $form->evento('ver_otros_6')->vinculo()->agregar_parametro('evento', '6');
        $form->evento('ver_otros_6')->vinculo()->agregar_parametro('filtro', $this->s__sede);
    }
    
    function conf__grafico_1a(toba_ei_grafico $grafico)
    {
        
        /**********************PRIMER SERIE********************************/
        $grafico->conf()->canvas__set_titulo('1a) Hiciste Matemática en el último año del colegio de nivel medio');
        
        if ($this->s__cantidad == 0)
            return;
        
        $where = $this->dep('filtro')->get_sql_where();
        
        $datosTrue = toba::consulta_php('co_encuestas_ing')->get_pregunta_1a($where,'true');
        $datosFalse = toba::consulta_php('co_encuestas_ing')->get_pregunta_1a($where,'false');
        
        if (!isset($datosTrue) && !isset($datosFalse))
            return;
        
        $datos = array();
        $datos[1] = $datosTrue['cantidad'];
        $datos[2] = $datosFalse['cantidad'];
        $leyendas = array('SI','NO');
        
        $grafico->conf()
                ->serie__agregar('nombre', $datos)    
                ->serie__set_leyendas($leyendas)
                ->serie__set_tema('sand')
                ->serie__set_centro(0.4);

    }
    
    function conf__grafico_1b(toba_ei_grafico $grafico)
    {      
        
        $grafico->conf()->canvas__set_titulo('1b) Hiciste Contabilidad en el último año del colegio de nivel medio');
        
        if ($this->s__cantidad == 0)
            return;
        
        $where = $this->dep('filtro')->get_sql_where();
    
        $datosTrue = toba::consulta_php('co_encuestas_ing')->get_pregunta_1b($where, 'true');
        $datosFalse = toba::consulta_php('co_encuestas_ing')->get_pregunta_1b($where, 'false');
        
        $datos = array();
        $datos[1] = $datosTrue['cantidad'];
        $datos[2] = $datosFalse['cantidad'];
        $leyendas = array('SI','NO');
                
        $grafico->conf()
                ->serie__agregar('nombre', $datos)    
                ->serie__set_leyendas($leyendas)
                ->serie__set_tema('sand')
                ->serie__set_centro(0.4);
    }
    
    function conf__grafico_2(toba_ei_grafico $grafico)
    {
        
        $grafico->conf()->canvas__set_titulo('2) Que carrera elegiste');
        
        if ($this->s__cantidad == 0)
            return;
        
        $where = $this->dep('filtro')->get_sql_where();
    
        $registro = toba::consulta_php('co_encuestas_ing')->get_pregunta_2($where);

        $datos = array();
        $i = 0;
        
        foreach($registro as $reg) {
            $datos[$i] = $reg['op'.($i+1)];  
            $i++;    
        }

        
        $graph = $grafico->conf()->canvas();    //Con esto obtengo el objeto jpgraph instanciado
        
        $graph->Set90AndMargin(100,40,40,40); 
        
        $graph->xaxis->SetTickLabels(array('C.P.','L. Admin.','L. Econ.','L. Admin. E.','TUC','TUAB','TUAP','TUAA','TUAC','No sabe'));
        $grafico->conf()->serie__agregar('barras_1', $datos);
        $p1 = $grafico->conf()->serie('barras_1');   //Con esto obtengo el plot
        
    }  
    
    function conf__grafico_3a(toba_ei_grafico $grafico)
    {
        $grafico->conf()->canvas__set_titulo('3a) Por qué elegiste esta carrera');
        
        if ($this->s__cantidad == 0)
            return;
        
        $where = $this->dep('filtro')->get_sql_where();

        $registro = toba::consulta_php('co_encuestas_ing')->get_pregunta_3a($where);
        
        $datos = array();
        $i = 0;
        
        foreach($registro as $reg) {
            $datos[$i] = $reg['op'.($i+1)];  
            $i++;    
        }

        $graph = $grafico->conf()->canvas();    //Con esto obtengo el objeto jpgraph instanciado
        
        $graph->Set90AndMargin(160,40,40,40);
        
        $graph->xaxis->SetTickLabels(array('Salida laboral','Esta en la ciudad',
                            'Sugerencia de familiares','Otros'));
        $grafico->conf()->serie__agregar('barras_1', $datos);
        $p1 = $grafico->conf()->serie('barras_1');   //Con esto obtengo el plot
        
    } 
    
    function conf__grafico_3b(toba_ei_grafico $grafico)
    {
        $grafico->conf()->canvas__set_titulo('3b) Por qué elegiste esta universidad');
        
        if ($this->s__cantidad == 0)
            return;
        
        $where = $this->dep('filtro')->get_sql_where();
        
        $registro = toba::consulta_php('co_encuestas_ing')->get_pregunta_3b($where);
        
        $datos = array();
        $i = 0;
        
        foreach($registro as $reg) {
            $datos[$i] = $reg['op'.($i+1)];  
            $i++;    
        }

        $graph = $grafico->conf()->canvas();    //Con esto obtengo el objeto jpgraph instanciado
        
        $graph->Set90AndMargin(160,40,40,40);
        
        $graph->xaxis->SetTickLabels(array('Pública y gratuita','Calidad académica',
                            'No acceder a otra oferta','Otros'));
        $grafico->conf()->serie__agregar('barras_1', $datos);
        
    } 
    
    function conf__grafico_4(toba_ei_grafico $grafico)
    {
        $grafico->conf()->canvas__set_titulo('4) Tu horario de preferencia de cursado sería?');
        
        if ($this->s__cantidad == 0)
            return;
        
        $where = $this->dep('filtro')->get_sql_where();
        
        $registro = toba::consulta_php('co_encuestas_ing')->get_pregunta_4($where);
        
        $datos = array();
        $i = 0;
        
        foreach($registro as $reg) {
            $datos[$i] = $reg['op'.($i+1)];  
            $i++;    
        }
        
        $graph = $grafico->conf()->canvas();    //Con esto obtengo el objeto jpgraph instanciado
        
        $graph->xaxis->SetTickLabels(array('Mañana','Tarde', 'Noche','Indistinto'));
        $grafico->conf()->serie__agregar('barras_1', $datos);
        
        
    } 
    
    function conf__grafico_5(toba_ei_grafico $grafico)
    {
        $grafico->conf()->canvas__set_titulo('5) Cúales crees que podrían ser tus dificutades?');
        
        if ($this->s__cantidad == 0)
            return;
        
        $where = $this->dep('filtro')->get_sql_where();

        $registro = toba::consulta_php('co_encuestas_ing')->get_pregunta_5($where);
        
        $datos = array();
        $i = 0;
        
        foreach($registro as $reg) {
            $datos[$i] = $reg['op'.($i+1)];  
            $i++;    
        }

        $graph = $grafico->conf()->canvas();    //Con esto obtengo el objeto jpgraph instanciado
        
        $graph->Set90AndMargin(190,40,40,40);
        
        $graph->xaxis->SetTickLabels(array('Conocimiento en matemática','Conocimiento en Contabilidad',
                            'Conocimiento en informática', 'Técnicas de estudio',
                            'Asignatura muy dificil', 'La carrera no me guste', 'Problemas económicos',
                            'Extrañar a familiares', 'No encontrar grupo de estudio', 'Otros'));
        $grafico->conf()->serie__agregar('barras_1', $datos);
        
    }   
    
    function conf__grafico_6(toba_ei_grafico $grafico)
    {
        $grafico->conf()->canvas__set_titulo('6) Cómo te enteraste de la oferta académica de nuestra facultad?');
        
        if ($this->s__cantidad == 0)
            return;
        
        $where = $this->dep('filtro')->get_sql_where();
        
        $registro = toba::consulta_php('co_encuestas_ing')->get_pregunta_6($where);
        
        $datos = array();
        $i = 0;
        
        foreach($registro as $reg) {
            $datos[$i] = $reg['op'.($i+1)];  
            $i++;    
        }

        $graph = $grafico->conf()->canvas();    //Con esto obtengo el objeto jpgraph instanciado
        
        $graph->Set90AndMargin(80,40,40,40); 
        
        $graph->xaxis->SetTickLabels(array('Web','Terceros', 'Escuela','Folletería', 'Otros'));
        $grafico->conf()->serie__agregar('barras_1', $datos);
        
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

    //-----------------------------------------------------------------------------------
    //---- form -------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------

    function conf__form(encuestasfce_ei_formulario $form)
    {
        $where = $this->dep('filtro')->get_sql_where();
        $this->s__sede = $where;
        $registro = toba::consulta_php('co_encuestas_ing')->get_cantidad_por_sede($where);
        
        $form->ef('cantidad')->set_estado($registro['total']);

        $this->s__cantidad = $registro['total'];
    }

    
    function vista_impresion_html(toba_impresion $salida)
    {
        $bandera = toba::memoria()->get_parametro('evento');
        $where = toba::memoria()->get_parametro('filtro');
        
        switch ($where) {
            case "1=1":
                $sede = "Todas";
                break;
            case "ubicacion = '3'":
                $sede = "Trelew";
                break;
            case "ubicacion = '1'":
                $sede = "Comodoro Rivadavia";
                break;
            case "ubicacion = '2'":
                $sede = "Esquel";
                break; 
        }
        
        if (strcmp($bandera,"3a") == 0) {
            $registro = toba::consulta_php('co_encuestas_ing')->get_otros_3a($where);
        }
        if (strcmp($bandera,"3b") == 0) {
            $registro = toba::consulta_php('co_encuestas_ing')->get_otros_3b($where);
        }
        if (strcmp($bandera,"5") == 0) {
            $registro = toba::consulta_php('co_encuestas_ing')->get_otros_5($where);
        }
        if (strcmp($bandera,"6") == 0) {
            $registro = toba::consulta_php('co_encuestas_ing')->get_otros_6($where);
        }
        
        $salida->titulo('LISTADO DE OPCIÓN OTROS', 16, array( 'justification' => 'center'));
        
        $salida->subtitulo('Pregunta: '. $bandera, 14);
        $salida->subtitulo('Ubicacion: '. $sede, 14);
        
        
        foreach ($registro as $reg) {
            $salida->mensaje($reg['otro'], 10);
        }
    }

}

