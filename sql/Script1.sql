/*
** SCRIPT DE DECLARACIÓN DE TABLAS, SECUENCIAS Y TRIGGERS ASOCIADOS
*/

/* BORRADO DE TABLAS */

DROP TABLE REVISION;
DROP TABLE MAQUINA;
DROP TABLE MASTERMAT;
DROP TABLE LINEA_DE_FACTURA;
DROP TABLE LINEA_DE_PEDIDO;
DROP TABLE PRODUCTO;
DROP TABLE FACTURA;
DROP TABLE PEDIDO;
DROP TABLE USUARIO_MANTENIMIENTO;
DROP TABLE CLIENTE;
DROP TABLE USUARIO_ADMINISTRACION;
DROP TABLE USUARIO_ALMACEN;

/* CREACIÓN DE TABLAS */

/* Tabla de usuario de mantenimiento. Atributo Nombre restringido y no
** nulo. */
CREATE TABLE USUARIO_MANTENIMIENTO
(OID_UM NUMBER(5) PRIMARY KEY,
Nombre CHAR(25) not null,
Apellidos CHAR(25) not null,
correoElectronico VARCHAR2(50) not null,
pass VARCHAR2(20) not null,
unique(Nombre));

/* Tabla de máquina. Atributo Tipo no nulo. */
CREATE TABLE MAQUINA
(NUMERO_SERIE NUMBER(10) PRIMARY KEY,
Tipo CHAR(15) not null,
Productividad CHAR(15),
Fecha_Compra date);

/* Tabla de revisión. El atributo NUMERO_SERIE no nulo. Referencia a las tablas
** de máquina y de usuario de mantenimiento */
CREATE TABLE REVISION
(Identificador NUMBER(10),
NUMERO_SERIE NUMBER(10) not null,
Fecha date,
Tipo CHAR(15),
Resultado CHAR(15),
OID_UM NUMBER(5),
PRIMARY KEY (Identificador, NUMERO_SERIE),
FOREIGN KEY (NUMERO_SERIE) REFERENCES MAQUINA ON DELETE set null,
FOREIGN KEY (OID_UM) REFERENCES USUARIO_MANTENIMIENTO ON DELETE set null);

/* Tabla de cliente. Atributo Nombre restringido. Atributos Nombre y Empresa
** no nulos */
CREATE TABLE CLIENTE
(OID_C NUMBER(5) PRIMARY KEY,
Nombre CHAR(25) not null,
Apellidos CHAR(25) not null,
correoElectronico VARCHAR2(50) not null,
pass VARCHAR2(20) not null,
Empresa CHAR(25) not null);

/* Tabla de usuario de administración. Atributo Nombre restringido y no nulo */
CREATE TABLE USUARIO_ADMINISTRACION
(OID_UAD NUMBER(5) PRIMARY KEY,
Nombre CHAR(25) not null,
Apellidos CHAR(25) not null,
correoElectronico VARCHAR2(50) not null,
pass VARCHAR2(20) not null,
unique (Nombre));

/* Tabla de usuario de almacén. Atributo Nombre restringido y no nulo */
CREATE TABLE USUARIO_ALMACEN
(OID_UAL NUMBER(5) PRIMARY KEY,
Nombre CHAR(25) not null,
Apellidos CHAR(25) not null,
correoElectronico VARCHAR2(50) not null,
pass VARCHAR2(20) not null,
unique(Nombre));

/* Tabla de producto. Atributo Nombre restringido. Atributos Nombre, Stock y
** y PrecioUnitario no nulos. Stock debe ser mayor o igual que 0. Referencias
** a la tabla de usuario del almacén */
CREATE TABLE PRODUCTO
(OID_P NUMBER(8) PRIMARY KEY,
Nombre CHAR(30) not null,
Stock NUMBER(10) not null Check (Stock >=0),
PrecioUnitario FLOAT not null,
OID_UAL NUMBER(5),
FOREIGN KEY (OID_UAL) REFERENCES USUARIO_ALMACEN ON DELETE set null,
unique(Nombre));

