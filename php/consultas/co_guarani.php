<?php

class co_guarani
{
    function get_encuestas($hash)
    {
        $sql = "SELECT persona, comision
                FROM gde_encuestas_pendientes 
                    LEFT OUTER JOIN gde_formularios ON gde_encuestas_pendientes.formulario = gde_formularios.formulario
                WHERE hash = '$hash'
        ";
	return toba::db('guarani')->consultar_fila($sql);
    }
    
    function get_comision($comision)
    {   
        $sql = "SELECT comision, sga_catedras.nombre as catedra, sga_comisiones.nombre
                FROM sga_comisiones LEFT OUTER JOIN sga_catedras ON sga_comisiones.catedra = sga_catedras.catedra
                WHERE comision = $comision
        ";
	return toba::db('guarani')->consultar_fila($sql);       
    }
    
    function get_docentes_comision($comision)
    {   
        $sql = "SELECT comision, sga_docentes_comision.docente, sga_docentes_responsabilidades.descripcion as responsabilidad, mdp_personas.apellido, mdp_personas.nombres
                FROM sga_docentes_comision 
                        LEFT OUTER JOIN sga_docentes ON (sga_docentes_comision.docente = sga_docentes.docente)
                        LEFT OUTER JOIN mdp_personas ON (sga_docentes.persona = mdp_personas.persona)
                        LEFT OUTER JOIN sga_docentes_responsabilidades ON (sga_docentes_comision.responsabilidad = sga_docentes_responsabilidades.responsabilidad)
                WHERE comision = $comision
        ";
	return toba::db('guarani')->consultar($sql);       
    }   
    
    function put_encuesta($hash)
    {
        $sql = "UPDATE gde_encuestas_pendientes SET fecha_respuesta = CURRENT_TIMESTAMP 
                WHERE hash = '$hash' AND fecha_respuesta IS NULL
        ";
        return toba::db('guarani')->consultar($sql);   
    }
}
