<?php
require_once ('../Modelo/conexaobd.php');
require_once ('../Modelo/tabelausuario.php');

session_start();

if (array_key_exists('emailUsuarioLogado', $_SESSION) == false)
{
	$_SESSION['erroLogin'] = "Identifique-se para acessar o perfil";
	header('location: ../paginalogin.php');
	exit();
}
else
{
	$email = $_SESSION['emailUsuarioLogado'];
	$id_usuario = BuscaID($email);
}



$erros = [];

$request = array_map('trim', $_REQUEST);

		$request = filter_var_array(
			$request,
			[
				'data_humor' => FILTER_DEFAULT,
				'humormanha' => FILTER_DEFAULT,
				'humortarde' => FILTER_DEFAULT,
				'humornoite' => FILTER_DEFAULT,
			]
);

$data_humor = $request['data_humor'];

$data = DateTime::createFromFormat('Y-m-d', $data_humor);

if ($data == false)
{
	$erros[]= "O valor da data é inválido";
}

if ($erros != null)
{

	$_SESSION['errohumor'] = $erros;
	header('location: ../paginahumor.php');
}
else
{
 $bd = new PDO('mysql:host=localhost;dbname=tcc-jambd;charset=utf8', 'tcc-jambd', 'jambdtcc');

  $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $insert = $bd->prepare(
   'INSERT INTO diario (id_usuario, data_diario, registrodiario)
    VALUES (:id_usuario, :data_humor, :humormanha, :humortarde, :humornoite)'
 );

 $insert->bindValue(':id_usuario', $id_usuario);
 $insert->bindValue(':data_diario', $request['data_humor']);
 $insert->bindValue(':humormanha', $request['humormanha']);
 $insert->bindValue(':humortarde', $request['humortarde']);
 $insert->bindValue(':humornoite', $request['humornoite']);


 $insert -> execute();

 session_start();
 header('location: ../paginahumor.php');
}
?>
