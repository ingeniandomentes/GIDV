drop database dbdavinci;
CREATE database dbdavinci;
USE dbdavinci ;

CREATE TABLE roles (
  ro_idRol INT NOT NULL AUTO_INCREMENT,
  ro_nombre VARCHAR(15) NOT NULL,
  ro_estado int not null,
  PRIMARY KEY (ro_idRol));

CREATE TABLE grados (
  gr_idGrado INT NOT NULL AUTO_INCREMENT,
  gr_nombre VARCHAR(15) NOT NULL,
  gr_estado int not null,
  PRIMARY KEY (gr_idGrado));


CREATE TABLE cursos (
  cu_idCurso INT NOT NULL AUTO_INCREMENT,
  cu_nombre VARCHAR(15) NOT NULL,
  cu_idGradoFK INT NOT NULL,
  cu_estado TINYINT NOT NULL,
  PRIMARY KEY (cu_idCurso),
  FOREIGN KEY (cu_idGradoFK)
  REFERENCES dbdavinci.grados (gr_idGrado));

CREATE TABLE tipoDocumento(
  td_idDocumento INT NOT NULL AUTO_INCREMENT,
  td_nombre VARCHAR(25) NOT NULL,
  td_estado int not null,
  PRIMARY KEY (td_idDocumento));

CREATE TABLE usuarios(
  us_idUsuario INT NOT NULL AUTO_INCREMENT,
  us_usuario VARCHAR(15) NOT NULL,
  us_password VARCHAR(15) NOT NULL,
  us_nombre VARCHAR(20) NOT NULL,
  us_apellido VARCHAR(20) NOT NULL,
  us_idtipoDocumentoFK INT NOT NULL,
  us_numeroDocumento INT NOT NULL,
  us_idRolFK INT NOT NULL,
  us_idCursoFK INT NULL,
  us_estado INT NOT NULL,
  PRIMARY KEY (us_idUsuario),
    FOREIGN KEY (us_idtipoDocumentoFK)
    REFERENCES dbdavinci.tipoDocumento (td_idDocumento),
    FOREIGN KEY (us_idRolFK)
    REFERENCES dbdavinci.roles (ro_idRol),
    FOREIGN KEY (us_idCursoFK)
    REFERENCES dbdavinci.cursos (cu_idCurso));

#ALTER TABLE users ADD FOREIGN KEY (us_idtipoDocumentoFK) REFERENCES dbdavinci.tipoDocumento (td_idDocumento);
#ALTER TABLE users ADD FOREIGN KEY (us_idRolFK) REFERENCES dbdavinci.roles (ro_idRol);
#ALTER TABLE users ADD FOREIGN KEY (us_idCursoFK) REFERENCES dbdavinci.cursos (cu_idCurso);

CREATE TABLE materias (
  ma_idMateria INT NOT NULL AUTO_INCREMENT,
  ma_nombre VARCHAR(25) NOT NULL,
  ma_intensidad Int(5) NOT NULL,
  ma_docenteAsignadoFK INT NULL,
  ma_estado int not null,
  PRIMARY KEY (ma_idMateria),
    FOREIGN KEY (ma_docenteAsignadoFK)
    REFERENCES dbdavinci.users (id));

CREATE TABLE periodos (
  pe_idPeriodo INT NOT NULL AUTO_INCREMENT,
  pe_nombre VARCHAR(15) NOT NULL,
  pe_fechaInicial date not null,
  pe_fechaFinal date not null,
  pe_estado TINYINT NOT NULL,
  PRIMARY KEY (pe_idPeriodo));

CREATE TABLE notas (
  no_idNota INT NOT NULL AUTO_INCREMENT,
  no_nombre VARCHAR(15) NOT NULL,
  no_descripcion VARCHAR(15) NOT NULL,
  no_estado int not null,
  PRIMARY KEY (no_idNota));

