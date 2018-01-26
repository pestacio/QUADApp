<?php

/*
 *  Inicialização da página (ajax/init.php)
 * 
 */

ini_set("display_errors","1");
ini_set("display_startup_errors","1");

// server should keep session data for AT LEAST 1 hour
#ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
#session_set_cookie_params(3600);

date_default_timezone_set('Europe/Lisbon');


if (session_id() == '')
    session_start();



// setting language variable
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'pt';
}
require_once("../lang/lang_".$_SESSION['lang'].".php");


// caso particula us -> en no datepicker
if ($_SESSION['lang'] == 'us')
    $lang_js = '';
else
    $lang_js = $_SESSION['lang'];


# datatables --> language configurada nas propriedades do objeto
#    $('#dt_basic').dataTable({
#                    "language": {
#                            "url": "<?php echo $ui_datatable_lang_url;  ",
#                    },
# url: //cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese.json -- português
#
# ver em http://cdn.datatables.net/plug-ins/1.10.11/i18n/
#

?>

<script>
    // inicialização do JS da língua da plataforma e da MASCARA DE FORMATAÇÃO 
    // utilizado no DATEPICKER
    var JS_LANG = "<?php echo $lang_js;?>";
    var JS_DATE_MASK = "yy-mm-dd";
</script>

<?php 
   require_once("../lib/config.php");
?>