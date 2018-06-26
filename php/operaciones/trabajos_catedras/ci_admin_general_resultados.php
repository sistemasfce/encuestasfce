<?php

class ci_admin_general_resultados extends encuestasfce_ci
{
    function conf__cuadro(encuestasfce_ei_cuadro $cuadro)
    {
        $datos = toba::consulta_php('co_trabajos_catedras')->get_comercios();
        $cuadro->set_datos($datos);
    }
}

