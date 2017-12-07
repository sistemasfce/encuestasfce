<?php

class co_encuestas_ing
{
    function get_encuestas($where='1=1')
    {
        $sql = "SELECT *
		FROM encuestas_ing
		WHERE $where
		ORDER BY encuesta_ing
        ";
	return toba::db()->consultar($sql);
    }
}