CREATE TABLE estudiantes (
  es_idEstudiante INT NOT NULL AUTO_INCREMENT,
  es_nombre VARCHAR(20) NOT NULL,
  es_apellido VARCHAR(20) NOT NULL,
  es_codigo INT NOT NULL,
  es_idDocumentoFK INT NOT NULL,
  es_numeroDocumento INT NOT NULL,
  es_jornada VARCHAR(10) NOT NULL,
  es_idRolFK INT NOT NULL,
  es_idCursoFK INT NOT NULL,
  es_fotoEstudiante LONGBLOB NOT NULL,
  es_estado TINYINT NOT NULL,
  PRIMARY KEY (es_idEstudiante),
    FOREIGN KEY (es_idDocumentoFK)
    REFERENCES dbdavinci.tipoDocumento (td_idDocumento),
    FOREIGN KEY (es_idRolFK)
    REFERENCES dbdavinci.roles (ro_idRol),
    FOREIGN KEY (es_idCursoFK)
    REFERENCES dbdavinci.cursos (cu_idCurso));

CREATE TABLE procesos (
  pro_idProceso INT NOT NULL AUTO_INCREMENT,
  pro_nombre VARCHAR(100) NOT NULL,
  pro_idMateriaFK INT NOT NULL,
  pro_idPeriodoFK INT NOT NULL,
  pro_idGradoFK INT NOT NULL,
  pro_estado int not null,
  PRIMARY KEY (pro_idProceso),
    FOREIGN KEY (pro_idMateriaFK)
    REFERENCES dbdavinci.materias (ma_idMateria),
    FOREIGN KEY (pro_idPeriodoFK)
    REFERENCES dbdavinci.periodos (pe_idPeriodo),
    FOREIGN KEY (pro_idGradoFK)
    REFERENCES dbdavinci.grados (gr_idGrado));

CREATE TABLE competencias (
  co_idCompetencia INT NOT NULL AUTO_INCREMENT,
  co_nombre VARCHAR(15) NOT NULL,
  co_descripcion VARCHAR(50) NOT NULL,
  co_idProcesoFK INT NOT NULL,
  co_estado TINYINT NOT NULL,
  PRIMARY KEY (co_idCompetencia),
    FOREIGN KEY (co_idProcesoFK)
    REFERENCES dbdavinci.procesos (pro_idProceso));

CREATE TABLE tipoObservaciones (
  to_idTipoObservacion INT NOT NULL AUTO_INCREMENT,
  to_nombre VARCHAR(15) NOT NULL,
  to_estado int not null,
  PRIMARY KEY (to_idTipoObservacion));

CREATE TABLE observaciones (
  ob_idObservaciones INT NOT NULL AUTO_INCREMENT,
  ob_idTipoObservacionFK INT NOT NULL,
  ob_descripcion VARCHAR(50) NOT NULL,
  ob_estado TINYINT NOT NULL,
  PRIMARY KEY (ob_idObservaciones),
    FOREIGN KEY (ob_idTipoObservacionFK)
    REFERENCES dbdavinci.tipoObservaciones (to_idTipoObservacion));

CREATE TABLE calificaciones (
  ca_idCalificacion INT NOT NULL AUTO_INCREMENT,
  ca_anioBoletin YEAR NOT NULL,
  ca_nombreEstudianteFK INT NOT NULL,
  ca_periodoFK INT NOT NULL,
  ca_materiaFK INT NOT NULL,
  ca_docenteMateriaFK INT NOT NULL,
  ca_procesoMateria INT NOT NULL,
  ca_Competencia INT NOT NULL,
  ca_notaCompetencia INT NOT NULL,
  PRIMARY KEY (ca_idCalificacion),
    FOREIGN KEY (ca_nombreEstudianteFK)
    REFERENCES dbdavinci.estudiantes (es_idEstudiante),
    FOREIGN KEY (ca_periodoFK)
    REFERENCES dbdavinci.periodos (pe_idPeriodo),
    FOREIGN KEY (ca_docenteMateriaFK)
    REFERENCES dbdavinci.materias (ma_docenteAsignadoFK),
    FOREIGN KEY (ca_procesoMateria)
    REFERENCES dbdavinci.procesos (pro_idProceso),
    FOREIGN KEY (ca_materiaFK)
    REFERENCES dbdavinci.procesos (pro_idMateriaFK),
    FOREIGN KEY (ca_notaCompetencia)
    REFERENCES dbdavinci.notas (no_idNota),
    FOREIGN KEY (ca_Competencia)
    REFERENCES dbdavinci.competencias (co_idCompetencia));

