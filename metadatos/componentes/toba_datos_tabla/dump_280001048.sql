------------------------------------------------------------
--[280001048]--  DT - encuestas_ext_inv 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 280
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'encuestasfce', --proyecto
	'280001048', --objeto
	NULL, --anterior
	NULL, --identificador
	NULL, --reflexivo
	'toba', --clase_proyecto
	'toba_datos_tabla', --clase
	'280000001', --punto_montaje
	NULL, --subclase
	NULL, --subclase_archivo
	NULL, --objeto_categoria_proyecto
	NULL, --objeto_categoria
	'DT - encuestas_ext_inv', --nombre
	NULL, --titulo
	NULL, --colapsable
	NULL, --descripcion
	'encuestasfce', --fuente_datos_proyecto
	'encuestasfce', --fuente_datos
	NULL, --solicitud_registrar
	NULL, --solicitud_obj_obs_tipo
	NULL, --solicitud_obj_observacion
	NULL, --parametro_a
	NULL, --parametro_b
	NULL, --parametro_c
	NULL, --parametro_d
	NULL, --parametro_e
	NULL, --parametro_f
	NULL, --usuario
	'2019-10-29 09:33:03', --creacion
	NULL  --posicion_botonera
);
--- FIN Grupo de desarrollo 280

------------------------------------------------------------
-- apex_objeto_db_registros
------------------------------------------------------------
INSERT INTO apex_objeto_db_registros (objeto_proyecto, objeto, max_registros, min_registros, punto_montaje, ap, ap_clase, ap_archivo, tabla, tabla_ext, alias, modificar_claves, fuente_datos_proyecto, fuente_datos, permite_actualizacion_automatica, esquema, esquema_ext) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	NULL, --max_registros
	NULL, --min_registros
	'280000001', --punto_montaje
	'1', --ap
	NULL, --ap_clase
	NULL, --ap_archivo
	'encuestas_ext_inv', --tabla
	NULL, --tabla_ext
	NULL, --alias
	'0', --modificar_claves
	'encuestasfce', --fuente_datos_proyecto
	'encuestasfce', --fuente_datos
	'1', --permite_actualizacion_automatica
	NULL, --esquema
	'public'  --esquema_ext
);

------------------------------------------------------------
-- apex_objeto_db_registros_col
------------------------------------------------------------

--- INICIO Grupo de desarrollo 280
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001271', --col_id
	'encuesta_ext_inv', --columna
	'E', --tipo
	'1', --pk
	'encuestas_ext_inv_encuesta_ext_inv_seq', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'1', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001272', --col_id
	'docente', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'50', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001273', --col_id
	'inv_causa', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'10', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001274', --col_id
	'inv_causa_otro', --columna
	'X', --tipo
	'0', --pk
	'', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001275', --col_id
	'inv_linea', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'10', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001276', --col_id
	'ext_causa', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'10', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001277', --col_id
	'ext_causa_otro', --columna
	'X', --tipo
	'0', --pk
	'', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001278', --col_id
	'ext_linea', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'10', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001279', --col_id
	'profundizar', --columna
	'X', --tipo
	'0', --pk
	'', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280001048', --objeto
	'280001280', --col_id
	'referentes', --columna
	'X', --tipo
	'0', --pk
	'', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'encuestas_ext_inv'  --tabla
);
--- FIN Grupo de desarrollo 280
