/*
** SCRIPT DE FUNCIONES DE CÁLCULO Y TRIGGERS
*/

/* Funcion de cálculo del precio de una línea de factura */
CREATE OR REPLACE FUNCTION precio_linea_factura
  (r_factura IN LINEA_DE_FACTURA.NUM_FACTURA%TYPE,
   r_producto IN LINEA_DE_FACTURA.OID_P%TYPE,
   w_cantidad IN LINEA_DE_FACTURA.CANTIDADSERVIDA%TYPE)
RETURN NUMBER is w_precioLinea LINEA_DE_FACTURA.PRECIOLINEA%TYPE; 
BEGIN
  select preciounitario into w_precioLinea from producto
  where oid_p = r_producto;
   w_precioLinea := w_precioLinea * w_cantidad;
  RETURN(w_precioLinea);
END precio_linea_factura;

/
/* Funcion de calculo del IVA de una linea de factura */
CREATE OR REPLACE FUNCTION calcula_iva_linea
  (r_precio IN LINEA_DE_FACTURA.PRECIOLINEA%TYPE) 
  RETURN NUMBER IS w_iva LINEA_DE_FACTURA.IVA_LINEA%TYPE;
BEGIN
  w_iva := r_precio/10;
  return(w_iva);
END calcula_iva_linea;
/

/* Funcion de calculo del IVA de una factura */
CREATE OR REPLACE FUNCTION calcula_iva_factura
  (r_precio IN FACTURA.PRECIO%TYPE) 
  RETURN NUMBER IS w_iva FACTURA.IVA%TYPE;
BEGIN
  w_iva := r_precio/10;
  return(w_iva);
END calcula_iva_factura;
/
  
/* Funcion de cálculo del precio de una factura */
CREATE OR REPLACE FUNCTION precio_factura
  (r_factura IN FACTURA.NUM_FACTURA%TYPE)
RETURN NUMBER is w_precioFactura FACTURA.PRECIO%TYPE;
BEGIN
  select SUM(precioLinea) into w_precioFactura from linea_de_factura
  where num_factura = r_factura;
  RETURN(w_precioFactura);
END precio_factura;

/

/* Trigger sobre la fecha de compra de una máquina */
CREATE OR REPLACE TRIGGER fecha_compra_maquina
  BEFORE INSERT ON MAQUINA
  FOR EACH ROW
BEGIN
    IF:NEW.FECHA_COMPRA > SYSDATE
    THEN raise_application_error(-20600, 'Fecha de compra no aceptada');
    END IF;
END fecha_compra_maquina;

/

/* Trigger sobre la fecha de una revisión */
CREATE OR REPLACE TRIGGER fecha_revision
  BEFORE INSERT ON REVISION
  FOR EACH ROW
BEGIN
    IF:NEW.FECHA < SYSDATE
    THEN raise_application_error(-20600, 'Fecha de revisión no aceptada');
    END IF;
END fecha_revision; 

/

/* Trigger nueva factura */
CREATE OR REPLACE TRIGGER nueva_factura
  BEFORE INSERT ON FACTURA
  FOR EACH ROW
BEGIN
  :NEW.PRECIO := 0;
  :NEW.IVA := 0;
END nueva_factura;

/

CREATE OR REPLACE FUNCTION ASSERT_EQUALS (salida BOOLEAN, salidaEsperada BOOLEAN) RETURN VARCHAR2 AS 
BEGIN
IF( salida = salidaEsperada) THEN
RETURN 'EXITO';
ELSE
  RETURN 'FALLO';
  END IF;
END ASSERT_EQUALS;
/
