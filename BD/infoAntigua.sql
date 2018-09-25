drop database gimnasioInfantil;
create database gimnasioInfantil;
use gimnasioInfantil;

create table TB_ROLES(
	ro_idRol	int primary key auto_increment not null,
	ro_nombre	varchar(15));

insert into ROLES values
(null, 'Administrador',1),
(null, 'Directivo',1),
(null, 'Profesor',1)
(null, 'Alumno',1);

create table TB_GRADOS(

	gr_idGrado	int primary key auto_increment not null,
	gr_nombre	varchar(15));

insert into GRADOS values
	(null, 'Parvulos'),
	(null, 'Pre-Kinder'),
	(null, 'Kinder'),
	(null, 'Transicion');


create table TB_CURSOS(
	cu_idCurso	 int primary key auto_increment not null,
	cu_nombre	 varchar(15),
	cu_idGradoFk int(4),
	FOREIGN KEY (cu_idGradoFk)REFERENCES TB_GRADOS (gr_idGrado));

insert into TB_CURSOS values

(null, 'Parvulos',1),
(null, 'Pre-Kinder A',2),
(null, 'Pre-Kinder B',2),
(null, 'Pre-Kinder C',2),
(null, 'Kinder A',3),
(null, 'Kinder B',3),
(null, 'Kinder C',3),
(null, 'Transicion A',4),
(null, 'Transicion B',4);

create table TB_MATERIAS(
	ma_idMateria	int primary key auto_increment not null,
	ma_nombre	varchar(15));

insert into TB_MATERIAS values
(null, 'Danzas'),
(null, 'Ingles'),
(null, 'Intra e inter personal'),
(null, 'Kinestesica'),
(null, 'Linguistica'),
(null, 'Logica matematica'),
(null, 'Musica'),
(null, 'Naturista'),
(null, 'Sistemas');

create table TB_PERIODOS(
	pe_idPeriodo	int primary key auto_increment not null,
	pe_nombre	varchar(15),
	pe_estado  boolean);

insert into TB_PERIODOS values
(null, 'Primero',1),
(null, 'Segundo',1),
(null,'Tercero',1),
(null, 'Cuarto',1);

create table TB_NOTAS(
	no_idNota	int primary key auto_increment not null,
	no_nombre	varchar(15));

insert into TB_NOTAS (no_idNota, no_nombre) values
(null, 'SN'),
(null, 'NA'),
(null, 'VC'),
(null, 'C');

create table TB_TIPODOCUMENTO(
	ti_idTipoDocumento	int primary key auto_increment not null,
	ti_nombre	varchar(25));

insert into TB_TIPODOCUMENTO values
(null, 'NIUP'),
(null, 'Tarjeta de Identidad'),
(null, 'Cedula de Ciudadania'),
(null, 'Cedula de Extranjeria');

create table TB_USUARIOS(
	us_idUsuario int primary key auto_increment not null,
	us_usuario	 char(15),
	us_password	 varchar(15),
	us_nombre	 char(20),
	us_apellido char(20),
	us_tipoDocumentoFk int(4),
	us_ni		 int(12),
	us_idRolFk	 int(4),
	us_idGradoFk int(4),
	us_idCursoFk int(4),
	FOREIGN KEY (us_tipoDocumentoFk) REFERENCES TB_TIPODOCUMENTO (ti_idTipoDocumento),
	FOREIGN KEY (us_idRolFk) REFERENCES TB_ROLES (ro_idRol),
	FOREIGN KEY (us_idCursoFk)REFERENCES TB_CURSOS (cu_idCurso),
	FOREIGN KEY (us_idGradoFk)REFERENCES TB_GRADOS (gr_idGrado));

insert into TB_USUARIOS values
(null, 'FrancoR', 	'1234567890', 'Ricardo',      'Franco Rios',    '3','1233888846' ,'1',null ,null),
(null, 'BrocheroL', '1234567890', 'Ligia',        'Brochero',       '3','39630257'   ,'2',null ,null),
(null, 'RiosG', 	'1234567890', 'Gloria Albany','Rios',           '3','30302110'   ,'2',null ,null),
(null, 'PenaretaA', '1234567890', 'Ana',          'Penareta',       '3','52515597'   ,'3','1'  ,null),
(null, 'BrocheroM', '1234567890', 'Marisol',      'Brochero',       '3','23799279'   ,'3','1'  ,'1'),
(null, 'HernandezL','1234567890', 'Luisa',        'Hernandez',      '3','51876232'   ,'3','2'  ,'2'),
(null, 'MartinezC', '1234567890', 'Claudia',      'Martinez',       '3','52797156'   ,'3','3'  ,'2'),
(null, 'LopezZ',	'1234567890', 'Zeidy',        'Lopez',          '3','1015443630' ,'3','4'  ,'2'),
(null, 'AldanaL',   '1234567890', 'Luz',          'Aldana',         '3','51814114'   ,'3','5'  ,'3'),
(null, 'GuerreroM', '1234567890', 'Monica',       'Guerrero',       '3','52396378'   ,'3','6'  ,'3'),
(null,'RodriguezY', '1234567890', 'Yaneth',       'Rodriguez',      '3','60327355'   ,'3','7'  ,'3'),
(null,'FrancoJ',	'1234567890', 'Jaime Augusto','Franco Carvajal','3','10250035'   ,'3','8'  ,'4'),
(null,'EcheverryM', '1234567890', 'Mayra',        'Echeverry',      '3','38140727'   ,'3','9'  ,'4');

