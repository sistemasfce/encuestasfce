<?php

class ci_encuesta_depto_contable_resultados extends encuestasfce_ci
{
    function conf__cuadro(encuestasfce_ei_cuadro $cuadro)
    {
        $datos = toba::consulta_php('co_encuestas_fce')->get_encuestas_depto_contable();
        $cuadro->set_datos($datos);
    }
}