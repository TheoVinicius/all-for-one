<?php

function BuscaIdCategoria($username)
{
	$bd = ConexaoBD();

	$sql = $bd->prepare('SELECT id_categoria
	                     FROM categoria
						           WHERE categoria = :categoria');

	$sql->bindValue(':categoria', $categoria);

	$sql->execute();

	return $sql->fetchColumn();
}

 ?>
