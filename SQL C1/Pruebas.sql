create or replace 
PACKAGE PRUEBAS_ADMINISTRACION AS
  
  PROCEDURE inicializar;
  PROCEDURE insertar
    (nombre_prueba VARCHAR2, w_nombre VARCHAR2, salidaEsperada BOOLEAN);
  PROCEDURE actualizar
    (nombre_prueba VARCHAR2, w_oid_uad INTEGER, w_nombre VARCHAR2, salidaEsperada BOOLEAN);
  PROCEDURE eliminar
    (nombre_prueba VARCHAR2, w_oid_uad VARCHAR2, salidaEsperada BOOLEAN);
    
END PRUEBAS_ADMINISTRACION;

/

create or replace
PACKAGE BODY PRUEBAS_ADMINISTRACION AS

/* INICIALIZACION (BORRADO) DE LA TABLA */
    
    PROCEDURE  inicializar AS
        BEGIN
              DELETE FROM USUARIO_ADMINISTRACION;
END inicializar;
/* INSERCIÓN DE DATOS */

  PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, salidaEsperada BOOLEAN) AS
      salida BOOLEAN := true;
      administracion administracion%ROWTYPE;
      w_oid_uad INTEGER;
    BEGIN
    
    INSERT INTO USUARIO_ADMINISTRACION VALUES (ID_Admin.nextval, w_nombre);
    
    w_oid_uad:=ID_Admin.currval;
    SELECT * INTO administracion FROM USUARIO_ADMINISTRACION WHERE OID_UAD = w_oid_uad;
    IF (administracion.nombre<>w_nombre) THEN
        salida := false;
      END IF;
      COMMIT WORK;
      
      DBMD_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));
      
      EXCEPTION
      WHEN OTHERS THEN
        DBMD_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
        ROLLBACK;
END insertar;

/* ACTUALIZACIÓN */

  PROCEDURE actualizar  (nombre_prueba VARCHAR2, w_oid_uad INTEGER, w_nombre VARCHAR2, salidaEsperada BOOLEAN) AS
   salida BOOLEAN := true;
   administracion administracion%ROWTYPE;
   
   BEGIN
   
    UPDATE USUARIO_ADMINISTRACION SET nombre=w_nombre WHERE oid_uad=w_oid_uad;
    SELECT * INTO administracion FROM USUARIO_ADMINISTRACION WHERE oid_uad=w_oid_uad;
    
    IF(administracion.nombre<>w_nombre) THEN
      salida := false;
    END IF;
    COMMIT WORK;
    
    DBMD_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

      EXCEPTION
      WHEN OTHERS THEN
        DBMD_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
        ROLLBACK;
END actualizar;

/* ELIMINACIÓN */
  PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid_uad VARCHAR2, salidaEsperada BOOLEAN) AS
    salida BOOLEAN := true;
    n_uad INTEGER;
  BEGIN
  
    DELETE FROM USUARIO_ADMINISTRACION WHERE oid_uad = w_oid_uad;
    SELECT COUNT (*) INTO n_uad FROM USUARIO_ADMINISTRACION WHERE oid_uad = w_oid_uad;
  
    IF (n_uad <> 0) THEN
      salida := false;
    END IF;
    COMMIT WORK;
    
        DBMD_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

      EXCEPTION
      WHEN OTHERS THEN
        DBMD_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
        ROLLBACK;
  
END eliminar;  

END PRUEBAS_ADMINISTRACION;