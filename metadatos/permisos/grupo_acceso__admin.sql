
------------------------------------------------------------
-- apex_usuario_grupo_acc
------------------------------------------------------------
INSERT INTO apex_usuario_grupo_acc (proyecto, usuario_grupo_acc, nombre, nivel_acceso, descripcion, vencimiento, dias, hora_entrada, hora_salida, listar, permite_edicion, menu_usuario) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	'Administrador', --nombre
	'0', --nivel_acceso
	'Accede a toda la funcionalidad', --descripcion
	NULL, --vencimiento
	NULL, --dias
	NULL, --hora_entrada
	NULL, --hora_salida
	NULL, --listar
	'1', --permite_edicion
	NULL  --menu_usuario
);

------------------------------------------------------------
-- apex_usuario_grupo_acc_item
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'2'  --item
);
--- FIN Grupo de desarrollo 0

--- INICIO Grupo de desarrollo 280
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000002'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000135'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000136'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000137'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000138'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000139'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000140'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000170'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000182'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000235'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000269'  --item
);
INSERT INTO apex_usuario_grupo_acc_item (proyecto, usuario_grupo_acc, item_id, item) VALUES (
	'encuestasfce', --proyecto
	'admin', --usuario_grupo_acc
	NULL, --item_id
	'280000270'  --item
);
--- FIN Grupo de desarrollo 280
