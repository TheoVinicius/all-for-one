<?php
session_start();
unset($_SESSION['emailUsuarioLogado']);
unset($_SESSION['emailAdmLogado']);
header('location: ../paginalogin.php');

?>
