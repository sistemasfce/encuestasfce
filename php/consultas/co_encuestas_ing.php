<?php

class co_encuestas_ing
{
    function get_encuestas($where='1=1')
    {
        $sql = "SELECT *,
                    CASE WHEN ubicacion = 1 THEN 'CR'
                        WHEN ubicacion = 2 THEN 'ES'
                        WHEN ubicacion = 3 THEN 'TW'
                        END ubicacion_desc
		FROM encuestas_ing
		WHERE $where
		ORDER BY encuesta_ing
        ";
	return toba::db()->consultar($sql);
    }
    
    function get_cantidad_por_sede($where)
    {
            $sql = "SELECT COUNT (*) as total
                    FROM public.encuestas_ing
                    WHERE $where
                    ";
            return toba::db()->consultar_fila($sql);
    }


    function get_pregunta_1a($where, $condicion)
    {
            $sql = "SELECT COUNT (*) as cantidad 
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_1a = $condicion
                            ";
            return toba::db()->consultar_fila($sql);
    }

    function get_pregunta_1b($where, $condicion)
    {
            $sql = "SELECT COUNT (*) as cantidad 
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_1b = $condicion
                            ";
            return toba::db()->consultar_fila($sql);
    }

    function get_pregunta_2($where)
    {
            for ($i=1; $i<=10; $i++) {
                    $sql = "SELECT COUNT (*) as op$i
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_2_op$i = true
                            ";
                    $registro[] = toba::db()->consultar_fila($sql);
            }
            return $registro;
    }

    function get_pregunta_3a($where)
    {
            for ($i=1; $i<=3; $i++) {
                    $sql = "SELECT COUNT (*) as op$i
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_3a_op$i = true
                            ";
                    $registro[] = toba::db()->consultar_fila($sql);
            }
            // calcular los q eligen OTROS
            $sql = "SELECT COUNT (*) as op4
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_3a_op4 is not  null
                            ";
            $registro[] = toba::db()->consultar_fila($sql);
            return $registro;
    }

    function get_otros_3a($where)
    {
            $sql = "SELECT pregunta_3a_op4 as otro
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_3a_op4 is not null
                            ";
            return toba::db()->consultar($sql);
    }

    function get_pregunta_3b($where)
    {
            for ($i=1; $i<=3; $i++) {
                    $sql = "SELECT COUNT (*) as op$i
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_3b_op$i = true
                            ";
                    $registro[] = toba::db()->consultar_fila($sql);
            }
            // calcular los q eligen OTROS
            $sql = "SELECT COUNT (*) as op4
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_3b_op4 is not null
                            ";
            $registro[] = toba::db()->consultar_fila($sql);
            return $registro;
    }

    function get_otros_3b($where)
    {
            $sql = "SELECT pregunta_3b_op4 as otro
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_3b_op4 is not null
                            ";
            return toba::db()->consultar($sql);
    }

    function get_pregunta_4($where)
    {
            for ($i=1; $i<=4; $i++) {
                    $sql = "SELECT COUNT (*) as op$i
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_4_op$i = true
                            ";
                    $registro[] = toba::db()->consultar_fila($sql);
            }
            return $registro;
    }

   function get_pregunta_5($where)
    {
            for ($i=1; $i<=9; $i++) {
                    $sql = "SELECT COUNT (*) as op$i
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_5_op$i = true
                            ";
                    $registro[] = toba::db()->consultar_fila($sql);
            }
            // calcular los q eligen OTROS
            $sql = "SELECT COUNT (*) as op$i
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_5_op10 is not null
                            ";
            $registro[] = toba::db()->consultar_fila($sql);
            return $registro;
    }

    function get_otros_5($where)
    {
            $sql = "SELECT pregunta_5_op10 as otro
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_5_op10 is not null
                            ";
            return toba::db()->consultar($sql);
    }
    function get_pregunta_6($where)
    {
            for ($i=1; $i<=4; $i++) {
                    $sql = "SELECT COUNT (*) as op$i
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_6_op$i = true
                            ";
                    $registro[] = toba::db()->consultar_fila($sql);
            }
            // calcular los q eligen OTROS
            $sql = "SELECT COUNT (*) as op$i
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_6_op5 is not null
                            ";
            $registro[] = toba::db()->consultar_fila($sql);
            return $registro;
    }

    function get_otros_6($where)
    {
            $sql = "SELECT pregunta_6_op5 as otro
                            FROM public.encuestas_ing 
                            WHERE $where AND pregunta_6_op5 is not null
                            ";
            return toba::db()->consultar($sql);
    }

    function get_ciclos_lectivos()
    {
            $sql = "SELECT *
                            FROM public.ciclos_lectivos
                            ";
            return toba::db()->consultar($sql);
    }   
    
}
