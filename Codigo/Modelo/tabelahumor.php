<?php

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


 ?>
