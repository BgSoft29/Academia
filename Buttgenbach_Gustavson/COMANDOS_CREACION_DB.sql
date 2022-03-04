create database academiaButtgenbach;

CREATE TABLE alumnos(
    ->     alumnos_ID INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ->     alumnos_nombres VARCHAR(20) NOT NULL,
    ->     alumnos_apellidos VARCHAR(28) NOT NULL,
    ->     alumnos_dni CHAR(8) NOT NULL,
    ->     alumnos_fechaNacimiento CHAR(10) NOT NULL
    -> );

INSERT INTO alumnos(alumnos_nombres,alumnos_apellidos,alumnos_dni,alumnos_fechaNacimiento) VALUES
     ('Bruno','Buttgenbach Gustavson','71072221','29/07/2000');

CREATE TABLE notas(
         notas_dni CHAR(8) NOT NULL,
         notas_curso VARCHAR(20) NOT NULL,
         notas_calificacion VARCHAR(4) NOT NULL
     );

SELECT a.alumnos_ID, CONCAT(a.alumnos_nombres,' ',a.alumnos_apellidos), a.alumnos_dni FROM alumnos a;

SELECT a.alumnos_ID, CONCAT(a.alumnos_nombres,' ',a.alumnos_apellidos) AS nombre , a.alumnos_dni FROM alumnos a;

INSERT INTO alumnos(alumnos_nombres,alumnos_apellidos,alumnos_dni,alumnos_fechaNacimiento) VALUES
        ('Greta','Buttgenbach Gustavson','75097642','02/03/2009');

INSERT INTO notas(notas_dni,notas_curso,notas_calificacion) VALUES
    ('71072221','Programación','20'),
    ('71072221','Programación','17')