create table TB_ESTUDIANTES(
	es_idEtudiantes int primary key auto_increment not null,
	es_nombre	 char(20),
	es_apellido char(20),
	es_codigo int(20),
	es_tipoDocumentoFk int(4),
	es_ni		 int(12),
	es_jornada char(12),
	es_idRolFk	 int(4),
	es_idGradoFk int(4),
	es_idCursoFk int(4),
	es_foto longblob(),
	FOREIGN KEY (us_tipoDocumentoFk) REFERENCES TB_TIPODOCUMENTO (ti_idTipoDocumento),
	FOREIGN KEY (us_idRolFk) REFERENCES TB_ROLES (ro_idRol),
	FOREIGN KEY (us_idCursoFk)REFERENCES TB_CURSOS (cu_idCurso),
	FOREIGN KEY (us_idGradoFk)REFERENCES TB_GRADOS (gr_idGrado));

insert into TB_ESTUDIANTES values
(null,"Ricardo","Lopez",0001,0,79846793,"Unica",3,1,1);


create table TB_PROCESOS(
	pro_idProceso int primary key auto_increment not null,
	pro_nombre varchar (30),
	pro_idMateriaFk int(4),
	pro_idPeriodoFk int(4),
	pro_idGradoFk   int(4),
	FOREIGN KEY (pro_idMateriaFk) REFERENCES TB_MATERIAS (ma_idMateria),
	FOREIGN KEY (pro_idPeriodoFk) REFERENCES TB_PERIODOS (pe_idPeriodo),
	FOREIGN KEY (pro_idGradoFk)   REFERENCES TB_GRADOS (gr_idGrado));

