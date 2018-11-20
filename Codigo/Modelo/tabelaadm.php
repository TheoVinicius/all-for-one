<?php
function BuscaAdmPorId($username)
{
	$bd = ConexaoBD();

	$sql = $bd->prepare('SELECT id_adm
	                     FROM adm
						           WHERE username = :username');

	$sql->bindValue(':username', $username);

	$sql->execute();

	return $sql->fetchColumn();
}

 ?>
