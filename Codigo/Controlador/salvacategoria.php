<?php
require_once ('../Modelo/conexaobd.php');
require_once ('../Modelo/tabelausuario.php');

session_start();

if (array_key_exists('emailAdmLogado', $_SESSION) == false)
{
	$_SESSION['erroLogin'] = "Identifique-se para acessar o perfil";
	header('location: ../paginaloginadm.php');
	exit();
}
else
{
	$username = $_SESSION['emailAdmLogado'];
	$id_usuario = BuscaID($email);
}


$erros = [];

$request = array_map('trim', $_REQUEST);

		$request = filter_var_array(
			$request,
			[
				'categoria' => FILTER_DEFAULT,
			]
);

$categoria = $request['categoria'];

if ($categoria == false)
{
	$erros[]= "O campo categoria foi deixado em em branco ou é inválido";
}
else if (100 < strlen($registrodiario))
{
	$erros[]= "A categoria deve ter até 100 caracteres";
}


if ($erros != null)
{

	$_SESSION['errocategoria'] = $erros;
	header('location: ../paginacadastroconteudo.php');
}
else
{
	$pasta = "../../Carregamentos/$categoria";
  mkdir($pasta);

 $bd = new PDO('mysql:host=localhost;dbname=tcc-jambd;charset=utf8', 'tcc-jambd', 'jambdtcc');

  $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $insert = $bd->prepare(
   'INSERT INTO categoria (categoria)
    VALUES (:categoria)'
 );

 $insert->bindValue(':categoria', $categoria);

 $insert -> execute();

 session_start();
 header('location: ../paginacadastroconteudo.php');
}
 ?>