CREATE TABLE boletines(
  bo_idBoletin INT NOT NULL AUTO_INCREMENT,
  bo_nombreEstudiante INT NOT NULL,
  bo_fortalezasFK INT NOT NULL,
  bo_debildadesFK INT NULL,
  PRIMARY KEY (bo_idBoletin),
    FOREIGN KEY (bo_fortalezasFK)
    REFERENCES dbdavinci.observaciones (ob_idObservaciones),
    FOREIGN KEY (bo_nombreEstudiante)
    REFERENCES dbdavinci.estudiantes (es_idEstudiante));

CREATE TABLE notasGenerales (
  ng_idNotaGeneral INT NOT NULL,
  ng_estudianteFK INT(11) NOT NULL,
  ng_materiaFK INT(11) NOT NULL,
  ng_fallas INT(2) NOT NULL,
  ng_nota INT(11) NOT NULL,
  PRIMARY KEY (ng_idNotaGeneral),
    FOREIGN KEY (ng_estudianteFK)
    REFERENCES dbdavinci.users (id),
    FOREIGN KEY (ng_materiaFK)
    REFERENCES dbdavinci.materias (ma_idMateria),
    FOREIGN KEY (ng_nota)
    REFERENCES dbdavinci.notas (no_idNota));

ALTER TABLE roles ADD UNIQUE(ro_nombre);

ALTER TABLE usuarios ADD UNIQUE(us_numeroDocumento);

ALTER TABLE estudiantes ADD UNIQUE(es_numeroDocumento);

insert into ROLES values
(1, 'Administrador',1),
(2, 'Directivo',1),
(3, 'Profesor',1),
(4, 'Alumno',1);

insert into GRADOS values
  (1, 'Parvulos',1),
  (2, 'Pre-Kinder',1),
  (3, 'Kinder',1),
  (4, 'Transicion',1);

insert into TIPODOCUMENTO values
(1, 'NIUP',1),
(2, 'Tarjeta de Identidad',1),
(3, 'Cedula de Ciudadania',1),
(4, 'Cedula de Extranjeria',1);

insert into NOTAS (no_idNota, no_nombre,no_descripcion,no_estado) values
(1, 'SN','Sin Nota',1),
(2, 'NA','Necesita Apoyo',1),
(3, 'VC','En Vias de Construción',1),
(4, 'C','Construido',1);

insert into CURSOS values
(1, 'Parvulos',1,1),
(2, 'Pre-Kinder A',2,1),
(3, 'Pre-Kinder B',2,1),
(4, 'Pre-Kinder C',2,1),
(5, 'Kinder A',3,1),
(6, 'Kinder B',3,1),
(7, 'Kinder C',3,1),
(8, 'Transicion A',4,1),
(9, 'Transicion B',4,1);

insert into tipoobservaciones values
(1,'Fortalezas',1),
(2,'Debilidades',1);

insert into MATERIAS values
(null, 'Danzas','4',null,1),
(null, 'Ingles','4',null,1),
(null, 'Intra e inter personal','4',null,1),
(null, 'Kinestesica','4',null,1),
(null, 'Linguistica','4',null,1),
(null, 'Logica matematica','4',null,1),
(null, 'Musica','4',null,1),
(null, 'Naturista','4',null,1),
(null, 'Sistemas','4',null,1);

insert into PERIODOS values
(null, 'Primero','2018-01-01','2018-01-01',1),
(null, 'Segundo','2018-01-01','2018-01-01',1),
(null,'Tercero','2018-01-01','2018-01-01',1),
(null, 'Cuarto','2018-01-01','2018-01-01',1);

