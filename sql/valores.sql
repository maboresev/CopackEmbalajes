/* Generador de datos: Inserciones en la BDD */

/* Productos (12) */
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('1', 'Caja peque�a 25mm', '0', '0,5');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('00', 'Caja peque�a 40mm', '0', '1');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja peque�a 60mm', '0', '2,3');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja peque�a 1cm', '0', '5');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja mediana 25mm', '0', '0,75');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja mediana 40mm', '0', '1,2');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja mediana 60mm', '0', '2,4');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja mediana 1cm', '0', '4,75');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja grande 25mm', '0', '1,3');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('00', 'Caja grande 40mm', '0', '2');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja grande 60mm', '0', '3');
INSERT INTO "SYSTEM"."PRODUCTO" (OID_P, NOMBRE, STOCK, PRECIOUNITARIO) VALUES ('0', 'Caja grande 1cm', '0', '4,5');

/* Masters */

INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1000', 'Cart�n', '25x25x40', '25');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1001', 'Cart�n', '25x25x40', '40');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1002', 'Cart�n', '25x25x40', '60');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1003', 'Cart�n', '25x25x40', '100');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1004', 'Cart�n', '40x45x60', '25');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1005', 'Cart�n', '40x45x60', '40');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1006', 'Cart�n', '40x45x60', '60');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1007', 'Cart�n', '40x45x60', '100');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1008', 'Cart�n', '80x90x110', '25');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1009', 'Cart�n', '80x90x110', '40');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1010', 'Cart�n', '80x90x110', '60');
INSERT INTO "SYSTEM"."MASTERMAT" (OID_P, MATERIAL, MEDIDAS, CANAL) VALUES ('1011', 'Cart�n', '80x90x110', '100');

INSERT INTO "SYSTEM"."CLIENTE" (OID_C, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A", EMPRESA) VALUES ('0', 'Ra�l', 'P�rez', 'rperez@gmail.com', 'Copack2017', 'Bida Farma');
INSERT INTO "SYSTEM"."CLIENTE" (OID_C, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A", EMPRESA) VALUES ('1', 'Laura', 'Gonz�lez', 'agonzalez@gmail.com', 'Copack2017', 'Mart�n Casillas SL');

INSERT INTO "SYSTEM"."USUARIO_ADMINISTRACION" (OID_UAD, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Manuel', 'Borrego Reina', 'maboresev@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_ADMINISTRACION" (OID_UAD, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Pablo', 'Pazo Jimenez', 'pablopazojim@gmail.com', 'Copack2017');

INSERT INTO "SYSTEM"."USUARIO_ALMACEN" (OID_UAL, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Jes�s', 'Damas', 'jdamas@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_ALMACEN" (OID_UAL, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Natalia', 'Mesa', 'nmesa@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_ALMACEN" (OID_UAL, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Violeta', 'Alej�ndrez', 'valejandrez@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_ALMACEN" (OID_UAL, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Eduardo', 'Calder�n', 'ecalderon@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_ALMACEN" (OID_UAL, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Macarena', 'S�nchez', 'msanchez@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_ALMACEN" (OID_UAL, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Javier', 'Herrera', 'jherrera', 'Copack2017');

INSERT INTO "SYSTEM"."USUARIO_MANTENIMIENTO" (OID_UM, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Ra�l', 'Rodr�guez', 'rrodriguez@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_MANTENIMIENTO" (OID_UM, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Sandra', 'chakib', 'schakib@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_MANTENIMIENTO" (OID_UM, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Daniel', 'Riao', 'driao@gmail.com', 'Copack2017');
INSERT INTO "SYSTEM"."USUARIO_MANTENIMIENTO" (OID_UM, NOMBRE, APELLIDOS, CORREOELECTRONICO, "CONTRASE�A") VALUES ('0', 'Alejandro Manuel', 'Riao', 'ariao@gmail.com', 'Copack2017');

INSERT INTO "SYSTEM"."PEDIDO" (NUM_PEDIDO, FECHA_PEDIDO, OID_C) VALUES ('0', TO_DATE('2017-05-10 17:03:58', 'YYYY-MM-DD HH24:MI:SS'), '1');
INSERT INTO "SYSTEM"."PEDIDO" (NUM_PEDIDO, FECHA_PEDIDO, OID_C) VALUES ('0', TO_DATE('2017-05-16 17:04:07', 'YYYY-MM-DD HH24:MI:SS'), '2');
INSERT INTO "SYSTEM"."PEDIDO" (NUM_PEDIDO, FECHA_PEDIDO, OID_C) VALUES ('0', TO_DATE('2017-05-16 17:04:16', 'YYYY-MM-DD HH24:MI:SS'), '1');

INSERT INTO "SYSTEM"."LINEA_DE_PEDIDO" (NUM_PEDIDO, OID_P, CANTIDADPEDIDA) VALUES ('330000', '1002', '500');
INSERT INTO "SYSTEM"."LINEA_DE_PEDIDO" (NUM_PEDIDO, OID_P, CANTIDADPEDIDA) VALUES ('330000', '1005', '1000');
INSERT INTO "SYSTEM"."LINEA_DE_PEDIDO" (NUM_PEDIDO, OID_P, CANTIDADPEDIDA) VALUES ('330000', '1011', '300');
INSERT INTO "SYSTEM"."LINEA_DE_PEDIDO" (NUM_PEDIDO, OID_P, CANTIDADPEDIDA) VALUES ('330001', '1006', '2500');
INSERT INTO "SYSTEM"."LINEA_DE_PEDIDO" (NUM_PEDIDO, OID_P, CANTIDADPEDIDA) VALUES ('330002', '1002', '350');
INSERT INTO "SYSTEM"."LINEA_DE_PEDIDO" (NUM_PEDIDO, OID_P, CANTIDADPEDIDA) VALUES ('330002', '1001', '425');

INSERT INTO "SYSTEM"."FACTURA" (NUM_FACTURA, NUM_PEDIDO, FECHA_EMISION, PRECIO, IVA, OID_UAD) VALUES ('0', '330000', TO_DATE('2017-05-12 17:12:17', 'YYYY-MM-DD HH24:MI:SS'), '00', '0', '1');

INSERT INTO "SYSTEM"."LINEA_DE_FACTURA" (NUM_FACTURA, OID_P, CANTIDADSERVIDA, PRECIOLINEA, IVA_LINEA) VALUES ('340000', '1002', '500', '0', '0');
INSERT INTO "SYSTEM"."LINEA_DE_FACTURA" (NUM_FACTURA, OID_P, CANTIDADSERVIDA, PRECIOLINEA, IVA_LINEA) VALUES ('340000', '1005', '1000', '0', '0');
INSERT INTO "SYSTEM"."LINEA_DE_FACTURA" (NUM_FACTURA, OID_P, CANTIDADSERVIDA, PRECIOLINEA, IVA_LINEA) VALUES ('340000', '1011', '300', '5', '55');
