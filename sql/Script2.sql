/*
** FUNCIONES Y PROCEDIMIEMTOS DE INSERCIÓN DE DATOS
*/

/* Procedimiento de creación de un nuevo cliente */
CREATE OR REPLACE PROCEDURE alta_cliente
  (w_oid IN CLIENTE.OID_C%TYPE,
   w_nom IN CLIENTE.NOMBRE%TYPE,
   w_ape IN CLIENTE.APELLIDOS%TYPE,
   w_mail IN CLIENTE.CORREOELECTRONICO%TYPE,
   w_cont IN CLIENTE.PASS%TYPE,
   w_empr IN CLIENTE.EMPRESA%TYPE) IS
  BEGIN
  INSERT INTO CLIENTE
    VALUES (w_oid, w_nom, w_ape, w_mail, w_cont, w_empr);
  COMMIT WORK;
END alta_cliente;

/

/* Procedimiemto de creacion de un nuevo usuario de mantenimiento */
CREATE OR REPLACE PROCEDURE alta_mantenimiento
  (w_oid IN USUARIO_MANTENIMIENTO.OID_UM%TYPE,
   w_nom IN USUARIO_MANTENIMIENTO.Nombre%TYPE,
   w_ape IN USUARIO_MANTENIMIENTO.APELLIDOS%TYPE,
   w_mail IN USUARIO_MANTENIMIENTO.CORREOELECTRONICO%TYPE,
      w_cont IN USUARIO_MANTENIMIENTO.PASS%TYPE) IS
  BEGIN
  INSERT INTO USUARIO_MANTENIMIENTO
    VALUES (w_oid, w_nom, w_ape, w_mail, w_cont);
  COMMIT WORK;
END alta_mantenimiento;

/

/* Procedimiento de creación de un nuevo usuario de almacén */
CREATE OR REPLACE PROCEDURE alta_almacen
  (w_oid IN USUARIO_ALMACEN.OID_UAL%TYPE,
   w_nom IN USUARIO_ALMACEN.Nombre%TYPE,
   w_ape IN USUARIO_ALMACEN.APELLIDOS%TYPE,
   w_mail IN USUARIO_ALMACEN.CORREOELECTRONICO%TYPE,
   w_cont IN USUARIO_ALMACEN.PASS%TYPE) IS
  BEGIN
  INSERT INTO USUARIO_ALMACEN
    VALUES (w_oid, w_nom, w_ape, w_mail, w_cont);
  COMMIT WORK;
END alta_almacen;

/

/* Procedimiento de creacion de un nuevo usuario de administracion */ 
CREATE OR REPLACE PROCEDURE alta_administracion
  (w_oid IN USUARIO_ADMINISTRACION.OID_UAD%TYPE,
   w_nom IN USUARIO_ADMINISTRACION.Nombre%TYPE,
   w_ape IN USUARIO_ADMINISTRACION.APELLIDOS%TYPE,
   w_mail IN USUARIO_ADMINISTRACION.CORREOELECTRONICO%TYPE,
   w_cont IN USUARIO_ADMINISTRACION.PASS%TYPE) IS
  BEGIN
  INSERT INTO USUARIO_ADMINISTRACION
    VALUES (w_oid, w_nom, w_ape, w_mail, w_cont);
  COMMIT WORK;
END alta_administracion;

/

/* Procedimiento de insercion de una nueva maquina */
CREATE OR REPLACE PROCEDURE nueva_maquina
  (w_numserie IN MAQUINA.NUMERO_SERIE%TYPE,
   w_tipo IN MAQUINA.Tipo%TYPE,
   w_prod IN MAQUINA.Productividad%TYPE,
   w_fecha IN MAQUINA.Fecha_Compra%TYPE) IS
  BEGIN
  INSERT INTO MAQUINA
    VALUES (w_numserie, w_tipo, w_prod, w_fecha);
  COMMIT WORK;
END nueva_maquina;

/

/* Procedimiento de creacion de una revision */
CREATE OR REPLACE PROCEDURE nueva_revision
  (w_ident IN REVISION.Identificador%TYPE,
   w_numserie IN REVISION.NUMERO_SERIE%TYPE,
   w_fecha IN REVISION.Fecha%TYPE,
   w_tipo IN REVISION.Tipo%TYPE,
   w_result IN REVISION.Resultado%TYPE,
   w_usuario IN REVISION.OID_UM%TYPE) IS
   BEGIN
   INSERT INTO REVISION
    VALUES (w_ident, w_numserie, w_fecha, w_tipo, w_result, w_usuario);
  COMMIT WORK;
END nueva_revision;

/

/* Procedimiento de insercion de un producto */
CREATE OR REPLACE PROCEDURE nuevo_producto
  (w_ident IN PRODUCTO.OID_P%TYPE,
   w_nom IN PRODUCTO.Nombre%TYPE,
   w_stock IN PRODUCTO.Stock%TYPE,
   w_precio IN PRODUCTO.PrecioUnitario%TYPE,
   w_usuario IN PRODUCTO.OID_UAL%TYPE) IS
  BEGIN
  INSERT INTO PRODUCTO
    VALUES (w_ident, w_nom, w_stock, w_precio, w_usuario);
  COMMIT WORK;
