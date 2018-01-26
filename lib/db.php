<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$tns = "(DESCRIPTION =
          (ADDRESS = (PROTOCOL = TCP)(HOST = dsv.quad-systems.com)(PORT = 1521))
            (CONNECT_DATA =
             (SERVER = DEDICATED)
             (SERVICE_NAME = DEMO)
           )
        )";


$conn = oci_connect('cmip_demo', 'cmip_demo', $tns, 'AL32UTF8');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    
    // configuração do formato de datas
    $stm = oci_parse($conn, "ALTER SESSION SET NLS_DATE_FORMAT = 'YYYY-MM-DD'");
    oci_execute($stm);

    // configuração do formato dos numéricos
    $stm = oci_parse($conn, "ALTER SESSION SET NLS_NUMERIC_CHARACTERS = ',.'");
    oci_execute($stm);
    
}

?>