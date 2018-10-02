<?php
 function ConexaoBD()
 {
   $bd = new PDO('mysql:host=localhost;dbname=tcc_jambd;charset=utf8', 'tcc_jambd', 'jambdtcc');

    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $bd;
 }


?>
