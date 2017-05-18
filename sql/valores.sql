/* Generador de datos: Inserciones en la BDD */

/* Productos (12) */
execute nuevo_producto('1', 'Caja pequeña 25mm', '0', '0,5', null);
execute nuevo_producto('00', 'Caja pequeña 40mm', '0', '1', null);
execute nuevo_producto('0', 'Caja pequeña 60mm', '0', '2,3',null);
execute nuevo_producto('0', 'Caja pequeña 1cm', '0', '5',null);
execute nuevo_producto('0', 'Caja mediana 25mm', '0', '0,75',null);
execute nuevo_producto('0', 'Caja mediana 40mm', '0', '1,2',null);
execute nuevo_producto('0', 'Caja mediana 60mm', '0', '2,4',null);
execute nuevo_producto('0', 'Caja mediana 1cm', '0', '4,75',null);
execute nuevo_producto('0', 'Caja grande 25mm', '0', '1,3',null);
execute nuevo_producto('00', 'Caja grande 40mm', '0', '2',null);
execute nuevo_producto('0', 'Caja grande 60mm', '0', '3',null);
execute nuevo_producto('0', 'Caja grande 1cm', '0', '4,5',null);

/* Masters (12) */

execute master_producto('1000', 'Cartón', '25x25x40', '25');
execute master_producto('1001', 'Cartón', '25x25x40', '40');
execute master_producto('1002', 'Cartón', '25x25x40', '60');
execute master_producto('1003', 'Cartón', '25x25x40', '100');
execute master_producto('1004', 'Cartón', '40x45x60', '25');
execute master_producto('1005', 'Cartón', '40x45x60', '40');
execute master_producto('1006', 'Cartón', '40x45x60', '60');
execute master_producto('1007', 'Cartón', '40x45x60', '100');
execute master_producto('1008', 'Cartón', '80x90x110', '25');
execute master_producto('1009', 'Cartón', '80x90x110', '40');
execute master_producto('1010', 'Cartón', '80x90x110', '60');
execute master_producto('1011', 'Cartón', '80x90x110', '100');

/* Usuarios del sistema */

execute alta_cliente('0', 'Raúl', 'Pérez', 'rperez@gmail.com', 'Copack2017', 'Bida Farma');
execute alta_cliente('1', 'Laura', 'González', 'agonzalez@gmail.com', 'Copack2017', 'Martín Casillas SL');

execute alta_administracion('0', 'Manuel', 'Borrego Reina', 'maboresev@gmail.com', 'Copack2017');
execute alta_administracion('0', 'Pablo', 'Pazo Jimenez', 'pablopazojim@gmail.com', 'Copack2017');

execute alta_almacen('0', 'Jesús', 'Damas', 'jdamas@gmail.com', 'Copack2017');
execute alta_almacen('0', 'Natalia', 'Mesa', 'nmesa@gmail.com', 'Copack2017');
execute alta_almacen('0', 'Violeta', 'Alejándrez', 'valejandrez@gmail.com', 'Copack2017');
execute alta_almacen('0', 'Eduardo', 'Calderón', 'ecalderon@gmail.com', 'Copack2017');
execute alta_almacen('0', 'Macarena', 'Sánchez', 'msanchez@gmail.com', 'Copack2017');
execute alta_almacen('0', 'Javier', 'Herrera', 'jherrera', 'Copack2017');

execute alta_mantenimiento('0', 'Raúl', 'Rodríguez', 'rrodriguez@gmail.com', 'Copack2017');
execute alta_mantenimiento('0', 'Sandra', 'chakib', 'schakib@gmail.com', 'Copack2017');
execute alta_mantenimiento('0', 'Daniel', 'Riao', 'driao@gmail.com', 'Copack2017');
execute alta_mantenimiento('0', 'Alejandro Manuel', 'Riao', 'ariao@gmail.com', 'Copack2017');

/* Pedidos abiertos */

execute inserta_pedido('0', TO_DATE('2017-05-10 17:03:58', 'YYYY-MM-DD HH24:MI:SS'), '1');
execute inserta_pedido('0', TO_DATE('2017-05-16 17:04:07', 'YYYY-MM-DD HH24:MI:SS'), '2');
execute inserta_pedido('0', TO_DATE('2017-05-16 17:04:16', 'YYYY-MM-DD HH24:MI:SS'), '1');

execute inserta_linea_pedido('330000', '1002', '500');
execute inserta_linea_pedido('330000', '1005', '1000');
execute inserta_linea_pedido('330000', '1011', '300');
execute inserta_linea_pedido('330001', '1006', '2500');
execute inserta_linea_pedido('330002', '1002', '350');
execute inserta_linea_pedido('330002', '1001', '425');

execute inserta_factura('0', '330000', TO_DATE('2017-05-12 17:12:17', 'YYYY-MM-DD HH24:MI:SS'), '00', '0', '1');

execute inserta_linea_factura('340000', '1002', '500', '0', '0', '0', '0');
execute inserta_linea_factura('340000', '1005', '1000', '0', '0', '0', '0');
execute inserta_linea_factura('340000', '1011', '300', '5', '55', '0', '0');
