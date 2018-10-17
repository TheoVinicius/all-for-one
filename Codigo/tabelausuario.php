<?php

require_once ('conexaobd.php');

function BuscaNome($email)
{
$bd = ConexaoBD();

$select = $bd->prepare(
  'SELECT nomePróprio
   FROM usuario
   WHERE email = :email'
);

$select->bindValue(':email', $email);

$select -> execute();

return $select -> fetchColumn();
}

function BuscaID($email)
{
  $bd = ConexaoBD();

  $select = $bd -> prepare(
    'SELECT id_usuario
    FROM usuario
    WHERE email = :email'
  );

  $select -> bindValue(':email', $email);

  $select -> execute();

  return $select -> fetchColumn();
}
 ?>
