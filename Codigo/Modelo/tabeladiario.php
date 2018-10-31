<?php

function BuscaRegistro($id_usuario)
{
$bd = ConexaoBD();

$select = $bd->prepare(
  'SELECT registrodiario, data_diario
   FROM diario
   WHERE id_usuario = :id_usuario
   ORDER BY data_diario DESC'
);

$select->bindValue(':id_usuario', $id_usuario);

$select -> execute();

return $select -> fetchAll();
}

function BuscaÚltimoRegistro($id_usuario)
{
$bd = ConexaoBD();

$select = $bd->prepare(
  'SELECT registrodiario, data_diario
   FROM diario
   WHERE id_usuario = :id_usuario
   ORDER BY data_diario DESC'
);

$select->bindValue(':id_usuario', $id_usuario);

$select -> execute();

return $select -> fetch();
}


 ?>