insert into TB_PROCESOS
(pro_idProceso,pro_nombre,pro_idMateriaFk,pro_idPeriodoFk,pro_idGradoFk) values
#1 PERIODO  PRE-KINDER
(null,'DESARROLLO Y ESTIMULACION DEL SISTEMA LOCOMOTOR, RITMO Y ESPACIO','1','1','2'),
(null,'ORALIDAD Y COMPRENSIÓN','2','1','2'),
(null,'FORTALECIMIENTO DEL VALOR DE LA RESPONSABILIDAD E IDENTIDAD','3','1','2'),
(null,'APRESTAMIENTO Y CREATIVIDAD','4','1','2'),
(null,'PRODUCCION TEXTUAL Y TOPOGRAFIA DE LA ESCRITURA','5','1','2'),
(null,'RELACIONES ESPACIALES, ATRIBUTOS, PRINCIPIOS DE CONTEO','6','1','2'),
(null,'ATENCIÓN Y MEMORIA ','7','1','2'),
(null,'CONCIENTIZACION AMBIENTAL E HIGIENE PERSONAL','8','1','2'),
(null,'CONOCIMIENTOS BÁSICOS','9','1','2'),
#2 PERIODO PRE-KINDER
(null,'RITMO,  COORDINACIÓN Y COREOGRAFÍA ','1','2','2'),
(null,'ORALIDAD Y COMPRENSIÓN','2','2','2'),
(null,'RECONOCIMIENTO DEL OTRO E INDEPENDENCIA','3','2','2'),
(null,'DESARROLLO MOTOR FINO Y GRUESO.','4','2','2'),
(null,'ORALIDAD, INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL','5','2','2'),
(null,'NOCIÓN DE FORMA Y COLOR. CONSTRUCCIÓN NUMÉRICA.','6','2','2'),
(null,'MOVIMIENTO- SONIDO -SILENCIO','7','2','2'),
(null,'CULTURA AMBIENTAL','8','2','2'),
(null,'SOFTWARE Y COMPORTAMIENTO','9','2','2'),
#3 PERIODO PRE-KINDER
(null,'RITMOS INFANTILES RONDAS Y CANTICUENTOS','1','3','2'),
(null,'COLORES PRIMARIOS, ANIMALES Y MIEMBROS DE LA FAMILIA','2','3','2'),
(null,'RECONOCIMIENTO DEL OTRO -ACEPTACIÓN Y VALORES','3','3','2'),
(null,'MOTRICIDAD GRUESA –MOTRICIDAD FINA','4','3','2'),
(null,'INTERPRETACIÓN DE IMÁGENES ANÁLISIS TEXTUAL','5','3','2'),
(null,'CONSTRUCCIÓN CONCEPTO DE NÚMERO Y CONTEO CONSECUTIVO','6','3','2'),
(null,'EXPLORAR LAS CUALIDADES DEL SONIDO','7','3','2'),
(null,'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE','8','3','2'),
(null,'SOFTWARE Y PARTICIPACIÓN','9','3','2'),
#4 PERIODO PRE-KINDER
(null,'MANEJO DE TIEMPOS Y PLANOS COREOGRAFICOS','1','4','2'),
(null,'PARTES DEL CUERPO, NÚMEROS Y FIGURAS GEOMÉTRICAS','2','4','2'),
(null,'VALORES','3','4','2'),
(null,'DESTREZA  MANUAL','4','4','2'),
(null,'ANÁLISIS Y PRODUCCIÓN DE TEXTO','5','4','2'),
(null,'CONSTRUCCIÓN NUMÉRICA','6','4','2'),
(null,'INTERPRETACIÓN VOCAL','7','4','2'),
(null,'CULTURA AMBIENTAL','8','4','2'),
(null,'INTERNET E INVESTIGACIÓN','9','4','2'),
#1 PERIODO  KINDER
(null,'LATERALIDAD  Y COREOGRAFIA','1','1','3'),
(null,'VOCABULARIO','2','1','3'),
(null,'FORTALECIMIENTO DE LOS VALORES RESPETO Y RESPONSABILIDAD','3','1','3'),
(null,'ESQUEMA Y DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA','4','1','3'),
(null,'CONTEXTUALIZACIÓN ESCRITA Y PRODUCCIÓN TEXTUAL ','5','1','3'),
(null,'CONSTRUCCIÓN DEL CONCEPTO DE NÚMERO - NOCIONES','6','1','3'),
(null,'ATENCIÓN Y MEMORIA','7','1','3'),
(null,'PRESERVACIÓN Y CUIDADO DEL AGUA','8','1','3'),
(null,'CONOCIMIENTOS BÁSICOS','9','1','3'),
#2 PERIODO KINDER
(null,'RITMO COORDINACION Y COREOGRAFIA','1','2','3'),
(null,'VOCABULARIO','2','2','3'),
(null,'APRENDIZAJE COOPERATIVO Y DESARROLLO AUTÓNOMO','3','2','3'),
(null,'DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA','4','2','3'),
(null,'INTERPRETACION - PRODUCCION TEXTUAL','5','2','3'),
(null,'UBICACIÓN POSICIONAL Y OPERACIONES MATEMÁTICAS','6','2','3'),
(null,'SONIDO -SILENCIO','7','2','3'),
(null,'CULTURA AMBIENTAL','8','2','3'),
(null,'SOFTWARE Y COMPORTAMIENTO','9','2','3'),
#3 PERIODO KINDER
(null,'EXPRESION CORPORAL Y GESTUAL','1','3','3'),
(null,'VOCABULARIO Y CONTEXTO, LOS SENTIDOS Y LA FAMILIA','2','3','3'),
(null,'FORTALECIMIENTO DE LOS VALORES','3','3','3'),
(null,'DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA','4','3','3'),
(null,'CONTEXTUALIZACIÓN ESCRITA Y PRODUCCIÓN TEXTUAL','5','3','3'),
(null,'CONSTRUCCIÓN DEL CONCEPTO DE NÚMERO','6','3','3'),
(null,'DISTINGUE LAS CUALIDADES DEL SONIDO','7','3','3'),
(null,'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE','8','3','3'),
(null,'SOFTWARE Y COMPORTAMIENTO','9','3','3'),
#4 PERIODO KINDER
(null,'MONTAJE ESCENICO','1','4','3'),
(null,'VOCABULARY','2','4','3'),
(null,'VALORES DAVINCIANOS','3','4','3'),
(null,'MOTRICIDAD FINA Y GRUESA','4','4','3'),
(null,'INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL. ','5','4','3'),
(null,'CONSTRUCCIÓN DEL CONCEPTO DE NUMERO Y OPERACIONES LÓGICAS','6','4','3'),
(null,'INTERPRETACION VOCAL','7','4','3'),
(null,'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE ','8','4','3'),
(null,'SOFTWARE EDUCATIVO Y NORMAS','9','4','3'),
#1 PERIODO  TRANSICION
(null,'LATERALIDAD Y COREOGRAFIA','1','1','4'),
(null,'VOCABULARIO Y ORALIDAD','2','1','4'),
(null,'VALORES ','3','1','4'),
(null,'CREATIVIDAD Y MOTRICIDAD FINA','4','1','4'),
(null,'INTERPRETACIÓN – PRODUCCIÓN TEXTUAL','5','1','4'),
(null,'UBICACIÓN POSICIONAL Y CARDINALIDAD NUMÉRICA','6','1','4'),
(null,'DISCRIMINACIÓN AUDITIVA','7','1','4'),
(null,'CONCIENTIZACIÓN','8','1','4'),
(null,'CONOCIMIENTOS BASICOS','9','1','4'),
#2 PERIODO TRANSICION
(null,'RITMO,COORDINACION Y COREOGRAFIA','1','2','4'),
(null,'VOCABULARIO Y ESCRITURA ELEMENTAL','2','2','4'),
(null,'VALORES','3','2','4'),
(null,'EXPRESION CORPORAL','4','2','4'),
(null,'PRODUCCIÓN, INTERPRETACIÓN TEXTUAL Y TEMPORALIDAD','5','2','4'),
(null,'UBICACIÓN POSICIONAL - OPERACIONES LÓGICO MATEMÁTICAS','6','2','4'),
(null,'SONIDO -SILENCIO Y RESPIRACIÓN','7','2','4'),
(null,'CULTURA AMBIENTAL E INVESTIGACIÓN','8','2','4'),
(null,'SOFTWARE Y COMPORTAMIENTO','9','2','4'),
#3 PERIODO TRANSICION
(null,'DANZA,  CANTO Y EXPRESION GESTUAL','1','3','3'),
(null,'ORALIDAD Y ESCRITURA','2','3','4'),
(null,'VALORES','3','3','4'),
(null,'MOTRICIDAD GRUESA Y FINA','4','3','4'),
(null,'INTERPRETACIÓN – PRODUCCIÓN TEXTUAL','5','3','4'),
(null,'UBICACIÓN POSICIONAL','6','3','4'),
(null,'MELODÍA - MOVIMIENTO SONORO CONTINUO','7','3','4'),
(null,'CONCIENCIA AMBIENTAL Y ECOLOGIA HUMANA','8','3','4'),
(null,'SOFTWARE','9','3','4'),
#4 PERIODO TRANSICION
(null,'MONTAJE COREOGRÁFICO Y RITMOS LATINOS','1','4','4'),
(null,'ORALIDAD Y ESCRITURA','2','4','4'),
(null,'VALORES','3','4','4'),
(null,'EQUILIBRIO Y COORDINACIÓN','4','4','4'),
(null,'INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL','5','4','4'),
(null,'UBICACIÓN POSICIONAL Y CONCEPTO NUMÉRICO','6','4','4'),
(null,'APLICACIONES A LA PRACTICA INSTRUMENTAL','7','4','4'),
(null,'APLICACIÓN DE LAS TRES R','8','4','4'),
(null,'SOFTWARE','9','4','4');

create table TB_COMPETENCIAS(
	co_idLogro int primary key auto_increment not null,
	co_nombre varchar(15),
	co_descripcion	char(50),
	co_idProcesoFk	int(4),
	co_estado boolean,
	FOREIGN KEY (lo_idProcesoFk) REFERENCES TB_PROCESOS(pro_idProceso));

insert into TB_COMPETENCIAS
(lo_idLogro, lo_nombre, lo_descripcion, lo_idProcesoFK) values
(null,'L1K','Coordinacion mano ojo',	   			'',''),
(null,'L2K','Identifica formas y tamaños', 		    '',''),
(null,'L1L','Conoce nombres propios',      		    '',''),
(null,'L2L','Conoce las vocales',          		    '',''),
(null,'L1S','Aprende a utilizar el mouse', 		    '',''),
(null,'L2S','Comprende el uso correcto de internet','',''),
(null,'L1E','Understand the phrases',               '',''),
(null,'L2E','Can write complex texts',              '','');

create table TB_OBSERVACIONES(
	ob_idObservacion int primary key auto_increment not null,
	ob_tipo char(15),
	ob_descripcion varchar(250)
	ob_estado boolean);

create table TB_BOLETINES(
 );