END nuevo_producto;

/

/* Procedimiento de creacion de un master asociado a un producto */
CREATE OR REPLACE PROCEDURE master_producto
  (w_ident IN MASTERMAT.OID_P%TYPE,
   w_mat IN MASTERMAT.Material%TYPE,
   w_med IN MASTERMAT.Medidas%TYPE,
   w_can IN MASTERMAT.Canal%TYPE) IS
  BEGIN
  INSERT INTO MASTERMAT
    VALUES(w_ident, w_mat, w_med, w_can);
  COMMIT WORK;
END master_producto;

/

/* Procedimiento de creacion de un pedido */
CREATE OR REPLACE PROCEDURE inserta_pedido
  (w_ident IN PEDIDO.NUM_PEDIDO%TYPE,
   w_fecha IN PEDIDO.FECHA_PEDIDO%TYPE,
   w_cliente IN PEDIDO.OID_C%TYPE,
   w_carrito IN PEDIDO.CARRITO%TYPE) IS
  BEGIN
  INSERT INTO PEDIDO
    VALUES(w_ident, w_fecha, w_cliente, w_carrito);
  COMMIT WORK;
END inserta_pedido;

/

/* Procedimiento de insercion de una linea de pedido en un pedido existente */
CREATE OR REPLACE PROCEDURE inserta_linea_pedido
  (w_pedido IN LINEA_DE_PEDIDO.NUM_PEDIDO%TYPE,
   w_producto IN LINEA_DE_PEDIDO.OID_P%TYPE,
   w_cantidad IN LINEA_DE_PEDIDO.CantidadPedida%TYPE) IS
  BEGIN
  INSERT INTO LINEA_DE_PEDIDO
    VALUES(w_pedido, w_producto, w_cantidad);
  COMMIT WORK;
END inserta_linea_pedido;

/

/* Procedimiento de inserción de factura */
CREATE OR REPLACE PROCEDURE inserta_factura
  (w_factura IN FACTURA.NUM_FACTURA%TYPE,
   w_pedido IN FACTURA.NUM_PEDIDO%TYPE,
   w_fecha IN FACTURA.FECHA_EMISION%TYPE,
   w_precio IN FACTURA.PRECIO%TYPE,
   w_iva IN FACTURA.IVA%TYPE,
   w_admin IN FACTURA.OID_UAD%TYPE) IS
  BEGIN
  INSERT INTO FACTURA
    VALUES (w_factura, w_pedido, w_fecha, w_precio, w_iva, w_admin);
  COMMIT WORK;
END inserta_factura;

/

/* Procedimiento de inseción de lineas de factura */
CREATE OR REPLACE PROCEDURE inserta_linea_factura
  (w_factura IN LINEA_DE_FACTURA.NUM_FACTURA%TYPE,
   w_producto IN LINEA_DE_FACTURA.OID_P%TYPE,
   w_cant IN LINEA_DE_FACTURA.CANTIDADSERVIDA%TYPE)IS
   w_precioL LINEA_DE_FACTURA.PRECIOLINEA%TYPE;
   w_ivaL LINEA_DE_FACTURA.IVA_LINEA%TYPE;
   w_precioF FACTURA.PRECIO%TYPE;
   w_ivaF FACTURA.IVA%TYPE;
  BEGIN
    w_precioL := precio_linea_factura(w_factura, w_producto, w_cant);
    w_ivaL := calcula_iva_linea(w_precioL);
  INSERT INTO LINEA_DE_FACTURA
      VALUES(w_factura,w_producto,w_cant,w_precioL,w_ivaL);
    w_precioF := precio_factura(w_factura);
    w_ivaF := calcula_iva_factura(w_precioF);
  UPDATE FACTURA SET PRECIO = w_precioF, IVA = w_ivaF 
      WHERE NUM_FACTURA = w_factura;
  COMMIT WORK;
END inserta_linea_factura;

/

/*
** FUNCIONES Y PROCEDIMIENTOS DE ACTUALIZACION DE DATOS
*/

/* Procedimiento de actualizacion del atributo empresa de un cliente */
CREATE OR REPLACE PROCEDURE actualiza_empresa_cliente
  (r_oid IN CLIENTE.OID_C%TYPE,
   w_empr IN CLIENTE.EMPRESA%TYPE) IS
  BEGIN
  UPDATE CLIENTE SET EMPRESA = w_empr WHERE OID_C = r_oid;
  COMMIT WORK;
END actualiza_empresa_cliente;

/

/* Procedimiento que actualiza la productividad de una maquina */
CREATE OR REPLACE PROCEDURE actualiza_prod_maquina
  (r_numserie IN MAQUINA.NUMERO_SERIE%TYPE,
   w_prod IN MAQUINA.PRODUCTIVIDAD%TYPE) IS
  BEGIN
  UPDATE MAQUINA SET PRODUCTIVIDAD = w_prod WHERE NUMERO_SERIE = r_numserie;
  COMMIT WORK;