/* Tabla de pedido. Atributo Fecha_pedido no nulo. Referencias a la tabla de
** cliente */
CREATE TABLE PEDIDO
(Num_pedido NUMBER(8) PRIMARY KEY,
Fecha_pedido DATE not null,
OID_C NUMBER(5),
FOREIGN KEY (OID_C) REFERENCES CLIENTE ON DELETE set null);

/* Tabla de líneas de pedido. Atributo CantidadPedida no nulo. Referencias a las
** tablas de pedido y de producto */
CREATE TABLE LINEA_DE_PEDIDO
(PRIMARY KEY (Num_pedido, OID_P),
Num_pedido NUMBER(8),
OID_P NUMBER (8),
CantidadPedida NUMBER(10) not null CHECK (CantidadPedida > 299),
FOREIGN KEY (OID_P) REFERENCES PRODUCTO ON DELETE cascade,
FOREIGN KEY (Num_pedido) REFERENCES PEDIDO ON DELETE set null);

/* Tabla de factura. Atributos Precio e IVA no nulos. Referencias a las tablas
** de pedido y de usuario de administración */
CREATE TABLE FACTURA
(Num_factura NUMBER(8) PRIMARY KEY,
Num_pedido NUMBER(8),
Fecha_emision DATE DEFAULT SYSDATE,
Precio FLOAT(8) not null,
IVA FLOAT(8) not null,
OID_UAD NUMBER(5) not null,
FOREIGN KEY (OID_UAD) REFERENCES USUARIO_ADMINISTRACION ON DELETE set null,
FOREIGN KEY (Num_pedido) REFERENCES PEDIDO ON DELETE set null);

/* Tabla de linea de factura. Atributos CantidadServida, PrecioLinea e IVA_Linea
** no nulos. Referencias a las tablas de producto y factura */
CREATE TABLE LINEA_DE_FACTURA
(PRIMARY KEY (Num_factura, OID_P),
Num_factura NUMBER(8),
OID_P NUMBER(8),
CantidadServida NUMBER(10) not null,
PrecioLinea FLOAT(8) not null,
IVA_Linea FLOAT(8) not null,
FOREIGN KEY (OID_P) REFERENCES PRODUCTO ON DELETE set null,
FOREIGN KEY (Num_factura) REFERENCES FACTURA ON DELETE set null);

/* Tabla de máster del material. Atributos Material, Medidas y Canal no nulos.
** Referencia a la tabla de producto */
CREATE TABLE MASTERMAT
(OID_P NUMBER(8) PRIMARY KEY,
Material CHAR(15) not null,
Medidas CHAR(15) not null,
Canal NUMBER(8) not null,
FOREIGN KEY (OID_P) REFERENCES PRODUCTO ON DELETE cascade);

/* BORRADO DE SECUENCIAS */

DROP SEQUENCE Nuevo_Numero_Serie;
DROP SEQUENCE ID_Mantenimiento;
DROP SEQUENCE Identificador_REVISION;
DROP SEQUENCE ID_Cliente;
DROP SEQUENCE ID_Admin;
DROP SEQUENCE ID_Almacen;
DROP SEQUENCE ID_Producto; 
DROP SEQUENCE Nuevo_Pedido;
DROP SEQUENCE Nueva_Factura;

/* CREACIÓN DE SECUENCIAS */

/* Secuencia de NUMERO_SERIE */
CREATE SEQUENCE Nuevo_Numero_Serie START WITH 1 INCREMENT BY 1 MAXVALUE 1000;
/* Secuencia de OID_UM */
CREATE SEQUENCE ID_Mantenimiento START WITH 1 INCREMENT BY 1 MAXVALUE 100;
/* Secuencia de identificador de revision */
CREATE SEQUENCE Identificador_REVISION START WITH 100000 INCREMENT BY 10 
MAXVALUE 1000000;
/* Secuencia de OID_C */
CREATE SEQUENCE ID_Cliente START WITH 1 INCREMENT BY 1 MAXVALUE 1000;
/* Secuencia de OID_UAD */
CREATE SEQUENCE ID_Admin START WITH 1 INCREMENT BY 1 MAXVALUE 100;
/* Secuencia de OID_UAL */
CREATE SEQUENCE ID_Almacen START WITH 1 INCREMENT BY 1 MAXVALUE 100;
/* Secuencia de identificador de producto, OID_P */
CREATE SEQUENCE ID_Producto START WITH 1000 INCREMENT BY 1 MAXVALUE 1999;
/* Secuencia de pedido, Num_pedido */
CREATE SEQUENCE Nuevo_Pedido START WITH 330000 INCREMENT BY 1 MAXVALUE 339999;
/* Secuencia de factura, Num_factura */
CREATE SEQUENCE Nueva_Factura START WITH 340000 INCREMENT BY 1 MAXVALUE 349999;

