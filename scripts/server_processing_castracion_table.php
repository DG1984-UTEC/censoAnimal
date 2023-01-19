<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'castracion';
 
// Table's primary key
$primaryKey = 'idC';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(

    array(
        'db'        => 'fecastracion',
        'dt'        => 0,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    // array( 'db' => 'fecastracion', 'dt' => 0 ),
    array( 'db' => 'ciduenoC',  'dt' => 1 ),
    array( 'db' => 'nombreC',   'dt' => 2 ),
    array( 'db' => 'apellidoC',     'dt' => 3 ),
    array( 'db' => 'nmascota',     'dt' => 4 ),
    array( 'db' => 'idchip',     'dt' => 5 ),
    array( 'db' => 'especieC',     'dt' => 6 ),
    array( 'db' => 'sexoC',     'dt' => 7 ),
    array(
        'db'        => 'CREATED_AT_C',
        'dt'        => 8,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array(
        'db'        => 'UPDATED_AT_C',
        'dt'        => 9,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    ),
    array( 'db' => 'sesionC',     'dt' => 10 ),

    array( 
        'db'        => 'idC', 
        'dt'        => 11, 
        'formatter' => function( $d, $row ) { 
            return ' 
            <a class="btn btn-primary btn-block mb-0" href="editarCastracion.php?idC=' . $d . '">Editar</a>
            <a class="btn btn-danger btn-block mb-0" href="confBorrarCastracion.php?idC=' . $d . '">Borrar</a>
            '; 
        } 
    ) 
   
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'censo',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);