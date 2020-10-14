DROP DATABASE IF EXISTS `IncidenciasLaravel`;

CREATE DATABASE IF NOT EXISTS IncidenciasLaravel;
USE IncidenciasLaravel;

/* Drop Inverso para las Claves Foraneas */
DROP TABLE IF EXISTS logs;
DROP TABLE IF EXISTS mensajes;
DROP TABLE IF EXISTS incidencias;
DROP TABLE IF EXISTS users;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
id              int(255) auto_increment not null,
nif             varchar(255),
nombre          varchar(255),
apellido1       varchar(255),
apellido2       varchar(255),
nick            varchar(255),
password        varchar(255),
role            varchar(255),
email           varchar(255),
image           varchar(255),
telefono        varchar(255),
departamento    varchar(255),
fecha           varchar(255),
activo          tinyint(1),
created_at      datetime,
updated_at      datetime,
remember_token  varchar(255),
curriculum      varchar(12500),

CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*Administrador*/
INSERT INTO users VALUES(0, '', 'manuel', '', '', 'manuel', '$2y$10$YYU68w7UM0oJXqHzFI6oGOEYzvyvWsYNbrjKAwKWw2coJ6yMWl0kW', 'administrador', 'manuel@manuel.com', '1580829763Universo Abstracto.jpg', '', 'informatica', CURDATE(), 1, CURTIME(), CURTIME(), NULL, '<h2><strong>DATOS PERSONALES</strong></h2>

<hr />
<p>&nbsp;- <strong>Nombre/Apellidos: Manuel Jesus</strong></p>

<p>&nbsp;-<strong>&nbsp;Direccion:</strong> C\Angel Serradilla, n&ordm;6, 6&ordm;B</p>

<p><strong>&nbsp;-&nbsp;Poblaci&oacute;n:</strong> Huelva (CP:21007)</p>

<p>&nbsp;-<strong>&nbsp;Tel&eacute;fono:</strong> 640733366</p>

<p>&nbsp; -<strong>&nbsp;Correo electr&oacute;nico:</strong> miemail@gmail.com</p>

<p>&nbsp;-<strong>&nbsp;Fecha de nacimiento:</strong>&nbsp;4&nbsp;de Octubre de 1995</p>

<h2><strong>FORMACI&Oacute;N ACAD&Eacute;MICA</strong></h2>

<hr />
<h3><strong>- Grado en Desarrollo de Aplicaciones Web:</strong>&nbsp;I.E.S. San Sebasti&aacute;n (2017 - 2019)</h3>

<h3><strong>- F.C.T:</strong> Mi Empresa S.A.(Abril de 2017- Junio de 2019)</h3>

<h2><strong>FORMACI&Oacute;N ACAD&Eacute;MICA</strong></h2>

<hr />
<p><strong>- Grado en Desarrollo de Aplicaciones Web:</strong>&nbsp;I.E.S. San Sebasti&aacute;n (2017-2019)</p>

<p><strong>-&nbsp;F.C.T:</strong><strong> </strong>Mi Empresa S.A.(Abril de 2017- Junio de 2019)</p>

<h2><strong>COMPETENCIAS PROFESIONALES</strong></h2>

<hr />
<pre>
LENGUAJES DE PROGRAMACI&Oacute;N / SCRIPTING </pre>

<ul>
	<li>Java&nbsp;</li>
	<li>C#</li>
	<li>JavaScript</li>
	<li>PHP</li>
</ul>

<pre>
SISTEMAS OPERATIVOS                                                                                    </pre>

<ul>
	<li>&nbsp;Microsoft Windows Desktop</li>
	<li>&nbsp;Microsoft Windows Server</li>
	<li>&nbsp;Ubuntu Desktop</li>
	<li>&nbsp;Ubuntu Server</li>
	<li>&nbsp;CentOS</li>
	<li>&nbsp;OS X</li>
	<li>Android</li>
</ul>

<pre>
BASES DE DATOS</pre>

<ul>
	<li>Microsoft Access</li>
	<li>MySQL</li>
	<li>Definici&oacute;n de consultas SQL y programaci&oacute;n de scripts almacenados PL/SQL</li>
	<li>Dise&ntilde;o e implementaci&oacute;n de bases de datos</li>
</ul>

<pre>
PROGRAMACI&Oacute;N/DISE&Ntilde;O WEB</pre>

<ul>
	<li>HTML5</li>
	<li>JQuery</li>
	<li>Ajax</li>
	<li>JSON</li>
	<li>CSS3</li>
	<li>Angular 5</li>
	<li>XML</li>
	<li>Desarrollo PHP con Framework Laravel</li>
</ul>

<h2><strong>Desarrollador de Aplicaciones Web</strong></h2>

<pre>
EMPRESA DE ADRIAN S.L.</pre>

<hr />
<p>Desarrollo y mantenimiento del sitio web miWEB.com</p>

<h2><strong>COMPETENCIAS COMUNICATIVAS</strong></h2>

<hr />
<p>&nbsp;</p>

<h2><strong>COMPETENCIAS ORGANIZATIVAS</strong></h2>

<hr />
<p>&nbsp;</p>

<h2><strong>COMPETENCIAS PERSONALES</strong></h2>

<hr />
<hr />
<ul>
</ul>
');

INSERT INTO users VALUES(NULL, '56565656R', 'jesus', 'manuel', 'garcia', 'jesus', '$2y$10$YYU68w7UM0oJXqHzFI6oGOEYzvyvWsYNbrjKAwKWw2coJ6yMWl0kW', 'profesor', 'jesus@jesus.com', NULL, '959090807', 'informatica', CURDATE(), 1, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '34565656R', 'laura', 'santos', 'cruz', 'laura', '', 'administrador', 'laura@laura.com', '1580846328Clave de Sol (Fuego 1).jpg', '959123456', 'informatica', CURDATE(), 1, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '66565656R', 'juan', 'perez', 'santos', 'juan', '', 'administrador', 'juan@juan.com', '1580846328Clave de Sol (Fuego 1).jpg', '959123456', 'informatica', CURDATE(), 1, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '46565656R', 'antonio', 'jose', 'garcia', 'antonio', '', 'profesor', 'antonio@antonio.com', '1580846328Clave de Sol (Fuego 1).jpg', '959123456', 'informatica', CURDATE(), 1, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '32565656R', 'lucas', 'garcia', 'fernandez', 'lucas', '', 'profesor', 'lucas@lucas.com', '1580846328Clave de Sol (Fuego 1).jpg', '959123456', 'informatica', CURDATE(), 1, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '29565656R', 'claudia', 'fernandez', 'pinto', 'claudia', '', 'profesor', 'claudia@claudia.com', '1580846194Abstracto 5.png', '959123456', 'informatica', CURDATE(), 0, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '62565656R', 'marcos', 'garcia', 'fernandez', 'marcos', '', 'profesor', 'marcos@marcos.com', '1580846328Clave de Sol (Fuego 1).jpg', '959123456', 'informatica', CURDATE(), 0, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '10565656R', 'isabel', 'fernandez', 'pinto', 'isabel', '', 'profesor', 'isabel@isabel.com', '1580846194Abstracto 5.png', '959123456', 'informatica', CURDATE(), 0, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '21565656R', 'marta', 'fernandez', 'pinto', 'marta', '', 'profesor', 'marta@marta.com', '1580846194Abstracto 5.png', '959123456', 'informatica', CURDATE(), 0, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '45565656R', 'cristina', 'fernandez', 'pinto', 'cristina', '', 'profesor', 'cristina@cristina.com', '1580846194Abstracto 5.png', '959123456', 'informatica', CURDATE(), 0, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '96565656R', 'felipe', 'fernandez', 'pinto', 'felipe', '', 'profesor', 'felipe@felipe.com', '1580846194Abstracto 5.png', '959123456', 'informatica', CURDATE(), 0, CURTIME(), CURTIME(), NULL, NULL);
INSERT INTO users VALUES(NULL, '38565656R', 'daniela', 'fernandez', 'pinto', 'daniela', '', 'profesor', 'daniela@daniela.com', '1580846194Abstracto 5.png', '959123456', 'informatica', CURDATE(), 0, CURTIME(), CURTIME(), NULL, NULL);

DROP TABLE IF EXISTS incidencias;
CREATE TABLE IF NOT EXISTS incidencias(
id                  int(255) auto_increment not null,
user_id             int(255),
fecha_incidencia    varchar(255),
prioridad           varchar(255),
aula                varchar(255),
asunto              varchar(255),
descripcion         text,
created_at          datetime,
updated_at          datetime,
CONSTRAINT pk_incidencias PRIMARY KEY(id),
CONSTRAINT fk_incidencias_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

INSERT INTO incidencias VALUES(NULL, 1, CURDATE(), 'media', 'Aula 1', 'Fuego', 'El ordenador Nº2 esta ardiendo', CURTIME(), CURTIME());
INSERT INTO incidencias VALUES(NULL, 1, CURDATE(), 'alta', 'Aula 1', 'Robo', 'Los ordenadores del Aula 1 han sido robados', CURTIME(), CURTIME());
INSERT INTO incidencias VALUES(NULL, 2, CURDATE(), 'alta', 'Aula 2', 'Baja', 'Antonio esta de baja', CURTIME(), CURTIME());
INSERT INTO incidencias VALUES(NULL, 2, CURDATE(), 'alta', 'Aula 2', 'Hace calor', 'El aire acondicionado no funciona', CURTIME(), CURTIME());
INSERT INTO incidencias VALUES(NULL, 3, CURDATE(), 'baja', 'Aula 3', 'Sin conexion', 'Se ha ido el internet en el instituto', CURTIME(), CURTIME());
INSERT INTO incidencias VALUES(NULL, 3, CURDATE(), 'media', 'Aula 3', 'Estropeado', 'Algunos ordenadores no funcionan', CURTIME(), CURTIME());
INSERT INTO incidencias VALUES(NULL, 4, CURDATE(), 'baja', 'Aula 4', 'Muerte', 'Algunos alumnos han muerto de aburrimiento', CURTIME(), CURTIME());
INSERT INTO incidencias VALUES(NULL, 5, CURDATE(), 'baja', 'Aula 5', 'Muerte Feliz', 'Algunos alumnos han muerto de risa', CURTIME(), CURTIME());

DROP TABLE IF EXISTS mensajes;
CREATE TABLE IF NOT EXISTS mensajes(
id                  int(255) auto_increment not null,
user_id             int(255),
destinatario_id     int(255),
fecha_mensaje       varchar(255),
asunto              varchar(255),
contenido           text,
created_at          datetime,
updated_at          datetime,
CONSTRAINT pk_mensajes PRIMARY KEY(id),
CONSTRAINT fk_mensajes_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

INSERT INTO mensajes VALUES(NULL, 1, 2, CURDATE(), 'Saludo','Hola a todos mis nuevos amigos', CURTIME(), CURTIME());
INSERT INTO mensajes VALUES(NULL, 1, 2, CURDATE(), 'Pesado', 'Deberias callarte pesado', CURTIME(), CURTIME());
INSERT INTO mensajes VALUES(NULL, 2, 1, CURDATE(), 'Ayuda', 'Hola me dejas los apuntes', CURTIME(), CURTIME());
INSERT INTO mensajes VALUES(NULL, 2, 1, CURDATE(), 'Apagar', 'Tu ordenador se ha quedado encendido', CURTIME(), CURTIME());
INSERT INTO mensajes VALUES(NULL, 3, 1, CURDATE(), 'Saludo', 'Como estas, cuanto tiempo', CURTIME(), CURTIME());
INSERT INTO mensajes VALUES(NULL, 4, 2, CURDATE(), 'Agradecer', 'Muchas gracias', CURTIME(), CURTIME());
INSERT INTO mensajes VALUES(NULL, 5, 3, CURDATE(), 'Despedida', 'Adios tio', CURTIME(), CURTIME());
INSERT INTO mensajes VALUES(NULL, 6, 3, CURDATE(), 'Encontrado', 'Han encontrado lo que perdiste', CURTIME(), CURTIME());

DROP TABLE IF EXISTS logs;
CREATE TABLE IF NOT EXISTS logs(
id              int(255) auto_increment not null,
user_id         int(255),
fecha_log       varchar(255),
accion          varchar(255),
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_logs PRIMARY KEY(id),
CONSTRAINT fk_logs_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

INSERT INTO logs VALUES(NULL, 1, CURDATE(), 'login', CURTIME(), CURTIME());
INSERT INTO logs VALUES(NULL, 1, CURDATE(), 'borrar', CURTIME(), CURTIME());
INSERT INTO logs VALUES(NULL, 2, CURDATE(), 'añadir', CURTIME(), CURTIME());
INSERT INTO logs VALUES(NULL, 2, CURDATE(), 'editar', CURTIME(), CURTIME());
INSERT INTO logs VALUES(NULL, 3, CURDATE(), 'enviar', CURTIME(), CURTIME());
INSERT INTO logs VALUES(NULL, 4, CURDATE(), 'enviar', CURTIME(), CURTIME());
INSERT INTO logs VALUES(NULL, 5, CURDATE(), 'login', CURTIME(), CURTIME());
INSERT INTO logs VALUES(NULL, 6, CURDATE(), 'enviar', CURTIME(), CURTIME());

