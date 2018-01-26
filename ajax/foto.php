<?php
  $rhid = @$_REQUEST['rhid'];

  $tns = "(DESCRIPTION =
          (ADDRESS = (PROTOCOL = TCP)(HOST = dsv.quad-systems.com)(PORT = 1521))
            (CONNECT_DATA =
             (SERVER = DEDICATED)
             (SERVICE_NAME = DEMO)
           )
        )";
  $conn = oci_connect('cmip_demo', 'cmip_demo', $tns, 'AL32UTF8');
  
  $sql = "SELECT IMAGEM FROM RH_ID_IMAGENS1 WHERE RHID = '$rhid' ";
  $stid = oci_parse($conn, $sql);
  oci_execute($stid);
  $row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
  $img = $row['IMAGEM']->load();
  header("Content-type: image/tiff");
  print $img;
?>    