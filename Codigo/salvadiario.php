<?php
require_once ('conexaobd.php');

$erros = [];

$request = array_map('trim', $_REQUEST);

		$request = filter_var_array(
			$request,
			[
				'data_diario' => FILTER_DEFAULT,
				'registrodiario' => FILTER_DEFAULT,
			]
);

$registrodiario = $request['registrodiario'];

if ($registrodiario == false)
{
	$erros[]= "O campo data foi deixado nome em branco ou é inválido";
}
else if (strlen($registrodiario) < 10 || 2000 < strlen($registrodiario))
	$erros[]= "O registro diário deve ter de 10 a 2000 caracteres";
}

$data_diario = $request['data_diario'];

$data = DateTime::createFromFormat('Y-m-d', $dataNasc);

if ($data == false)
{
	$erros[]= "O valor da data é inválido";
}


if ($erros != null)
{
	session_start();
	$_SESSION['errodiario'] = $erros;
	header('location: paginadiario.php');
}
else
{
 $bd = new PDO('mysql:host=localhost;dbname=tcc-jambd;charset=utf8', 'tcc-jambd', 'jambdtcc');

  $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $insert = $bd->prepare(
   'INSERT INTO diario (id_usuario, data_diario, registrodiario)
    VALUES (:id_usuario, :data_diario, :registrodiario)'
 );

 $insert->bindValue(':id_usuario', $request['id_usuario']);
 $insert->bindValue(':data_diario', $request['data_diario']);
 $insert->bindValue(':registrodiario', $request ['registrodiario']);


 $insert -> execute();

 session_start();
 header('location: paginadiario.php');
}
?>