/* TRIGGERS DE INSERCIÓN DE SECUENCIAS */

/* Trigger que salta al insertar una nueva máquina */
CREATE OR REPLACE TRIGGER crea_maquina
BEFORE INSERT ON MAQUINA
FOR EACH ROW
BEGIN
  SELECT Nuevo_Numero_Serie.NEXTVAL INTO:NEW.NUMERO_SERIE FROM DUAL;
END crea_maquina;

/
/* Trigger que salta al insertar un nuevo usuario de mantenimiento */
CREATE OR REPLACE TRIGGER crea_oid_mantenimiento
BEFORE INSERT ON USUARIO_MANTENIMIENTO
FOR EACH ROW
BEGIN
  SELECT ID_Mantenimiento.NEXTVAL INTO:NEW.OID_UM FROM DUAL;
END crea_oid_mantenimiento;

/
/* Trigger que salta al insertar una nueva revisión */
CREATE OR REPLACE TRIGGER crea_identificador_revisión
BEFORE INSERT ON REVISION
FOR EACH ROW
BEGIN
  SELECT Identificador_REVISION.NEXTVAL INTO:NEW.Identificador FROM DUAL;
END crea_identificador_revision;

/
/* Trigger que salta al insertar un nuevo cliente */
CREATE OR REPLACE TRIGGER crea_oid_cliente
BEFORE INSERT ON CLIENTE
FOR EACH ROW
BEGIN
  SELECT ID_Cliente.NEXTVAL INTO:NEW.OID_C FROM DUAL;
END crea_oid_cliente;

/
/* Trigger que salta al insertar un nuevo usuario de administración */
CREATE OR REPLACE TRIGGER crea_oid_administracion
BEFORE INSERT ON USUARIO_ADMINISTRACION
FOR EACH ROW
BEGIN
  SELECT ID_Admin.NEXTVAL INTO:NEW.OID_UAD FROM DUAL;
END crea_oid_administracion;

/
/* Trigger que salta al insertar un nuevo usuario del almacén */
CREATE OR REPLACE TRIGGER crea_oid_almacen
BEFORE INSERT ON USUARIO_ALMACEN
FOR EACH ROW
BEGIN
  SELECT ID_Almacen.NEXTVAL INTO:NEW.OID_UAL FROM DUAL;
END crea_oid_almacen;

/
/* Trigger que salta al insertar un nuevo producto*/
CREATE OR REPLACE TRIGGER crea_oid_producto
BEFORE INSERT ON PRODUCTO
FOR EACH ROW
BEGIN
  SELECT ID_Producto.NEXTVAL INTO:NEW.OID_P FROM DUAL;
END crea_oid_producto;

/
/* Trigger que salta al insertar un nuevo pedido */
CREATE OR REPLACE TRIGGER crea_nuevo_pedido
BEFORE INSERT ON PEDIDO
FOR EACH ROW
BEGIN
  SELECT Nuevo_Pedido.NEXTVAL INTO:NEW.Num_pedido FROM DUAL;
END crea_nuevo_pedido;

/
/* Trigger que salta al insertar un nueva factura */
CREATE OR REPLACE TRIGGER crea_nueva_factura
BEFORE INSERT ON FACTURA
FOR EACH ROW
BEGIN
  SELECT Nueva_Factura.NEXTVAL INTO:NEW.Num_factura FROM DUAL;
END crea_nueva_factura;