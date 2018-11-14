<?php

function BuscaHumor($id_usuario)
{
$bd = ConexaoBD();

$select = $bd->prepare(
  'SELECT data_humor, humormanha, humortarde, humornoite
   FROM humor
   WHERE id_usuario = :id_usuario
   ORDER BY data_humor DESC'
);

$select->bindValue(':id_usuario', $id_usuario);

$select -> execute();

return $select -> fetchAll();
}

function BuscaÚltimoHumor($id_usuario)
{
$bd = ConexaoBD();

$select = $bd->prepare(
  'SELECT data_humor, humormanha, humortarde, humornoite
   FROM humor
   WHERE id_usuario = :id_usuario
   ORDER BY data_humor DESC'
);

$select->bindValue(':id_usuario', $id_usuario);

$select -> execute();

return $select -> fetch();
}

function BuscaHistorico ($id_usuario) {

  $bd = ConexaoBD();

  $select = $bd->prepare(
    'SELECT *
     FROM humor
     LEFT JOIN diario ON humor.id_usuario = diario.id_usuario AND humor.data_humor = diario.data_diario
     WHERE diario.id_usuario = :id_usuario OR humor.id_usuario = :id_usuario

     UNION

     SELECT *
     FROM humor
     RIGHT JOIN diario ON humor.id_usuario = diario.id_usuario AND humor.data_humor = diario.data_diario
     WHERE diario.id_usuario = :id_usuario  OR humor.id_usuario = :id_usuario
     ORDER BY data_humor DESC'
  );

  $select->bindValue(':id_usuario', $id_usuario);

  $select -> execute();

  return $select -> fetchAll();
}
 ?>
