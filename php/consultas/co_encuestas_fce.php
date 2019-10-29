<?php

class co_encuestas_fce
{
        function get_encuestas_depto_contable()
        {   
                $sql = "SELECT *
                        FROM encuestas_ext_inv
                        
                        ";

                return toba::db()->consultar($sql);

        }  
}
