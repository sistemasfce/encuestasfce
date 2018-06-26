<?php
/**
 * Esta clase fue y será generada automáticamente. NO EDITAR A MANO.
 * @ignore
 */
class encuestasfce_autoload 
{
	static function existe_clase($nombre)
	{
		return isset(self::$clases[$nombre]);
	}

	static function cargar($nombre)
	{
		if (self::existe_clase($nombre)) { 
			 require_once(dirname(__FILE__) .'/'. self::$clases[$nombre]); 
		}
	}

	static protected $clases = array(
		'encuestasfce_ci' => 'extension_toba/componentes/encuestasfce_ci.php',
		'encuestasfce_cn' => 'extension_toba/componentes/encuestasfce_cn.php',
		'encuestasfce_datos_relacion' => 'extension_toba/componentes/encuestasfce_datos_relacion.php',
		'encuestasfce_datos_tabla' => 'extension_toba/componentes/encuestasfce_datos_tabla.php',
		'encuestasfce_ei_arbol' => 'extension_toba/componentes/encuestasfce_ei_arbol.php',
		'encuestasfce_ei_archivos' => 'extension_toba/componentes/encuestasfce_ei_archivos.php',
		'encuestasfce_ei_calendario' => 'extension_toba/componentes/encuestasfce_ei_calendario.php',
		'encuestasfce_ei_codigo' => 'extension_toba/componentes/encuestasfce_ei_codigo.php',
		'encuestasfce_ei_cuadro' => 'extension_toba/componentes/encuestasfce_ei_cuadro.php',
		'encuestasfce_ei_esquema' => 'extension_toba/componentes/encuestasfce_ei_esquema.php',
		'encuestasfce_ei_filtro' => 'extension_toba/componentes/encuestasfce_ei_filtro.php',
		'encuestasfce_ei_firma' => 'extension_toba/componentes/encuestasfce_ei_firma.php',
		'encuestasfce_ei_formulario' => 'extension_toba/componentes/encuestasfce_ei_formulario.php',
		'encuestasfce_ei_formulario_ml' => 'extension_toba/componentes/encuestasfce_ei_formulario_ml.php',
		'encuestasfce_ei_grafico' => 'extension_toba/componentes/encuestasfce_ei_grafico.php',
		'encuestasfce_ei_mapa' => 'extension_toba/componentes/encuestasfce_ei_mapa.php',
		'encuestasfce_servicio_web' => 'extension_toba/componentes/encuestasfce_servicio_web.php',
		'encuestasfce_comando' => 'extension_toba/encuestasfce_comando.php',
		'encuestasfce_modelo' => 'extension_toba/encuestasfce_modelo.php',
	);
}
?>