insert into USUARIOS values
('1', '','', 'Ninguno',      '','3','' ,'1',null ,null),
(null, 'FrancoR',   '1234567890', 'Ricardo',      'Franco Rios',    '3','1233888846' ,'1',null ,null),
(null, 'BrocheroL', '1234567890', 'Ligia',        'Brochero',       '3','39630257'   ,'2',null ,null),
(null, 'RiosG',   '1234567890', 'Gloria Albany','Rios',           '3','30302110'   ,'2',null ,null),
(null, 'PenaretaA', '1234567890', 'Ana',          'Penareta',       '3','52515597'   ,'3','1'  ,null),
(null, 'BrocheroM', '1234567890', 'Marisol',      'Brochero',       '3','23799279'   ,'3','1'  ,'1'),
(null, 'HernandezL','1234567890', 'Luisa',        'Hernandez',      '3','51876232'   ,'3','2'  ,'1'),
(null, 'MartinezC', '1234567890', 'Claudia',      'Martinez',       '3','52797156'   ,'3','3'  ,'1'),
(null, 'LopezZ',  '1234567890', 'Zeidy',        'Lopez',          '3','1015443630' ,'3','4'  ,'1'),
(null, 'AldanaL',   '1234567890', 'Luz',          'Aldana',         '3','51814114'   ,'3','5'  ,'1'),
(null, 'GuerreroM', '1234567890', 'Monica',       'Guerrero',       '3','52396378'   ,'3','6'  ,'1'),
(null,'RodriguezY', '1234567890', 'Yaneth',       'Rodriguez',      '3','60327355'   ,'3','7'  ,'1'),
(null,'FrancoJ',  '1234567890', 'Jaime Augusto','Franco Carvajal','3','10250035'   ,'3','8'  ,'1'),
(null,'EcheverryM', '1234567890', 'Mayra',        'Echeverry',      '3','38140727'   ,'3','9'  ,'1');

