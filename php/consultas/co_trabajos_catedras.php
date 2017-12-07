<?php

class co_trabajos_catedras
{
        function get_comercios()
        {   
                $sql = "SELECT *
                        FROM comercio
                        WHERE extract(year FROM fecha_encuesta) = '2017'
                        ";

                return toba::db()->consultar($sql);

        }  
}
