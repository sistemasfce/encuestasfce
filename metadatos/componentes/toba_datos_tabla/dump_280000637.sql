------------------------------------------------------------
--[280000637]--  DT - informes_pasantes 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 280
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'encuestasfce', --proyecto
	'280000637', --objeto
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
	'DT - informes_pasantes', --nombre
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
	'2018-06-14 12:51:33', --creacion
	NULL  --posicion_botonera
);
--- FIN Grupo de desarrollo 280

------------------------------------------------------------
-- apex_objeto_db_registros
------------------------------------------------------------
INSERT INTO apex_objeto_db_registros (objeto_proyecto, objeto, max_registros, min_registros, punto_montaje, ap, ap_clase, ap_archivo, tabla, tabla_ext, alias, modificar_claves, fuente_datos_proyecto, fuente_datos, permite_actualizacion_automatica, esquema, esquema_ext) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	NULL, --max_registros
	NULL, --min_registros
	'280000001', --punto_montaje
	'1', --ap
	NULL, --ap_clase
	NULL, --ap_archivo
	'informes_pasantes', --tabla
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
	'280000637', --objeto
	'280000955', --col_id
	'informe_pasante', --columna
	'E', --tipo
	'1', --pk
	'informes_pasantes_informe_pasante_seq', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'1', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000956', --col_id
	'fecha', --columna
	'F', --tipo
	'0', --pk
	'', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000957', --col_id
	'persona', --columna
	'E', --tipo
	'0', --pk
	'', --secuencia
	NULL, --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000958', --col_id
	'pregunta_1', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'25', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000959', --col_id
	'pregunta_2', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'25', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000960', --col_id
	'pregunta_3', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'25', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000961', --col_id
	'pregunta_4', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'100', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000962', --col_id
	'pregunta_5', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'100', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000963', --col_id
	'pregunta_6', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'25', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000964', --col_id
	'pregunta_7', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'25', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000965', --col_id
	'pregunta_8', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'100', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000966', --col_id
	'pregunta_9', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'100', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000967', --col_id
	'pregunta_10', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'25', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
INSERT INTO apex_objeto_db_registros_col (objeto_proyecto, objeto, col_id, columna, tipo, pk, secuencia, largo, no_nulo, no_nulo_db, externa, tabla) VALUES (
	'encuestasfce', --objeto_proyecto
	'280000637', --objeto
	'280000968', --col_id
	'pregunta_11', --columna
	'C', --tipo
	'0', --pk
	'', --secuencia
	'2000', --largo
	NULL, --no_nulo
	'0', --no_nulo_db
	NULL, --externa
	'informes_pasantes'  --tabla
);
--- FIN Grupo de desarrollo 280