insert into PROCESOS
(pro_idProceso,pro_nombre,pro_idMateriaFk,pro_idPeriodoFk,pro_idGradoFk,pro_estado) values
#1 PERIODO  PRE-KINDER
(null,'DESARROLLO Y ESTIMULACION DEL SISTEMA LOCOMOTOR, RITMO Y ESPACIO','1','1','2','1'),
(null,'ORALIDAD Y COMPRENSIÓN','2','1','2','1'),
(null,'FORTALECIMIENTO DEL VALOR DE LA RESPONSABILIDAD E IDENTIDAD','3','1','2','1'),
(null,'APRESTAMIENTO Y CREATIVIDAD','4','1','2','1'),
(null,'PRODUCCION TEXTUAL Y TOPOGRAFIA DE LA ESCRITURA','5','1','2','1'),
(null,'RELACIONES ESPACIALES, ATRIBUTOS, PRINCIPIOS DE CONTEO','6','1','2','1'),
(null,'ATENCIÓN Y MEMORIA ','7','1','2','1'),
(null,'CONCIENTIZACION AMBIENTAL E HIGIENE PERSONAL','8','1','2','1'),
(null,'CONOCIMIENTOS BÁSICOS','9','1','2','1'),
#2 PERIODO PRE-KINDER
(null,'RITMO,  COORDINACIÓN Y COREOGRAFÍA ','1','2','2','1'),
(null,'ORALIDAD Y COMPRENSIÓN','2','2','2','1'),
(null,'RECONOCIMIENTO DEL OTRO E INDEPENDENCIA','3','2','2','1'),
(null,'DESARROLLO MOTOR FINO Y GRUESO.','4','2','2','1'),
(null,'ORALIDAD, INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL','5','2','2','1'),
(null,'NOCIÓN DE FORMA Y COLOR. CONSTRUCCIÓN NUMÉRICA.','6','2','2','1'),
(null,'MOVIMIENTO- SONIDO -SILENCIO','7','2','2','1'),
(null,'CULTURA AMBIENTAL','8','2','2','1'),
(null,'SOFTWARE Y COMPORTAMIENTO','9','2','2','1'),
#3 PERIODO PRE-KINDER
(null,'RITMOS INFANTILES RONDAS Y CANTICUENTOS','1','3','2','1'),
(null,'COLORES PRIMARIOS, ANIMALES Y MIEMBROS DE LA FAMILIA','2','3','2','1'),
(null,'RECONOCIMIENTO DEL OTRO -ACEPTACIÓN Y VALORES','3','3','2','1'),
(null,'MOTRICIDAD GRUESA –MOTRICIDAD FINA','4','3','2','1'),
(null,'INTERPRETACIÓN DE IMÁGENES ANÁLISIS TEXTUAL','5','3','2','1'),
(null,'CONSTRUCCIÓN CONCEPTO DE NÚMERO Y CONTEO CONSECUTIVO','6','3','2','1'),
(null,'EXPLORAR LAS CUALIDADES DEL SONIDO','7','3','2','1'),
(null,'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE','8','3','2','1'),
(null,'SOFTWARE Y PARTICIPACIÓN','9','3','2','1'),
#4 PERIODO PRE-KINDER
(null,'MANEJO DE TIEMPOS Y PLANOS COREOGRAFICOS','1','4','2','1'),
(null,'PARTES DEL CUERPO, NÚMEROS Y FIGURAS GEOMÉTRICAS','2','4','2','1'),
(null,'VALORES','3','4','2','1'),
(null,'DESTREZA  MANUAL','4','4','2','1'),
(null,'ANÁLISIS Y PRODUCCIÓN DE TEXTO','5','4','2','1'),
(null,'CONSTRUCCIÓN NUMÉRICA','6','4','2','1'),
(null,'INTERPRETACIÓN VOCAL','7','4','2','1'),
(null,'CULTURA AMBIENTAL','8','4','2','1'),
(null,'INTERNET E INVESTIGACIÓN','9','4','2','1'),
#1 PERIODO  KINDER
(null,'LATERALIDAD  Y COREOGRAFIA','1','1','3','1'),
(null,'VOCABULARIO','2','1','3','1'),
(null,'FORTALECIMIENTO DE LOS VALORES RESPETO Y RESPONSABILIDAD','3','1','3','1'),
(null,'ESQUEMA Y DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA','4','1','3','1'),
(null,'CONTEXTUALIZACIÓN ESCRITA Y PRODUCCIÓN TEXTUAL ','5','1','3','1'),
(null,'CONSTRUCCIÓN DEL CONCEPTO DE NÚMERO - NOCIONES','6','1','3','1'),
(null,'ATENCIÓN Y MEMORIA','7','1','3','1'),
(null,'PRESERVACIÓN Y CUIDADO DEL AGUA','8','1','3','1'),
(null,'CONOCIMIENTOS BÁSICOS','9','1','3','1'),
#2 PERIODO KINDER
(null,'RITMO COORDINACION Y COREOGRAFIA','1','2','3','1'),
(null,'VOCABULARIO','2','2','3','1'),
(null,'APRENDIZAJE COOPERATIVO Y DESARROLLO AUTÓNOMO','3','2','3','1'),
(null,'DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA','4','2','3','1'),
(null,'INTERPRETACION - PRODUCCION TEXTUAL','5','2','3','1'),
(null,'UBICACIÓN POSICIONAL Y OPERACIONES MATEMÁTICAS','6','2','3','1'),
(null,'SONIDO -SILENCIO','7','2','3','1'),
(null,'CULTURA AMBIENTAL','8','2','3','1'),
(null,'SOFTWARE Y COMPORTAMIENTO','9','2','3','1'),
#3 PERIODO KINDER
(null,'EXPRESION CORPORAL Y GESTUAL','1','3','3','1'),
(null,'VOCABULARIO Y CONTEXTO, LOS SENTIDOS Y LA FAMILIA','2','3','3','1'),
(null,'FORTALECIMIENTO DE LOS VALORES','3','3','3','1'),
(null,'DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA','4','3','3','1'),
(null,'CONTEXTUALIZACIÓN ESCRITA Y PRODUCCIÓN TEXTUAL','5','3','3','1'),
(null,'CONSTRUCCIÓN DEL CONCEPTO DE NÚMERO','6','3','3','1'),
(null,'DISTINGUE LAS CUALIDADES DEL SONIDO','7','3','3','1'),
(null,'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE','8','3','3','1'),
(null,'SOFTWARE Y COMPORTAMIENTO','9','3','3','1'),
#4 PERIODO KINDER
(null,'MONTAJE ESCENICO','1','4','3','1'),
(null,'VOCABULARY','2','4','3','1'),
(null,'VALORES DAVINCIANOS','3','4','3','1'),
(null,'MOTRICIDAD FINA Y GRUESA','4','4','3','1'),
(null,'INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL. ','5','4','3','1'),
(null,'CONSTRUCCIÓN DEL CONCEPTO DE NUMERO Y OPERACIONES LÓGICAS','6','4','3','1'),
(null,'INTERPRETACION VOCAL','7','4','3','1'),
(null,'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE ','8','4','3','1'),
(null,'SOFTWARE EDUCATIVO Y NORMAS','9','4','3','1'),
#1 PERIODO  TRANSICION
(null,'LATERALIDAD Y COREOGRAFIA','1','1','4','1'),
(null,'VOCABULARIO Y ORALIDAD','2','1','4','1'),
(null,'VALORES ','3','1','4','1'),
(null,'CREATIVIDAD Y MOTRICIDAD FINA','4','1','4','1'),
(null,'INTERPRETACIÓN – PRODUCCIÓN TEXTUAL','5','1','4','1'),
(null,'UBICACIÓN POSICIONAL Y CARDINALIDAD NUMÉRICA','6','1','4','1'),
(null,'DISCRIMINACIÓN AUDITIVA','7','1','4','1'),
(null,'CONCIENTIZACIÓN','8','1','4','1'),
(null,'CONOCIMIENTOS BASICOS','9','1','4','1'),
#2 PERIODO TRANSICION
(null,'RITMO,COORDINACION Y COREOGRAFIA','1','2','4','1'),
(null,'VOCABULARIO Y ESCRITURA ELEMENTAL','2','2','4','1'),
(null,'VALORES','3','2','4','1'),
(null,'EXPRESION CORPORAL','4','2','4','1'),
(null,'PRODUCCIÓN, INTERPRETACIÓN TEXTUAL Y TEMPORALIDAD','5','2','4','1'),
(null,'UBICACIÓN POSICIONAL - OPERACIONES LÓGICO MATEMÁTICAS','6','2','4','1'),
(null,'SONIDO -SILENCIO Y RESPIRACIÓN','7','2','4','1'),
(null,'CULTURA AMBIENTAL E INVESTIGACIÓN','8','2','4','1'),
(null,'SOFTWARE Y COMPORTAMIENTO','9','2','4','1'),
#3 PERIODO TRANSICION
(null,'DANZA,  CANTO Y EXPRESION GESTUAL','1','3','3','1'),
(null,'ORALIDAD Y ESCRITURA','2','3','4','1'),
(null,'VALORES','3','3','4','1'),
(null,'MOTRICIDAD GRUESA Y FINA','4','3','4','1'),
(null,'INTERPRETACIÓN – PRODUCCIÓN TEXTUAL','5','3','4','1'),
(null,'UBICACIÓN POSICIONAL','6','3','4','1'),
(null,'MELODÍA - MOVIMIENTO SONORO CONTINUO','7','3','4','1'),
(null,'CONCIENCIA AMBIENTAL Y ECOLOGIA HUMANA','8','3','4','1'),
(null,'SOFTWARE','9','3','4','1'),
#4 PERIODO TRANSICION
(null,'MONTAJE COREOGRÁFICO Y RITMOS LATINOS','1','4','4','1'),
(null,'ORALIDAD Y ESCRITURA','2','4','4','1'),
(null,'VALORES','3','4','4','1'),
(null,'EQUILIBRIO Y COORDINACIÓN','4','4','4','1'),
(null,'INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL','5','4','4','1'),
(null,'UBICACIÓN POSICIONAL Y CONCEPTO NUMÉRICO','6','4','4','1'),
(null,'APLICACIONES A LA PRACTICA INSTRUMENTAL','7','4','4','1'),
(null,'APLICACIÓN DE LAS TRES R','8','4','4','1'),
(null,'SOFTWARE','9','4','4','1');

insert into competencias
  (co_idCompetencia,co_nombre,co_descripcion,co_idProcesoFK,co_estado) values
  (null,'','','','');