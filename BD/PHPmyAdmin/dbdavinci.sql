DROP TABLE IF EXISTS calificaciones;
CREATE TABLE IF NOT EXISTS calificaciones (
  ca_idCalificacion int(11) NOT NULL AUTO_INCREMENT,
  ca_anioCalificacion year(4) NOT NULL,
  ca_idEstudianteFK int(11) NOT NULL,
  ca_idPeriodoFK int(11) NOT NULL,
  ca_idMateriaFK int(11) NOT NULL,
  ca_idProcesoFK int(11) NOT NULL,
  ca_idCompetenciaFK int(11) NOT NULL,
  ca_idNotaFK int(11) NOT NULL,
  PRIMARY KEY (ca_idCalificacion),
  KEY ca_idEstudianteFK (ca_idEstudianteFK),
  KEY ca_idPeriodoFK (ca_idPeriodoFK),
  KEY ca_idProcesoFK (ca_idProcesoFK),
  KEY ca_idMateriaFK (ca_idMateriaFK),
  KEY ca_idNotaFK (ca_idNotaFK),
  KEY ca_idCompetenciaFK (ca_idCompetenciaFK)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla competencias
--

DROP TABLE IF EXISTS competencias;
CREATE TABLE IF NOT EXISTS competencias (
  co_idCompetencia int(11) NOT NULL AUTO_INCREMENT,
  co_descripcion varchar(500) NOT NULL,
  co_idProcesoFK int(11) NOT NULL,
  co_estado tinyint(4) NOT NULL,
  PRIMARY KEY (co_idCompetencia),
  KEY co_idProcesoFK (co_idProcesoFK)
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla competencias
--

INSERT INTO competencias (co_idCompetencia, co_descripcion, co_idProcesoFK, co_estado) VALUES
(1, 'Por medio del juego y rutinas de calentamiento identifica y da movimiento a todas las partes de mi cuerpo.', 1, 1),
(2, 'Desarrolla secuencias de movimiento, que implican estiramientos, fuerza  y  elasticidad.', 1, 1),
(3, 'Knows and uses Greetings expressions in a foreign language according to the daily time. (Reconoce y usa expresiones de saludo y de despedida, de acuerdo a la situación y hora)  ', 2, 1),
(4, 'It recognizes the corresponding vocabulary for each gender {child} and uses it in conversations.(Reconoce el vocabulario correspondiente para cada género{niño o niña} y  lo utiliza en conversaciones.) ', 2, 1),
(5, 'Enjoys and interested in learning a foreign language. (Disfruta y está interesado en el aprendizaje de una lengua extranjera)', 2, 1),
(6, 'Propicia la práctica de acciones responsables con su comportamiento cotidiano como base para la convivencia. ', 3, 1),
(7, 'Participa en la elaboración de normas para la convivencia y se adhiere a ellas mediante el desarrollo de actividades grupales enfocadas al tema del proyecto de aula.', 3, 1),
(8, ' Explora diferentes técnicas de arte para comunicar su visión del proyecto de aula, utilizando diferentes materiales.', 4, 1),
(9, 'Comprende ,asimila y aplica movimientos motrices de manera adecuada tomando como base el deporte.', 4, 1),
(10, 'Realiza movimientos de coordinacion viso -manual y viso -pédica acordes con su edad.', 4, 1),
(11, 'Fortalece su capacidad para producir palabras de forma escrita haciendo uso de las sonantes ( O -i) incrementando su habilidad futura para producir textos sencillos desde su propia imaginación.', 5, 1),
(12, ' Conoce la ubicación de las sonantes o - i en una palabra  o en el nombre de una imagen, potenciando de este modo su conciencia fonética.', 5, 1),
(13, 'Reconoce el límite y el espacio desde lo macro (pliego de papel) hasta lo micro (cuaderno) acorde a su nivel de desarrollo motriz.', 5, 1),
(14, ' Desarrolla su capacidad expresiva mediante la construcción de saberes e intercambio de diálogos grupales.', 5, 1),
(15, 'Hace uso del espacio y se ubica en el (dentro, fuera, arriba, abajo) teniendo como referencia su entorno.', 6, 1),
(16, 'Establece relaciones de forma, tamaño y color a través de la descripción de objetos.', 6, 1),
(17, 'Realiza conteo secuencial de 1 a 10 y correspondencia uno a uno utilizando material concreto de su entorno.', 6, 1),
(18, 'Construye el concepto numérico de los cardinales 1 y 2 mediante ejercicios de relación símbolo cantidad convirtiendo este saber en una habilidad útil en su vida cotidiana.', 6, 1),
(19, 'Familiariza los elementos del lenguaje musical mediante el juego espontaneo e intuitivo, fortaleciendo el desarrollo de la atención y la memoria. ', 7, 1),
(20, 'Representa canciones con gestos y movimientos corporales.', 7, 1),
(21, 'Fortalece su conciencia ambiental por medio del ahorro y preservación del agua como fuente de la vida al momento de utilizarla.', 8, 1),
(22, 'Conocen la importancia de mantener los espacios en orden y limpios como principio fundamenta de los ambientes sanos y adecuados.', 8, 1),
(23, 'Mantiene una actitud de respeto y responsabilidad en lo referente al uso de los equipos.', 9, 1),
(24, 'Conoce la utilidad del computador, sus partes y características mediante el contacto directo  en las  actividades.  ', 9, 1),
(25, 'Desarrolla e integra planos coreograficos,orientándose y ubicándose correctamente en el espacio.', 10, 1),
(26, 'Integra ritmo y coordinacion por medio de la danza, con  autonomia y autocontrol.', 10, 1),
(27, 'Reconoce y nombra en ingles vocabulario referente a sus juguetes favoritos. Recognizes and names in English vocabulary related to their favorite toys. ', 11, 1),
(28, 'Reconoce y nombra en ingles vocabulario relacionado con los útiles escolares. Recognizes and names in English vocabulary related to their school supplies. ', 11, 1),
(29, 'Practica y fortalece el vocabulario por medio de diferentes canciones. Practice and strenghts vocabulary in many ways through songs.', 11, 1),
(30, 'Reconoce  el  entorno, la importancia del otro y lo acepta como eje socializador de los vínculos afectivos.', 12, 1),
(31, 'Realiza actividades sencillas y toma decisiones sin ayuda de los demás, fomentando su independencia.', 12, 1),
(32, 'Desarrolla la motricidad fina mediante la ejecución de ejercicios, que le permiten fortalecer la pinza y coordinación.', 13, 1),
(33, 'Realiza de manera adecuada los movimientos rudimentarios (gatear, saltar,rodar, etc) de acuerdo a la edad.', 13, 1),
(34, 'Comprende los diferentes estimulos (auditivo, visual, de contacto) y reacciona de manera correcta ante ellos.', 13, 1),
(35, 'Adquiere la habilidad interpretativa y argumentativa del lenguaje por medio de la lectura de imágenes y narración de cuentos.', 14, 1),
(36, 'Conoce la ubicación de las sonantes  en una palabra o en el nombre de una imagen, potenciando de este modo la conciencia fonética.', 14, 1),
(37, 'Fortalece la habilidad escritural a través de la práctica continua de la grafía del nombre. ', 14, 1),
(38, 'Expresa las emociones y saberes a través del dibujo como medio de comunicación. ', 14, 1),
(39, 'Fortalece la construcción numérica mediante la creación de conjuntos asociados al cardinal específico.', 15, 1),
(40, 'Desarrolla el principio del conteo y de ordenestable mediante el uso de material concreto.', 15, 1),
(41, 'Clasifica y ordena objetos de acuerdo con distintos criterios (forma y color) hallando equivalencias .', 15, 1),
(42, 'Fortalece la construcción numérica siguiendo modelos y usando elementos concretos de un conjunto.', 15, 1),
(43, 'Reconoce el cuerpo como un instrumento sensible y expresivo a través del cual pueden comunicar ideas, sentimientos y emociones.', 16, 1),
(44, 'Utiliza el silencio y el sonido como forma de expresión  musical. ', 16, 1),
(45, 'Realiza acciones dirigidas hacia el fortalecimiento de la conciencia ambiental, para contribuir con el sostenimiento de nuestro planeta, mediante el cuiddo de nuestro entorno .', 17, 1),
(46, 'Reconoce la utilidad que nos ofrecen los sentidos para distinguir cosas de nuestro entorno mediante la exploración.', 17, 1),
(47, 'Mantiene una actitud de respeto y responsabilidad en lo referente al uso de los equipos.', 18, 1),
(48, 'Participa activamente de las actividades propuestas en los diferentes juegos en línea.', 18, 1),
(49, 'Por medio de la expresión corporal, caracteriza diferentes roles alusivos a los géneros de música infantil.  ', 19, 1),
(50, 'Desarrolla esquemas de ubicación espacial, teniendo en cuenta el ritmo,  tiempo y  lateralidad.', 19, 1),
(51, 'Conoce el vocabulario correspondiente a los colores primarios y los relaciona con su entorno inmediato.//Knows the corresponding vocabulary to the primary colors and related to their immediate environment.', 20, 1),
(52, 'Conoce el vocabulario correspondiente a los animales e imita sus sonidos y movimientos característicos.//Knows the vocabulary relevant to animals and imitates their sounds and characteristic movements. ', 20, 1),
(53, 'Fortalece sus habilidades comunicativas en Inglés, identificando la familia con sonidos y relacionándolos con imágenes./Strength their communication skills in English identifying the family with sounds and related with photos.', 20, 1),
(54, 'Demuestra sentido de pertenencia  en la conmemoración de los hechos históricos  de nuestra patria.', 21, 1),
(55, 'Identifica y describe cada miembro de  la familia que habita en su casa, manifestando respeto y amor.', 21, 1),
(56, 'Desarrolla su motricidad fina mediante la ejecución de ejercicios secuenciales en complejidad .', 22, 1),
(57, 'Explora diferentes tipos de movimiento(fuerte,rápido,lento,pesado),adquiriendo  mayor autonomía corporal y motriz.', 22, 1),
(58, 'Fortalece su pinza digital y coordinación viso- motora,mediante diversas actividades artísticas.', 22, 1),
(59, 'Fortalece su capacidad para producir palabras de forma escrita haciendo uso de las sonantes, incrementando su habilidad futura para producir textos sencillos desde su propia imaginación.', 23, 1),
(60, 'Reconoce las diferentes sonantes que conforman su nombre estableciendo semejanzas y diferencias entre los diferentes nombres de sus compañeros de clase.', 23, 1),
(61, 'Asocia e interpreta imágenes de forma oral haciendo relaciones gramaticales y fonéticas con la escritura vocálica.', 23, 1),
(62, 'Incrementa su habilidad escritural y de contrastación mediante el análisis de textos cortos.', 23, 1),
(63, 'Fortalece su capacidad de numeración y de correspondencia uno a uno, mediante el uso de material concreto.', 24, 1),
(64, 'Desarrolla la noción de número haciendo uso de elementos de un conjunto y puede establecer equivalencias.', 24, 1),
(65, 'Fortalece su capacidad transitiva del pensamiento, mediante ejercicios prácticos de seriación y comparación .', 24, 1),
(66, 'Cuenta,organiza y compara cantidades  con material concreto y gráfico,asignando el número y trazo correspondiente. ', 24, 1),
(67, 'Expresa su sensibilidad, imaginación e inventiva al interpretar canciones y melodias .', 25, 1),
(68, 'Reconoce algunos instrumentos musicales y su sonido, desarrollando la atención , concentración y memoria.', 25, 1),
(69, 'Contribuye al cuidado del medio ambiente a través de la separación objetiva de los residuos sólidos.', 26, 1),
(70, 'Reconoce la importancia del agua y su utilidad en la vida diaria y la necesidad de cuidarla.', 26, 1),
(71, 'Hace uso de juegos educativos en línea para desarrollar su razonamiento lógico, abstracto y lingüístico.', 27, 1),
(72, 'Fortalece su habilidad para hacer uso del computador de forma autónoma y responsable en la sala de sistemas.', 27, 1),
(73, 'Integra el manejo de planos coreográficos y escenarios, por medio de la danza, orientándose y ubicándose en el espacio.', 28, 1),
(74, 'Maneja y desarrolla los tiempos coreograficos, de manera adecuada y coordinada.', 28, 1),
(75, 'Reconoce  auditiva y visualmente los números en inglés fortaleciendo su capacidad para contar en el idioma extranjero./Hearing and visually recognize the numbers in English to strengthen its ability to tell foreign language.', 29, 1),
(76, 'Reconoce y nombra algunas partes de su cuerpo y de sus compañeros en inglés mediante actividades significativas./Recognize and name some parts of their body and their peers in English through meaningful activities.', 29, 1),
(77, 'Conoce las figuras geométricas básicas en inglés y las relaciona con su entorno inmediato./Knows the basic geometric shapes in English and relates in their immediate environmen.', 29, 1),
(78, 'Incorpora diferentes valores como la honestidad, la gratitud y la amistad  para afianzar su desarrollo integral.', 30, 1),
(79, 'Disfruta  de nuestro proyecto de aula, participando activamente y desarrollando procesos investigativos.', 30, 1),
(80, 'Desarrolla su aprestamiento manipulando distintos materiales y diferentes texturas ejercitando su motricidad  fina.', 31, 1),
(81, 'Respeta límites y sigue una sola dirección al colorear , fortaleciendo su direccionalidad y manejo del renglón.', 31, 1),
(82, 'Desarrolla su capacidad para hacer uso adecuado del espacio por medio de actividades de aprestamiento.', 31, 1),
(83, 'Posee la habilidad analítica y fonética para realizar producciones sencillas utilizando vocales y consonantes ( s, p, m), diferenciando  sus sonidos   .', 32, 1),
(84, 'Comprende  textos  orales sencillos de diferentes  contextos como,  descripciones, narraciones y cuentos  cortos, como herramienta  para la expresión.', 32, 1),
(85, 'Optimiza su pronunciación y comprende la relación del lenguaje como factor importante para la comunicación.', 32, 1),
(86, 'Identifica  y reproduce las letras que componen  su nombre.', 32, 1),
(87, 'Realiza conteo numérico realizando correspondencia uno a uno con objetos de su entorno.', 33, 1),
(88, 'Fortalece la construcción numérica mediante el conteo, estableciendo comparaciones (más que ,menos que )', 33, 1),
(89, 'Establece equivalencias entre conjuntos ,realizando el trazo del número correspondiente.', 33, 1),
(90, 'Fortalece su capacidad transitiva del pensamiento, mediante ejercicios prácticos de seriación y comparación .', 33, 1),
(91, 'Ejecuta esquemas rítmicos sencillos, corporal e instrumentalmente, con respeto y disposición .', 34, 1),
(92, 'Participa activamente  y disfruta de  los cantos dados en clase.', 34, 1),
(93, 'Describe y clasifica los animales,  según su hábitat (acuáticos, terrestres y aèreos) y a su vez menciona las caracteristicas que los identifican.', 35, 1),
(94, 'Desarrolla la conciencia y cultura ambiental necesarias para contribuir al desarrollo sostenible de nuestro planeta.', 35, 1),
(95, 'Participa activamente de las actividades propuestas en los diferentes juegos de pintura en línea.', 36, 1),
(96, 'Aplica las diferentes normas de comportamiento en el aula de informática haciendo uso adecuado de los equipos.', 36, 1),
(97, ' Desarrolla planimetrías de movimiento.', 37, 1),
(98, ' Salta, corre y desarrolla figuras corporales simples. ', 37, 1),
(99, 'Reconoce y usa expresiones de saludo y despedida en inglés de acuerdo a la situación y hora.- Knows and uses Greetings expressions in a foreign language according to the daily time. ', 38, 1),
(100, 'Reconoce las partes de su cuerpo en Ingles, incrementando su capacidad comunicativa.-Recognizes the parts of his body in English, increasing their skills communication. ', 38, 1),
(101, 'Conoce el vocabulario correspondiente a los colores básicos y usa esa habilidad en sus conversaciones diarias. Knows the corresponding vocabulary to the colors and uses this ability in their conversations', 38, 1),
(102, 'Muestra actitudes de cooperación solidaridad y responsabilidad en la solución de problemas grupales. ', 39, 1),
(103, ' Comparte en armonía y tolerancia con sus compañeros, practicando y respetando las normas de convivencia establecidas en su entorno escolar. ', 39, 1),
(104, 'Explora diferentes técnicas de arte para comunicar su visión particular del proyecto de aula utilizando diferentes materiales. ', 40, 1),
(105, 'Comprende ,asimila y aplica movimientos motrices de manera adecuada tomando como base el deporte.', 40, 1),
(106, 'Realiza movimientos de coordinacion viso -manual y viso -pédica acordes con su edad.', 40, 1),
(107, 'Desarrolla su habilidad escritural, mediante el aprestamiento inicial para el conocimiento y uso de la letra cursiva, brindando de este modo las herramientas necesarias para el acceso a las diferentes formas del código escrito. ', 41, 1),
(108, 'Establece relaciones de orden escritural mediante el uso de imágenes del proyecto de aula y de su entorno, por medio de la copia con sentido y la producción de textos sencillos. ', 41, 1),
(109, 'Reconoce su nombre y el de sus compañeros e identifica las letras que lo componen como la primera forma de escritura significativa.', 41, 1),
(110, 'Establece relaciones lógicas entre el número y la cantidad a través de la sensibilización con material concreto a modo de contribuir con sus habilidades lógicas puestas en el contexto cotidiano. ', 42, 1),
(111, 'Establece diferencias de forma tamaño y color utilizando como herramienta el contexto del proyecto de aula, a fin de contribuir con el desarrollo de habilidades lógicas. ', 42, 1),
(112, 'Desarrolla el concepto numérico de forma creativa mediante la construcción diaria de la fecha en el calendario optimizando su pensamiento transitivo para solucionar problemas relacionados con el tiempo (hora fecha).', 42, 1),
(113, 'Familiariza los elementos del lenguaje musical mediante el juego espontaneo e intuitivo, fortaleciendo el desarrollo de la atención y la memoria.', 43, 1),
(114, 'Representa el ritmo de una canción con las diferentes partes del cuerpo.', 43, 1),
(115, 'Reconoce la importancia del agua en el mundo para la preservación de las diferentes especies contribuyendo al ahorro y cuidado de este vital líquido.', 44, 1),
(116, 'Fortalece su conciencia ambiental mediante acciones dirigidas hacia la preservación del medio ambiente, a través de las jornadas ambientales  desarrollando el interés y amor por su planeta.', 44, 1),
(117, 'Conoce el uso y utilidad del internet como medio de investigación y contextualización de su aprendizaje. ', 45, 1),
(118, 'Conoce la utilidad del computador,sus partes y características mediante el contacto directo en las  actividades.', 45, 1),
(119, 'Desarrolla  procesos de coordinación con diferentes ritmos y secuencias que integran revistas deportivas.', 46, 1),
(120, 'Optimiza, el desarrollo motriz y los tiempos coreográficos de forma integral.', 46, 1),
(121, 'Knows the English vocabulary to the school supplies and uses to daily. (Conoce en ingles el vocabulario referente a los útiles escolares y lo apropia haciendo uso diario). ', 47, 1),
(122, 'Answers oral questions for the typical school supplies and school furniture. (Responde oralmente a preguntas típicas correspondientes a los útiles y muebles escolares). ', 47, 1),
(123, 'Practice and strenghts vocabulary in many ways through songs . Practica y fortalece el vocabulario por medio de diferentes canciones.', 47, 1),
(124, 'Muestra responsabilidad y compromiso con su proyecto de aula ,participando en las actividades programadas.', 48, 1),
(125, 'Participa activamente en las actividades culturales de la institución con responsabilidad. ', 48, 1),
(126, 'Desarrolla su motricidad fina mediante la ejecución de ejercicios secuenciales en complejidad para el fortalecimiento  de los músculos de las manos y los dedos.', 49, 1),
(127, 'Realiza de manera adecuada  los movimientos rudimentarios (gatear,correr,saltar,rodar,etc.)de acuerdo a su edad.', 49, 1),
(128, 'Comprende  los diferentes estímulos (auditivo, visual y de contacto), y reacciona de manera correcta ante ellos.', 49, 1),
(129, 'Fortalece su capacidad de análisis y comunicación a través de la relación silábica alfabética prevalente en su entorno lingüístico.  ', 50, 1),
(130, 'Realiza trazos quebrados y espirales simples siguiendo la direccionalidad indicada con continuidad y firmeza y demostrando apropiada segmentación en la ejecución de ejercicios gráficos.', 50, 1),
(131, 'Produce y analiza palabras simples, haciendo uso de su capacidad fonética y creatividad literaria. ', 50, 1),
(132, 'Identifica la decena y establece relaciones de orden entre las unidades y la decena teniendo como referencia el ábaco gráfico y el ábaco concreto. ', 51, 1),
(133, 'Comprende el significado de la descomposición y composición numérica, realizando ejercicios prácticos y gráficos.', 51, 1),
(134, 'Ubica cantidades de dos dígitos haciendo uso de la casilla posicional .', 51, 1),
(135, 'Explora posibilidades sonoras de su cuerpo y de su entorno, identificando duración e intensidad del sonido en ellos.', 52, 1),
(136, 'Utiliza el silencio y el sonido como forma de expresión músical. ', 52, 1),
(137, 'Practica  activamente  las normas y estrategias que utilizan los vigías ambientales contribuyendo con el cuidado del ambiente .', 53, 1),
(138, 'Asume con responsabilidad y compromiso  su presentación corporal y  orden del entorno escolar.', 53, 1),
(139, 'Mantiene una actitud de respeto y responsabilidad en lo referente al uso de los equipos.  ', 54, 1),
(140, 'Participa activamente y hace uso de juegos interactivos ,fortaleciendo su capacidad de concentración y atención .', 54, 1),
(141, 'Por medio de la danza, desarrolla juegos de movimiento, calentamiento y expresión gestual.', 55, 1),
(142, 'Desarrolla cambios coreográficos, integrando el canto y la danza.', 55, 1),
(143, 'Conoce el vocabulario de los sentidos haciendo uso del lenguaje, descubriendo las características de su entorno. Meets the vocabulary of  the senses using the language discovering the characteristics of their context.', 56, 1),
(144, 'Demuestra respeto por  la familia y las demás personas ,contribuyendo al desarrollo de valores como el amor y la tolerancia. Proves respect for family and others helping to development of values such as love and tolerance. ', 56, 1),
(145, 'Responde oralmente a preguntas típicas de comprensión de acuerdo con el vocabulario y la unidad temática desarrollada. Respond orally to typical comprehension questions according to the thematic unit.', 56, 1),
(146, 'Muestra actitudes de cooperación solidaridad y responsabilidad en la solución de problemas grupales. ', 57, 1),
(147, 'Comparte en armonía y tolerancia con sus compañeros, practicando normas de convivencia establecidas en el aula.', 57, 1),
(148, 'Refuerza su habilidad y agilidad corporal, al realizar ejercicios con diferentes elementos artísticos, en un espacio determinado.', 58, 1),
(149, 'Explora diversas técnicas de arte ,empleando diferentes materiales,para comunicar su visión  del proyecto de aula. ', 58, 1),
(150, 'Ejercita su cuerpo a través de ejercicios de calentamiento y estiramiento con el fin de estimular su sistema motor. ', 58, 1),
(151, 'Desarrolla su capacidad de codificación y decodificación fonética haciendo uso de las primeras consonantes (m,p,s,t,l,c,g,n,f, r, d) evidenciándose en la escritura y lectura de palabras sencillas.', 59, 1),
(152, 'Realiza producción de textos escritos sencillos basándose en las experiencias que le brinda el medio y sus propios pensamientos, ideas e intereses.', 59, 1),
(153, 'Posee un adecuado trazo y direccionalidad de las letras, así como un manejo óptimo de los espacios del cuaderno.', 59, 1),
(154, 'Comprende el concepto de decena, demostrándolo a través de la agrupación de cantidades y su correcta asociación con la representación gráfica correspondiente a la decena.', 60, 1),
(155, 'Construye el concepto de número mediante la habilidad lógica para componer y descomponer cantidades haciendo uso de representaciones gráficas y casillas de ubicación posicional.', 60, 1),
(156, 'Establece relaciones entre las unidades y decenas mediante ejercicios de numeración y de jerarquia de ubicación-', 60, 1),
(157, 'Diferencia correctamente el tiempo en diversas velocidades y lo aplica al entonar  diferentes  canciones.', 61, 1),
(158, 'Canta individualmente y en conjunto, un repertorio musical variado acompañado de movimientos corporales.', 61, 1),
(159, 'Realiza acciones dirigidas hacia el fortalecimiento de la conciencia y cultura ambiental de nuestro planeta.', 62, 1),
(160, 'Contribuye al cuidado del medio ambiente a través de la separación objetiva de los residuos sólidos. ', 62, 1),
(161, 'Mantiene una actitud de respeto y responsabilidad en lo referente al uso de los equipos.', 63, 1),
(162, 'Amplia sus habilidades para el manejo basico del computador.', 63, 1),
(163, 'Danza y canta con fluidez ,desarrollando figuras  individuales simples y de pareja integradas en montajes escénicos.', 64, 1),
(164, 'Desarrolla juegos escénicos integrando la danza y el teatro.', 64, 1),
(165, 'Reconoce auditiva y visualmente  los medios de transporte en ingles ,incrementando su vocabulario./Hearing and visually recognizes transportation in English, increasing their vocabulary. ', 65, 1),
(166, 'Conoce algunas  frutas , verduras y alimentos en el idioma ingles./Meet some fruits, vegetables and food in the English language.', 65, 1),
(167, 'Comprende historias cortas utilizando imagenes y vocabulario aprendido en clase./Understand short stories with images videos and vocabulary learned in classes.', 65, 1),
(168, 'Establece vínculos afectivos expresando emociones y sentimientos, con el fin de forjar una sana convivencia. ', 66, 1),
(169, 'Fortalece la construcción continua de los valores esenciales para el desarrollo de la personalidad y el ser integral.', 66, 1),
(170, 'Desarrolla su corporalidad y ubicación espacial mediante la ejecución de ejercicios de coordinación viso motora y tono muscular.', 67, 1),
(171, 'Expresa ideas y sentimientos  al realizar  representaciones visuales, usando técnicas y materiales variados.', 67, 1),
(172, 'Reconoce  sus emociones y posibilidades expresivas, además identifica formas, colores y texturas.', 67, 1),
(173, 'Realiza producciones textuales desde su espontaneidad mediante la construcción de frases, fortaleciendo sus habilidades en el lenguaje escrito. ', 68, 1),
(174, 'Analiza e interpreta frases con sentido  de forma independiente, incrementando sus destrezas  comunicativas  tanto en el lenguaje oral como el  escrito.', 68, 1),
(175, 'Analiza e interpreta los sucesos ocurridos durante una narración haciendo uso del lenguaje gráfico. ', 68, 1),
(176, 'Desarrolla su capacidad de ubicación posicional fortaleciendo su  pensamiento logico matematico, para establecer relaciones de orden cardinal. ', 69, 1),
(177, 'Compone números de dos cifras de forma gráfica (símbolos) desarrollando su habilidad reversible del pensamiento. ', 69, 1),
(178, 'Conoce el concepto de suma y resta. Establece relaciones lógicas entre las operaciones y soluciona problemas.', 69, 1),
(179, 'Expresa  por medio del cuerpo, sensaciones  y emociones en acompañamiento del canto y de la música,reconociendo  las cualidades básicas del sonido presentes en ellas.', 70, 1),
(180, 'Manifiesta su sensibilidad, imaginación e inventiva al interpretar canciones y melodías.', 70, 1),
(181, 'Comprende la importancia de realizar la separación de los residuos sólidos mediante el uso de las tres R para el desarrollo sostenible de nuestro planeta. ', 71, 1),
(182, 'Promueve acciones dirigidas hacia el cuidado y preservación de su entorno.', 71, 1),
(183, 'Conoce el uso y utilidad de la internet como medio de investigación y contextualización de su aprendizaje.', 72, 1),
(184, 'Conoce la utilidad del computador, sus partes y características mediante el contacto directo. ', 72, 1),
(185, 'Desarrolla planimetrías de movimiento y espacio.', 73, 1),
(186, 'Desarrolla figura corporal simple y trabaja en pareja planos coreográficos. ', 73, 1),
(187, 'Conoce y nombra el vocabulario referente a los útiles escolares y los usa en sus conversaciones a diario - Knows the corresponding vocabulary to the school supplies and uses this ability in their conversations. ', 74, 1),
(188, 'Reconoce y usa expresiones de saludo y de despedida, de acuerdo a la situación y hora - Knows and uses Greetings expressions in a foreign language according to the daily time .', 74, 1),
(189, 'Reconoce el vocabulario correspondiente a los colores y lo usa en sus conversaciones a diario.- Knows the corresponding vocabulary to the colors and uses this ability in their conversations.', 74, 1),
(190, 'Participa con respeto y sentido de pertenencia de todas las actividades académicas e institucionales construyendo el principio de unidad e integralidad.', 75, 1),
(191, 'Asiste puntualmente al colegio, cumple con los horarios establecidos como norma básica institucional.', 75, 1),
(192, 'Realiza actividades motrices en tiempos distintos y diversos espacios utilizando patrones básicos de manejo de espacios y lateralidad. ', 76, 1),
(193, 'Participa activamente de la creación contextual   de nuestro proyecto de aula LA LECTURA ME DIVIERTE ,mediante la exploración de diferentes materiales artísticos. ', 76, 1),
(194, 'Comprende ,asimila y aplica movimientos motrices de manera adecuada tomando como base del deporte.', 76, 1),
(195, 'Realiza movimientos de coordinacion viso -manual y viso -pédica acordes con su edad.', 76, 1),
(196, 'Desarrolla su habilidad interpretativa y de producción textual mediante el aprestamiento inicial, así como el conocimiento y uso de la escritura en letra cursiva . ', 77, 1),
(197, 'Interpreta textos cortos de forma oral y escrita identificandoles fonética y gráficamente contribuyendo asi al desarrollo de la oralidad y la reflexión escrita.', 77, 1),
(198, 'Produce palabras y frases cortas y sencillas desde la espontaneidad de sus propios pensamientos desarrollando de este modo el uso funcional de la escritura como habilidad fundamental comunicativa.', 77, 1),
(199, 'Establece equivalencias entre conjuntos haciendo composición y descomposición de cantidades, desarrollando su  capacidad analitica y desarrollo de pensamiento.', 78, 1),
(200, 'Establece correspondencias termino a termino entre elementos de un conjunto , identificando las propiedades del conjunto lleno, vacio y unitario.  ', 78, 1),
(201, 'Desarrolla la capacidad de atención, observación y concentración en las diferentes actividades tanto lúdicas como de pensamiento lógico y abstracto.', 78, 1),
(202, 'Discrimina auditivamente relaciones sonoras distinguiendo en ellas el sonido y el silencio como parte fundamental de la musica.', 79, 1),
(203, 'Representa y realiza el ritmo de  canciones con gestos y movimientos de diferentes pates del cuerpo  que le ayudan a fortalecer su lenguaje corporal.', 79, 1),
(204, 'Participa en campañas para la separación objetiva de los residuos orgánicos, beneficiando a la comunidad aledaña con respecto a la creación de compostaje doméstico. ', 80, 1),
(205, 'Construye  cultura ambiental aplicando valores de sentido de pertenencia y responsabilidad en el cuidado del agua.', 80, 1),
(206, 'Hace uso responsable del internet como medio de investigación y contextualización de su aprendizaje.', 81, 1),
(207, 'Conoce la utilidad del computador, sus partes y características mediante el contacto directo y actividades de sensibilización. Para obtener las herramientas y conocimientos necesarios para el trabajo en la sala de sistemas. ', 81, 1),
(208, 'Integra y desarrolla ritmo,coordinación,planos y secuencias de movimiento por medio de la danza.', 82, 1),
(209, 'Integra figuras corporales y manejo de elementos como balones  y raquetas para  complementar  la gimnasia.', 82, 1),
(210, 'Conoce la escritura del vocabulario correspondiente a la familia y hace uso de esta capacidad para comunicarse. Knows relevant vocabulary writing to the family and makes use of this ability to communicate. ', 83, 1),
(211, 'Comprende y responde a preguntas simples utilizando estructuras gramaticales básicas.Understands and answers to simple questions using basic grammatical structures.', 83, 1),
(212, 'Conoce y utiliza el vocabulario correspondiente a los medios de transporte y los usa en diferentes actividades .-know and use special vocabulary in transportation and do different activities.', 83, 1),
(213, 'Mantiene una actitud conciliadora y basada en los valores para fomentar la adecuada convivencia, basado en el optimismo y el amor. ', 84, 1),
(214, 'Desarrolla habilidades que le permiten  formar su carácter de liderazgo y fortalecer su autonomía.', 84, 1),
(215, 'Desarrolla el concepto de autoimagen y manejo de su espacialidad teniendo como referente diferentes entornos y contextos .', 85, 1),
(216, 'Posee la habilidad para desarrollar movimientos que permitan afianzar su capacidad de flexibilidad y velocidad .', 85, 1),
(217, 'Realiza de manera adecuada  los movimientos rudimentarios (gatear,correr,saltar,rodar,etc.)de acuerdo a su edad.', 85, 1),
(218, 'Comprende  los diferentes estímulos (auditivo, visual y de contacto), y reacciona de manera correcta ante ellos.', 85, 1),
(219, 'Realiza producciones cortas desde su propia creatividad ,utilizando diversos referentes (Cuentos ,rimas, adivinanzas, trabalenguas).', 86, 1),
(220, 'Desarrolla su capacidad de observación y análisis para dar orden lógico a las producciones que realiza desde su propia imaginacion .', 86, 1),
(221, 'Interpreta  y analiza diferentes estructuras de un texto con imágenes. ', 86, 1),
(222, 'Construye el concepto de número mediante la habilidad lógica para componer y descomponer cantidades haciendo uso del ábaco gráfico y casilla posicional.', 87, 1),
(223, 'Establece relaciones lógicas entre las operaciones aritméticas de acuerdo al uso y el momento de solucionar determinados problemas matemáticos. ', 87, 1),
(224, 'Aplica el concepto de adición y sustracción en el planteamiento y solución de situaciones problemáticas.', 87, 1),
(225, 'Conoce y distingue las cualidades del sonido, relacionando el silencio como parte de la música, interpretando melodías en la flauta. ', 88, 1),
(226, 'Conoce la importancia del adecuado manejo de la respiración y lo aplica al entonar las canciones.', 88, 1),
(227, 'Valora y respeta su entorno ambiental mediante el desarrollo de acciones dirigidas hacia la preservación y cuidado de los recursos naturales.', 89, 1),
(228, 'Mantiene limpio su lugar de trabajo y uniformes, contribuyendo al cuidado de su entorno .', 89, 1),
(229, 'Conoce la función del Mouse y sus posibilidades de movimiento.', 90, 1),
(230, 'Mantiene una actitud de respeto y responsabilidad en lo referente al uso de los equipos.', 90, 1),
(231, 'Desarrolla el taller de montaje  escénico con ritmos de diferentes épocas musicales.', 91, 1),
(232, 'Integra la danza y el teatro en el desarrollo de las coreografias.', 91, 1),
(233, 'Escribe el nombre de los números en ingles de 1 a 10 incrementando su capacidad comunicativa./Write the name of the numbers in English from 1 to 10 increasing their communication skills.', 92, 1),
(234, 'Conoce y utiliza las preposiciones en inglés cuando compara objetos del aula./Know and use English prepositions when comparing classroom objects.', 92, 1),
(235, 'Reconoce donde están ubicadas las personas, cosas o animales teniendo en cuenta las preposiciones de lugar en inglés./Recognizes where people are located, or animals given the English prepositions of place.', 92, 1),
(236, 'Genera y consolida una actitud y un comportamiento adecuado, a fin de responder satisfactoriamente a las necesidades, expectativas y requerimientos a nivel individual y del colectivo.', 93, 1),
(237, 'Asiste puntualmente al colegio,cumple con los horarios establecidos como norma básica  de convivencia.', 93, 1),
(238, 'Disfruta de las experiencias concretas de aprendizaje, tales como salidas al aire libre, construcción de modelos o participación en dramatizaciones y juegos.', 94, 1),
(239, 'Adopta posiciones corporales diferentes, siguiendo instrucciones verbales y señales auditivas. ', 94, 1),
(240, 'Realiza diferentes actividades motrices en diversos entornos utilizando patrones básicos.', 94, 1),
(241, 'Ejecuta posturas, posiciones corporales y formaciones grupales diversas, en orden creciente de complejidad.', 94, 1),
(242, 'Desarrolla su capacidad analítica y reflexiva mediante la interpretación de textos escritos, solucionando cuestionamientos con base a estas interpretaciones.  ', 95, 1),
(243, 'Analiza imágenes y con esta interpretación realiza producciones escritas complejas haciendo uso de su espontaneidad. ', 95, 1),
(244, 'Desarrolla su capacidad de producción textual al construir textos claros, organizados y coherentes.', 95, 1),
(245, 'Desarrolla la habilidad transitiva y reversible del pensamiento mediante el desarrollo de sumas de tres dígitos descomponiendo y restas de tres dígitos desagrupando.', 96, 1),
(246, 'Formula, analiza y resuelve problemas matemáticos  con cantidades de tres dígitos a partir de situaciones cotidianas fortaleciendo su pensamiento abstracto.', 96, 1),
(247, 'Reconoce en los objetos atributos que se pueden medir,utilizando instrumentos  como regla, metro, reloj.', 96, 1),
(248, 'Utiliza la voz, la percusión corporal y los instrumentos como recursos para el acompañamiento de textos y canciones,de igual forma disfruta de la ejecución de la flauta dulce. ', 97, 1),
(249, 'Interpreta canciones que favorecen la improvisación, el movimiento y el juego.', 97, 1),
(250, 'Promueve acciones dirigidas hacia el cuidado y preservación de su entorno, mediante el desarrollo continuo del carácter de liderazgo y emprendimiento.', 98, 1),
(251, 'Desarrolla la conciencia y cultura ambiental necesarias para contribuir al desarrollo sostenible de nuestro planeta. ', 98, 1),
(252, 'Desarrolla la habilidad para la manipulación de juegos didácticos en la internet  de manera independiente.', 99, 1),
(253, 'Usa  instrumentos tecnológicos de su entorno inmediato de acuerdo con la función tecnológica propia de cada uno.', 99, 1),
(254, 'Desarrolla el taller de montaje  escénico con ritmos de diferentes épocas musicales.', 100, 1),
(255, 'Integra la danza y el teatro en el desarrollo de las coreografias.', 100, 1),
(256, 'Escribe el nombre de los números en ingles de 1 a 10 incrementando su capacidad comunicativa./Write the name of the numbers in English from 1 to 10 increasing their communication skills.', 101, 1),
(257, 'Conoce y utiliza las preposiciones en inglés cuando compara objetos del aula./Know and use English prepositions when comparing classroom objects.', 101, 1),
(258, 'Reconoce donde están ubicadas las personas, cosas o animales teniendo en cuenta las preposiciones de lugar en inglés./Recognizes where people are located, or animals given the English prepositions of place.', 101, 1),
(259, 'Genera y consolida una actitud y un comportamiento adecuado, a fin de responder satisfactoriamente a las necesidades, expectativas y requerimientos a nivel individual y del colectivo.', 102, 1),
(260, 'Asiste puntualmente al colegio,cumple con los horarios establecidos como norma básica  de convivencia.', 102, 1),
(261, 'Disfruta de las experiencias concretas de aprendizaje, tales como salidas al aire libre, construcción de modelos o participación en dramatizaciones y juegos.', 103, 1),
(262, 'Adopta posiciones corporales diferentes, siguiendo instrucciones verbales y señales auditivas. ', 103, 1),
(263, 'Realiza diferentes actividades motrices en diversos entornos utilizando patrones básicos.', 103, 1),
(264, 'Ejecuta posturas, posiciones corporales y formaciones grupales diversas, en orden creciente de complejidad.', 103, 1),
(265, 'Desarrolla su capacidad analítica y reflexiva mediante la interpretación de textos escritos, solucionando cuestionamientos con base a estas interpretaciones.  ', 104, 1),
(266, 'Analiza imágenes y con esta interpretación realiza producciones escritas complejas haciendo uso de su espontaneidad. ', 104, 1),
(267, 'Desarrolla su capacidad de producción textual al construir textos claros, organizados y coherentes.', 104, 1),
(268, 'Desarrolla la habilidad transitiva y reversible del pensamiento mediante el desarrollo de sumas de tres dígitos descomponiendo y restas de tres dígitos desagrupando.', 105, 1),
(269, 'Formula, analiza y resuelve problemas matemáticos  con cantidades de tres dígitos a partir de situaciones cotidianas fortaleciendo su pensamiento abstracto.', 105, 1),
(270, 'Reconoce en los objetos atributos que se pueden medir,utilizando instrumentos  como regla, metro, reloj.', 105, 1),
(271, 'Utiliza la voz, la percusión corporal y los instrumentos como recursos para el acompañamiento de textos y canciones,de igual forma disfruta de la ejecución de la flauta dulce. ', 106, 1),
(272, 'Interpreta canciones que favorecen la improvisación, el movimiento y el juego.', 106, 1),
(273, 'Promueve acciones dirigidas hacia el cuidado y preservación de su entorno, mediante el desarrollo continuo del carácter de liderazgo y emprendimiento.', 107, 1),
(274, 'Desarrolla la conciencia y cultura ambiental necesarias para contribuir al desarrollo sostenible de nuestro planeta. ', 107, 1),
(275, 'Desarrolla la habilidad para la manipulación de juegos didácticos en la internet  de manera independiente.', 108, 1),
(276, 'Usa  instrumentos tecnológicos de su entorno inmediato de acuerdo con la función tecnológica propia de cada uno.', 108, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla cursos
--

DROP TABLE IF EXISTS cursos;
CREATE TABLE IF NOT EXISTS cursos (
  cu_idCurso int(11) NOT NULL AUTO_INCREMENT,
  cu_nombre varchar(15) NOT NULL,
  cu_idGradoFK int(11) NOT NULL,
  cu_estado tinyint(4) NOT NULL,
  PRIMARY KEY (cu_idCurso),
  KEY cu_idGradoFK (cu_idGradoFK)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla cursos
--

INSERT INTO cursos (cu_idCurso, cu_nombre, cu_idGradoFK, cu_estado) VALUES
(1, 'Parvulos', 1, 1),
(2, 'Pre-Kinder A', 2, 1),
(3, 'Pre-Kinder B', 2, 1),
(4, 'Pre-Kinder C', 2, 1),
(5, 'Kinder A', 3, 1),
(6, 'Kinder B', 3, 1),
(7, 'Kinder C', 3, 1),
(8, 'Transicion A', 4, 1),
(9, 'Transicion B', 4, 1),
(10, 'Ninguno', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla estudiantes
--

DROP TABLE IF EXISTS estudiantes;
CREATE TABLE IF NOT EXISTS estudiantes (
  es_idEstudiante int(11) NOT NULL AUTO_INCREMENT,
  es_nombre varchar(20) NOT NULL,
  es_apellido varchar(20) NOT NULL,
  es_codigo int(11) NOT NULL,
  es_idDocumentoFK int(11) NOT NULL,
  es_numeroDocumento int(11) NOT NULL,
  es_jornada varchar(10) NOT NULL,
  es_idRolFK int(11) NOT NULL,
  es_idGradoFK int(11) NOT NULL,
  es_idCursoFK int(11) NOT NULL,
  es_fotoEstudiante longblob,
  es_estado tinyint(4) NOT NULL,
  PRIMARY KEY (es_idEstudiante),
  UNIQUE KEY es_numeroDocumento (es_numeroDocumento),
  KEY es_idDocumentoFK (es_idDocumentoFK),
  KEY es_idRolFK (es_idRolFK),
  KEY es_idCursoFK (es_idCursoFK),
  KEY FKGRADOFK (es_idGradoFK)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla estudiantes
--

INSERT INTO estudiantes (es_idEstudiante, es_nombre, es_apellido, es_codigo, es_idDocumentoFK, es_numeroDocumento, es_jornada, es_idRolFK, es_idGradoFK, es_idCursoFK, es_fotoEstudiante, es_estado) VALUES
(1, 'Es Parvulos', 'Lopez', 12, 1, 1233888846, 'Unica', 4, 1, 1, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 1),
(2, 'Es Kinder', 'Franco', 1234564, 1, 3214567, 'Unica', 4, 3, 5, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 0),
(3, 'Es Transicion', 'Estudiante', 43256, 1, 2345675, 'Unica', 4, 2, 4, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 1),
(4, 'Kinder', 'Prueba', 238946, 1, 12456723, 'Unica', 4, 3, 5, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 1),
(5, 'Kinder 3', 'Prueba', 349872, 1, 1290874, 'Unica', 4, 3, 5, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 1),
(6, 'Kinder 4', 'Prueba', 98765, 1, 4567890, 'Unica', 4, 3, 5, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 1),
(7, 'Kinder 5', 'Prueba', 654327, 1, 9876, 'Unica', 4, 3, 5, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 0),
(8, 'Kinder 6', 'Prueba', 1234532, 1, 1231232, 'Unica', 4, 3, 5, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 0),
(9, 'Kinder 7', 'Prueba', 1234, 1, 12345, 'Unica', 4, 3, 5, 0x70616e64612d776f6f642d77616c6c2d6465636f726174696f6e2e6a7067, 0),
(26, 'Kinder8', 'Prueba', 1, 1, 23, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(27, 'Kinder9', 'Prueba', 2, 1, 24, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(28, 'Kinder10', 'Prueba', 3, 1, 25, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(29, 'Kinder11', 'Prueba', 4, 1, 26, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(30, 'Kinder12', 'Prueba', 5, 1, 27, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(31, 'Kinder13', 'Prueba', 6, 1, 28, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(32, 'Kinder14', 'Prueba', 7, 1, 29, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(33, 'Kinder15', 'Prueba', 8, 1, 30, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(34, 'Kinder16', 'Prueba', 9, 1, 31, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(35, 'Kinder17', 'Prueba', 10, 1, 32, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(36, 'Kinder18', 'Prueba', 11, 1, 33, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(37, 'Kinder19', 'Prueba', 17, 1, 34, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(38, 'Kinder20', 'Prueba', 13, 1, 35, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(39, 'Kinder21', 'Prueba', 14, 1, 36, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(40, 'Kinder22', 'Prueba', 15, 1, 37, 'Unica', 4, 3, 5, 0x6e756c6c, 0),
(41, 'Kinder23', 'Prueba', 16, 1, 38, 'Unica', 4, 3, 5, 0x6e756c6c, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla grados
--

DROP TABLE IF EXISTS grados;
CREATE TABLE IF NOT EXISTS grados (
  gr_idGrado int(11) NOT NULL AUTO_INCREMENT,
  gr_nombre varchar(15) NOT NULL,
  gr_estado int(11) NOT NULL,
  PRIMARY KEY (gr_idGrado)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla grados
--

INSERT INTO grados (gr_idGrado, gr_nombre, gr_estado) VALUES
(1, 'Parvulos', 1),
(2, 'Pre-Kinder', 1),
(3, 'Kinder', 1),
(4, 'Transicion', 1),
(5, 'Ninguno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla materias
--

DROP TABLE IF EXISTS materias;
CREATE TABLE IF NOT EXISTS materias (
  ma_idMateria int(11) NOT NULL AUTO_INCREMENT,
  ma_nombre varchar(25) NOT NULL,
  ma_intensidad int(5) NOT NULL,
  ma_docenteAsignadoFK int(11) DEFAULT NULL,
  ma_estado int(11) NOT NULL,
  PRIMARY KEY (ma_idMateria),
  KEY ma_docenteAsignadoFK (ma_docenteAsignadoFK)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla materias
--

INSERT INTO materias (ma_idMateria, ma_nombre, ma_intensidad, ma_docenteAsignadoFK, ma_estado) VALUES
(1, 'Danzas', 4, 5, 1),
(2, 'Ingles', 4, 1, 1),
(3, 'Intra e inter personal', 4, 1, 1),
(4, 'Kinestesica', 4, 1, 1),
(5, 'Linguistica', 4, 1, 1),
(6, 'Logica matematica', 4, 1, 1),
(7, 'Musica', 4, 1, 1),
(8, 'Naturista', 4, 1, 1),
(9, 'Sistemas', 4, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla migrations
--

DROP TABLE IF EXISTS migrations;
CREATE TABLE IF NOT EXISTS migrations (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  migration varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  batch int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla migrations
--

INSERT INTO migrations (id, migration, batch) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla notas
--

DROP TABLE IF EXISTS notas;
CREATE TABLE IF NOT EXISTS notas (
  no_idNota int(11) NOT NULL AUTO_INCREMENT,
  no_nombre varchar(20) NOT NULL,
  no_descripcion varchar(30) NOT NULL,
  no_estado int(11) NOT NULL,
  PRIMARY KEY (no_idNota)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla notas
--

INSERT INTO notas (no_idNota, no_nombre, no_descripcion, no_estado) VALUES
(0, 'SN', 'Sin Nota', 1),
(1, 'NA', 'Necesita Apoyo', 1),
(2, 'VC', 'En Vias de Construción', 1),
(3, 'C', 'Construido', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla notasgenerales
--

DROP TABLE IF EXISTS notasgenerales;
CREATE TABLE IF NOT EXISTS notasgenerales (
  ng_idNotaGeneral int(11) NOT NULL AUTO_INCREMENT,
  ng_idEstudianteFK int(11) NOT NULL,
  ng_idUsuarioFK int(11) NOT NULL,
  ng_idMateriaFK int(11) NOT NULL,
  ng_fallas int(2) NOT NULL,
  ng_idNotaFK int(11) NOT NULL,
  PRIMARY KEY (ng_idNotaGeneral),
  KEY ng_idEstudianteFK (ng_idEstudianteFK),
  KEY ng_idusuarioFK (ng_idUsuarioFK),
  KEY ng_idMateriaFK (ng_idMateriaFK),
  KEY ng_idNotaFK (ng_idNotaFK)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla observaciones
--

DROP TABLE IF EXISTS observaciones;
CREATE TABLE IF NOT EXISTS observaciones (
  ob_idObservaciones int(11) NOT NULL AUTO_INCREMENT,
  ob_idTipoObservacionFK int(11) NOT NULL,
  ob_descripcion varchar(500) NOT NULL,
  ob_estado tinyint(4) NOT NULL,
  PRIMARY KEY (ob_idObservaciones),
  KEY ob_idTipoObservacionFK (ob_idTipoObservacionFK)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla observaciones
--

INSERT INTO observaciones (ob_idObservaciones, ob_idTipoObservacionFK, ob_descripcion, ob_estado) VALUES
(1, 1, 'Comprende la diferencia entre las palabras agudas y esdrujulas.', 1),
(2, 2, 'Falta comprensión lectora', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla observacionesgenerales
--

DROP TABLE IF EXISTS observacionesgenerales;
CREATE TABLE IF NOT EXISTS observacionesgenerales (
  og_idObservacionGeneral int(11) NOT NULL AUTO_INCREMENT,
  og_idEstudianteFK int(11) NOT NULL,
  og_idTipoObservacionFK int(11) NOT NULL,
  og_idObservacionesFK int(11) DEFAULT NULL,
  PRIMARY KEY (og_idObservacionGeneral),
  KEY og_idEstudianteFK (og_idEstudianteFK),
  KEY og_idTipoObservacionFK (og_idTipoObservacionFK),
  KEY og_idObservacionesFK (og_idObservacionesFK)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla observacionesgenerales
--

INSERT INTO observacionesgenerales (og_idObservacionGeneral, og_idEstudianteFK, og_idTipoObservacionFK, og_idObservacionesFK) VALUES
(1, 4, 1, 0),
(2, 5, 2, 0),
(3, 6, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla password_resets
--

DROP TABLE IF EXISTS password_resets;
CREATE TABLE IF NOT EXISTS password_resets (
  email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  token varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  KEY password_resets_email_index (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla periodos
--

DROP TABLE IF EXISTS periodos;
CREATE TABLE IF NOT EXISTS periodos (
  pe_idPeriodo int(11) NOT NULL AUTO_INCREMENT,
  pe_nombre varchar(15) NOT NULL,
  pe_fechaInicial date NOT NULL,
  pe_fechaFinal date NOT NULL,
  pe_estado tinyint(4) NOT NULL,
  PRIMARY KEY (pe_idPeriodo)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla periodos
--

INSERT INTO periodos (pe_idPeriodo, pe_nombre, pe_fechaInicial, pe_fechaFinal, pe_estado) VALUES
(1, 'Primero', '2018-01-01', '2018-01-01', 0),
(2, 'Segundo', '2018-01-01', '2018-01-01', 1),
(3, 'Tercero', '2018-01-01', '2018-01-01', 0),
(4, 'Cuarto', '2018-01-01', '2018-01-01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla procesos
--

DROP TABLE IF EXISTS procesos;
CREATE TABLE IF NOT EXISTS procesos (
  pro_idProceso int(11) NOT NULL AUTO_INCREMENT,
  pro_nombre varchar(100) NOT NULL,
  pro_idMateriaFK int(11) NOT NULL,
  pro_idPeriodoFK int(11) NOT NULL,
  pro_idGradoFK int(11) NOT NULL,
  pro_estado int(11) NOT NULL,
  PRIMARY KEY (pro_idProceso),
  KEY pro_idMateriaFK (pro_idMateriaFK),
  KEY pro_idPeriodoFK (pro_idPeriodoFK),
  KEY pro_idGradoFK (pro_idGradoFK)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla procesos
--

INSERT INTO procesos (pro_idProceso, pro_nombre, pro_idMateriaFK, pro_idPeriodoFK, pro_idGradoFK, pro_estado) VALUES
(1, 'DESARROLLO Y ESTIMULACION DEL SISTEMA LOCOMOTOR, RITMO Y ESPACIO', 1, 1, 2, 1),
(2, 'ORALIDAD Y COMPRENSIÓN', 2, 1, 2, 1),
(3, 'FORTALECIMIENTO DEL VALOR DE LA RESPONSABILIDAD E IDENTIDAD', 3, 1, 2, 1),
(4, 'APRESTAMIENTO Y CREATIVIDAD', 4, 1, 2, 1),
(5, 'PRODUCCION TEXTUAL Y TOPOGRAFIA DE LA ESCRITURA', 5, 1, 2, 1),
(6, 'RELACIONES ESPACIALES, ATRIBUTOS, PRINCIPIOS DE CONTEO', 6, 1, 2, 1),
(7, 'ATENCIÓN Y MEMORIA ', 7, 1, 2, 1),
(8, 'CONCIENTIZACION AMBIENTAL E HIGIENE PERSONAL', 8, 1, 2, 1),
(9, 'CONOCIMIENTOS BÁSICOS', 9, 1, 2, 1),
(10, 'RITMO,  COORDINACIÓN Y COREOGRAFÍA ', 1, 2, 2, 1),
(11, 'ORALIDAD Y COMPRENSIÓN', 2, 2, 2, 1),
(12, 'RECONOCIMIENTO DEL OTRO E INDEPENDENCIA', 3, 2, 2, 1),
(13, 'DESARROLLO MOTOR FINO Y GRUESO.', 4, 2, 2, 1),
(14, 'ORALIDAD, INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL', 5, 2, 2, 1),
(15, 'NOCIÓN DE FORMA Y COLOR. CONSTRUCCIÓN NUMÉRICA.', 6, 2, 2, 1),
(16, 'MOVIMIENTO- SONIDO -SILENCIO', 7, 2, 2, 1),
(17, 'CULTURA AMBIENTAL', 8, 2, 2, 1),
(18, 'SOFTWARE Y COMPORTAMIENTO', 9, 2, 2, 1),
(19, 'RITMOS INFANTILES RONDAS Y CANTICUENTOS', 1, 3, 2, 1),
(20, 'COLORES PRIMARIOS, ANIMALES Y MIEMBROS DE LA FAMILIA', 2, 3, 2, 1),
(21, 'RECONOCIMIENTO DEL OTRO -ACEPTACIÓN Y VALORES', 3, 3, 2, 1),
(22, 'MOTRICIDAD GRUESA –MOTRICIDAD FINA', 4, 3, 2, 1),
(23, 'INTERPRETACIÓN DE IMÁGENES ANÁLISIS TEXTUAL', 5, 3, 2, 1),
(24, 'CONSTRUCCIÓN CONCEPTO DE NÚMERO Y CONTEO CONSECUTIVO', 6, 3, 2, 1),
(25, 'EXPLORAR LAS CUALIDADES DEL SONIDO', 7, 3, 2, 1),
(26, 'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE', 8, 3, 2, 1),
(27, 'SOFTWARE Y PARTICIPACIÓN', 9, 3, 2, 1),
(28, 'MANEJO DE TIEMPOS Y PLANOS COREOGRAFICOS', 1, 4, 2, 1),
(29, 'PARTES DEL CUERPO, NÚMEROS Y FIGURAS GEOMÉTRICAS', 2, 4, 2, 1),
(30, 'VALORES', 3, 4, 2, 1),
(31, 'DESTREZA  MANUAL', 4, 4, 2, 1),
(32, 'ANÁLISIS Y PRODUCCIÓN DE TEXTO', 5, 4, 2, 1),
(33, 'CONSTRUCCIÓN NUMÉRICA', 6, 4, 2, 1),
(34, 'INTERPRETACIÓN VOCAL', 7, 4, 2, 1),
(35, 'CULTURA AMBIENTAL', 8, 4, 2, 1),
(36, 'INTERNET E INVESTIGACIÓN', 9, 4, 2, 1),
(37, 'LATERALIDAD  Y COREOGRAFIA', 1, 1, 3, 1),
(38, 'VOCABULARIO', 2, 1, 3, 1),
(39, 'FORTALECIMIENTO DE LOS VALORES RESPETO Y RESPONSABILIDAD', 3, 1, 3, 1),
(40, 'ESQUEMA Y DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA', 4, 1, 3, 1),
(41, 'CONTEXTUALIZACIÓN ESCRITA Y PRODUCCIÓN TEXTUAL ', 5, 1, 3, 1),
(42, 'CONSTRUCCIÓN DEL CONCEPTO DE NÚMERO - NOCIONES', 6, 1, 3, 1),
(43, 'ATENCIÓN Y MEMORIA', 7, 1, 3, 1),
(44, 'PRESERVACIÓN Y CUIDADO DEL AGUA', 8, 1, 3, 1),
(45, 'CONOCIMIENTOS BÁSICOS', 9, 1, 3, 1),
(46, 'RITMO COORDINACION Y COREOGRAFIA', 1, 2, 3, 1),
(47, 'VOCABULARIO', 2, 2, 3, 1),
(48, 'APRENDIZAJE COOPERATIVO Y DESARROLLO AUTÓNOMO', 3, 2, 3, 1),
(49, 'DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA', 4, 2, 3, 1),
(50, 'INTERPRETACION - PRODUCCION TEXTUAL', 5, 2, 3, 1),
(51, 'UBICACIÓN POSICIONAL Y OPERACIONES MATEMÁTICAS', 6, 2, 3, 1),
(52, 'SONIDO -SILENCIO', 7, 2, 3, 1),
(53, 'CULTURA AMBIENTAL', 8, 2, 3, 1),
(54, 'SOFTWARE Y COMPORTAMIENTO', 9, 2, 3, 1),
(55, 'EXPRESION CORPORAL Y GESTUAL', 1, 3, 3, 1),
(56, 'VOCABULARIO Y CONTEXTO, LOS SENTIDOS Y LA FAMILIA', 2, 3, 3, 1),
(57, 'FORTALECIMIENTO DE LOS VALORES', 3, 3, 3, 1),
(58, 'DESARROLLO DE LA MOTRICIDAD FINA Y GRUESA', 4, 3, 3, 1),
(59, 'CONTEXTUALIZACIÓN ESCRITA Y PRODUCCIÓN TEXTUAL', 5, 3, 3, 1),
(60, 'CONSTRUCCIÓN DEL CONCEPTO DE NÚMERO', 6, 3, 3, 1),
(61, 'INTERPRETACIÓN VOCAL', 7, 3, 3, 1),
(62, 'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE', 8, 3, 3, 1),
(63, 'SOFTWARE Y COMPORTAMIENTO', 9, 3, 3, 1),
(64, 'MONTAJE ESCENICO', 1, 4, 3, 1),
(65, 'VOCABULARY', 2, 4, 3, 1),
(66, 'VALORES DAVINCIANOS', 3, 4, 3, 1),
(67, 'MOTRICIDAD FINA Y GRUESA', 4, 4, 3, 1),
(68, 'INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL. ', 5, 4, 3, 1),
(69, 'CONSTRUCCIÓN DEL CONCEPTO DE NUMERO Y OPERACIONES LÓGICAS', 6, 4, 3, 1),
(70, 'INTERPRETACION VOCAL', 7, 4, 3, 1),
(71, 'PRESERVACIÓN Y CUIDADO DEL MEDIO AMBIENTE ', 8, 4, 3, 1),
(72, 'SOFTWARE EDUCATIVO Y NORMAS', 9, 4, 3, 1),
(73, 'LATERALIDAD Y COREOGRAFIA', 1, 1, 4, 1),
(74, 'VOCABULARIO Y ORALIDAD', 2, 1, 4, 1),
(75, 'VALORES ', 3, 1, 4, 1),
(76, 'CREATIVIDAD Y MOTRICIDAD FINA', 4, 1, 4, 1),
(77, 'INTERPRETACIÓN – PRODUCCIÓN TEXTUAL', 5, 1, 4, 1),
(78, 'UBICACIÓN POSICIONAL Y CARDINALIDAD NUMÉRICA', 6, 1, 4, 1),
(79, 'DISCRIMINACIÓN AUDITIVA', 7, 1, 4, 1),
(80, 'CONCIENTIZACIÓN', 8, 1, 4, 1),
(81, 'CONOCIMIENTOS BASICOS', 9, 1, 4, 1),
(82, 'RITMO,COORDINACION Y COREOGRAFIA', 1, 2, 4, 1),
(83, 'VOCABULARIO Y ESCRITURA ELEMENTAL', 2, 2, 4, 1),
(84, 'VALORES', 3, 2, 4, 1),
(85, 'EXPRESION CORPORAL', 4, 2, 4, 1),
(86, 'PRODUCCIÓN, INTERPRETACIÓN TEXTUAL Y TEMPORALIDAD', 5, 2, 4, 1),
(87, 'UBICACIÓN POSICIONAL - OPERACIONES LÓGICO MATEMÁTICAS', 6, 2, 4, 1),
(88, 'SONIDO -SILENCIO Y RESPIRACIÓN', 7, 2, 4, 1),
(89, 'CULTURA AMBIENTAL E INVESTIGACIÓN', 8, 2, 4, 1),
(90, 'SOFTWARE Y COMPORTAMIENTO', 9, 2, 4, 1),
(91, 'MONTAJE COREOGRÁFICO Y RITMOS LATINOS', 1, 3, 3, 1),
(92, 'ORALIDAD Y ESCRITURA', 2, 3, 4, 1),
(93, 'VALORES', 3, 3, 4, 1),
(94, 'EQUILIBRIO Y COORDINACIÓN ', 4, 3, 4, 1),
(95, 'INTERPRETACIÓN – PRODUCCIÓN TEXTUAL', 5, 3, 4, 1),
(96, 'UBICACIÓN POSICIONAL Y CONCEPTO NUMERICO', 6, 3, 4, 1),
(97, 'APLICACIONES A LA PRACTICA INSTRUMENTAL', 7, 3, 4, 1),
(98, 'APLICACIONES DE LAS TRES R', 8, 3, 4, 1),
(99, 'SOFTWARE', 9, 3, 4, 1),
(100, 'MONTAJE COREOGRÁFICO Y RITMOS LATINOS', 1, 4, 4, 1),
(101, 'ORALIDAD Y ESCRITURA', 2, 4, 4, 1),
(102, 'VALORES', 3, 4, 4, 1),
(103, 'EQUILIBRIO Y COORDINACIÓN', 4, 4, 4, 1),
(104, 'INTERPRETACIÓN Y PRODUCCIÓN TEXTUAL', 5, 4, 4, 1),
(105, 'UBICACIÓN POSICIONAL Y CONCEPTO NUMÉRICO', 6, 4, 4, 1),
(106, 'APLICACIONES A LA PRACTICA INSTRUMENTAL', 7, 4, 4, 1),
(107, 'APLICACIÓN DE LAS TRES R', 8, 4, 4, 1),
(108, 'SOFTWARE', 9, 4, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla roles
--

DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles (
  ro_idRol int(11) NOT NULL AUTO_INCREMENT,
  ro_nombre varchar(15) NOT NULL,
  ro_estado int(11) NOT NULL,
  PRIMARY KEY (ro_idRol),
  UNIQUE KEY ro_nombre (ro_nombre)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla roles
--

INSERT INTO roles (ro_idRol, ro_nombre, ro_estado) VALUES
(1, 'Administrador', 1),
(2, 'Directivo', 1),
(3, 'Profesor', 1),
(4, 'Alumno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tipodocumento
--

DROP TABLE IF EXISTS tipodocumento;
CREATE TABLE IF NOT EXISTS tipodocumento (
  td_idDocumento int(11) NOT NULL AUTO_INCREMENT,
  td_nombre varchar(25) NOT NULL,
  td_estado int(11) NOT NULL,
  PRIMARY KEY (td_idDocumento)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla tipodocumento
--

INSERT INTO tipodocumento (td_idDocumento, td_nombre, td_estado) VALUES
(1, 'NIUP', 1),
(2, 'Tarjeta de Identidad', 1),
(3, 'Cedula de Ciudadania', 1),
(4, 'Cedula de Extranjeria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tipoobservaciones
--

DROP TABLE IF EXISTS tipoobservaciones;
CREATE TABLE IF NOT EXISTS tipoobservaciones (
  to_idTipoObservacion int(11) NOT NULL AUTO_INCREMENT,
  to_nombre varchar(15) NOT NULL,
  to_estado int(11) NOT NULL,
  PRIMARY KEY (to_idTipoObservacion)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla tipoobservaciones
--

INSERT INTO tipoobservaciones (to_idTipoObservacion, to_nombre, to_estado) VALUES
(1, 'Fortalezas', 1),
(2, 'Debilidades', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla users
--

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  email varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  password varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  name varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  us_apellido varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  us_idDocumentoFK int(11) NOT NULL,
  us_numeroDocumento int(11) NOT NULL,
  us_idRolFK int(11) NOT NULL,
  us_idGradoFK int(11) NOT NULL,
  us_idCursoFK int(11) DEFAULT NULL,
  us_estado int(11) NOT NULL,
  remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY users_email_unique (email),
  KEY us_idTipoDocumentoFK (us_idDocumentoFK),
  KEY us_idRolFK (us_idRolFK),
  KEY us_idCursoFK (us_idCursoFK),
  KEY us_idGradoFK (us_idGradoFK)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla users
--

INSERT INTO users (id, email, password, name, us_apellido, us_idDocumentoFK, us_numeroDocumento, us_idRolFK, us_idGradoFK, us_idCursoFK, us_estado, remember_token, created_at, updated_at) VALUES
(1, '', '', 'Ninguno', '', 1, 987654321, 3, 5, 11, 1, NULL, NULL, NULL),
(2, 'admin@gmail.com', '$2y$10$h7UbS74H6Ehoz7Qeqfxtxuoyk8RSFELy3BjNwb87VbVeIMeqHVV6y', 'Admin', 'Prueba', 1, 1233888846, 1, 1, 10, 1, 'HNjnqen7WxU1xvnoMUFIAjfYI8ub4slsssgr6jmxq7YRlDELgbtIBIS0LsV0', '2018-08-26 05:07:09', '2018-08-26 05:07:09'),
(3, 'directivo@teinco.edu.co', '$2y$10$h0AL/0ZdmGs2P6baz7fGt.Gr80z0ETFV9iDN3lJm7ukmvs.92fa9a', 'Directivo', 'Prueba', 1, 1233888846, 2, 2, 10, 0, '2Vyp4iZQspwO7xcq5f0ykegGbA7IGJ6QmqOJk4ipRjPezDPwQmT9uvY2joKr', '2018-08-26 05:11:24', '2018-08-26 05:11:24'),
(4, 'rfrancor@outlook.com', '$2y$10$cON.rCdtVIu.ToxPmwMJ3eaDTHP8h8S/0V9FpdG7OVoH4.WEfkefy', 'Ricardo', 'Franco', 1, 987654321, 1, 1, 1, 1, 'rxeqeL6NbIBqlwWxMpAf6Wg0gymnWEdpyctoa7Z2Ra9ocVspX6tfvGZ8I36H', '2018-08-27 03:25:14', '2018-09-08 20:46:10'),
(5, 'correo.electronico@gmail.com', '$2y$10$COTUtPeNFMtEjmC.h/iCuOhiRO8ZUKz8CNA1jOqo5e24WSr0Xhjc.', 'Ricardo', 'Franco', 1, 8746392, 3, 2, 4, 1, 'crduK5HoGGaPSJ2ljrFQJL25xJBqj1CQklqmgQF2wBrwCFvrxK60q53l3mLc', '2018-08-30 02:10:11', '2018-09-08 20:46:51'),
(6, 'prueba@gmail.com', '$2y$10$DRrQz2YJdtxNPQuhkMXlXeBMuTZQ1wqmcnE4R90L7pxveCf2TGmHW', 'Ricardo', 'Franco', 1, 1233888846, 1, 1, 3, 1, 'OSoqUw2uNuVKfSdQYOsqWWH1j5nF1eUe4Mjk4C6ndXnUbjVybYiX4E6XcVIU', '2018-08-31 19:57:29', '2018-09-08 21:26:32'),
(7, 'docente@gmail.com', '$2y$10$PrBzL1zN/PUqu5upfmdaUuYstR0NOleZWcXeUjVKRQXoUd/VQ.Zqq', 'Profesor', 'Franco', 1, 1233888846, 3, 3, 5, 1, 'DFOzuuX3CJFVunykowA1zhV02WuvqmBl7jVQzUctS7N9VTbzZjybllFAxtUk', '2018-08-31 19:58:02', '2018-09-08 21:31:56'),
(8, 'directivo@gmail.com', '$2y$10$z7rqsUHZeZ2EJQ1xA82RV.cRRmjw7vmr23um7pEVTwXCHn13PBb8O', 'Directivo', 'Franco', 1, 987654321, 2, 1, 1, 1, 'gvVTbVYfYBrdSWCKfHHZzi9Inhn3sgmpIHfGfmOIb0xCR0RqBTKyvQ6neHJB', '2018-08-31 22:00:58', '2018-09-18 00:42:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla usuarios
--

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios (
  us_idUsuario int(11) NOT NULL AUTO_INCREMENT,
  us_usuario varchar(15) NOT NULL,
  us_password varchar(15) NOT NULL,
  us_nombre varchar(20) NOT NULL,
  us_apellido varchar(20) NOT NULL,
  us_idtipoDocumentoFK int(11) NOT NULL,
  us_numeroDocumento int(11) NOT NULL,
  us_idRolFK int(11) NOT NULL,
  us_idCursoFK int(11) DEFAULT NULL,
  us_estado int(11) NOT NULL,
  PRIMARY KEY (us_idUsuario),
  UNIQUE KEY us_numeroDocumento (us_numeroDocumento),
  KEY us_idtipoDocumentoFK (us_idtipoDocumentoFK),
  KEY us_idRolFK (us_idRolFK),
  KEY us_idCursoFK (us_idCursoFK)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla estudiantes
--
ALTER TABLE estudiantes
  ADD CONSTRAINT FKGRADOFK FOREIGN KEY (es_idGradoFK) REFERENCES grados (gr_idGrado);

--
-- Filtros para la tabla users
--
ALTER TABLE users
  ADD CONSTRAINT users_ibfk_1 FOREIGN KEY (us_idGradoFK) REFERENCES grados (gr_idGrado);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
