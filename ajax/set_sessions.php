<?php
if (session_id() == '')
    session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$lang = @$_REQUEST['lang'];

if ($lang != '')
    @$_SESSION['lang'] = $lang;
?>