END actualiza_prod_maquina;

/

/* Procedimiento que actualiza la fecha de una revision */
CREATE OR REPLACE PROCEDURE actualiza_fecha_revision
  (r_ident IN REVISION.IDENTIFICADOR%TYPE,
   w_fecha IN REVISION.FECHA%TYPE) IS
  BEGIN
  UPDATE REVISION SET FECHA = w_fecha WHERE IDENTIFICADOR = r_ident;
  COMMIT WORK;
END actualiza_fecha_revision;

/

/* Procedimiento que actualiza el resultado de una revision, indicando el
** usuario que ha realizado dicha revision */
CREATE OR REPLACE PROCEDURE actualiza_resultado_revision
  (r_ident IN REVISION.IDENTIFICADOR%TYPE,
   w_res IN REVISION.RESULTADO%TYPE,
   w_usuario IN REVISION.OID_UM%TYPE) IS
  BEGIN
  UPDATE REVISION SET RESULTADO = w_res, OID_UM = w_usuario
    WHERE IDENTIFICADOR = r_ident;
  COMMIT WORK;
END actualiza_resultado_revision;

/

/* Procedimiento de actualizacion del stock de un producto (el usuario que
** modifica el stock queda registrado hasta que se sobreescribe). */
CREATE OR REPLACE PROCEDURE actualiza_stock
  (r_oid IN PRODUCTO.OID_P%TYPE,
   w_stock IN PRODUCTO.STOCK%TYPE,
   w_usuario IN PRODUCTO.OID_UAL%TYPE) IS
  BEGIN
  UPDATE PRODUCTO SET STOCK = w_stock, OID_UAL = w_usuario
    WHERE OID_P = r_oid;
  COMMIT WORK;
END actualiza_stock;

/
 /* Procedimiento que actualiza el precio de un producto */
CREATE OR REPLACE PROCEDURE actualiza_precio_producto
  (r_oid IN PRODUCTO.OID_P%TYPE,
   w_precio IN PRODUCTO.PRECIOUNITARIO%TYPE) IS
  BEGIN
  UPDATE PRODUCTO SET PRECIOUNITARIO = w_precio WHERE OID_P = r_oid;
  COMMIT WORK;
END actualiza_precio_producto;

/

/* Procedimiento de actualizacion del master de un producto */
CREATE OR REPLACE PROCEDURE actualiza_master_producto
  (r_oid IN MASTERMAT.OID_P%TYPE,
   w_medidas IN MASTERMAT.MEDIDAS%TYPE,
   w_canal IN MASTERMAT.CANAL%TYPE) IS
  BEGIN
  UPDATE MASTERMAT SET MEDIDAS = w_medidas, CANAL = w_canal
    WHERE OID_P = r_oid;
  COMMIT WORK;
END actualiza_master_producto;

/

/* Procedimiento de actualizacion de la cantidad servida, el precio y el IVA
** de una linea de factura */
CREATE OR REPLACE PROCEDURE actualiza_cantidad_linea
  (r_factura IN LINEA_DE_FACTURA.NUM_FACTURA%TYPE,
   r_producto IN LINEA_DE_FACTURA.OID_P%TYPE,
   w_cantidad IN LINEA_DE_FACTURA.CANTIDADSERVIDA%TYPE) AS
   w_precio LINEA_DE_FACTURA.PRECIOLINEA%TYPE;
   w_ivaL LINEA_DE_FACTURA.IVA_LINEA%TYPE;
   w_ivaF FACTURA.IVA%TYPE;
   w_precFACT FACTURA.PRECIO%TYPE;
  BEGIN
    w_precio := precio_linea_factura(r_factura, r_producto, w_cantidad);  
  UPDATE LINEA_DE_FACTURA SET CANTIDADSERVIDA = w_cantidad,
                              PRECIOLINEA = w_precio 
      WHERE OID_P = r_producto AND NUM_FACTURA = r_factura;
    w_ivaL := calcula_iva_linea(w_precio);
  UPDATE LINEA_DE_FACTURA SET IVA_LINEA = w_ivaL
      WHERE OID_P = r_producto AND NUM_FACTURA = r_factura;
    w_precFACT := precio_factura(r_factura);
    w_ivaF := calcula_iva_factura(w_precFACT);
  UPDATE FACTURA SET PRECIO = w_precFACT, IVA = w_ivaF 
      WHERE NUM_FACTURA=r_factura;
  COMMIT WORK;
END actualiza_cantidad_linea;

/

CREATE OR REPLACE PROCEDURE actualiza_pedido_carrito
  (r_numped IN PEDIDO.NUM_PEDIDO%TYPE,
  w_carrito IN PEDIDO.CARRITO%TYPE) IS
  BEGIN
  UPDATE PEDIDO SET CARRITO = w_carrito
  WHERE NUM_PEDIDO = r_numped;
  COMMIT WORK;
  END actualiza_pedido_carrito;


/
