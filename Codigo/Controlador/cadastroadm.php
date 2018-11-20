<?php
require_once ('../Modelo/conexaobd.php');

function BuscaEmail($email)
{
$bd = ConexaoBD();

$select = $bd->prepare(
	'SELECT email
	 FROM usuario
	 WHERE email = :email'
);

$select->bindValue(':email', $email);

$select -> execute();

return $select -> fetch();
}

$erros = [];

$request = array_map('trim', $_REQUEST);

		$request = filter_var_array(
			$request,
			[
        'username' => FILTER_DEFAULT,
        'senha' => FILTER_DEFAULT,
				'confirmaSenha' => FILTER_DEFAULT,
			]
);

$username = $request['username'];

if ($username == false)
{
	$erros[]= "O campo username foi deixado nome em branco ou é inválido";
}
else if ( 100 < strlen($username))
{
	$erros[]= "O nome deve ter até 100 caracteres";
}

$senha = $request['senha'];

if ($senha == false)
{
	$erros[]= "O campo senha foi deixado em branco ou é inválido";
}
else if (strlen($senha) < 6 || 12 < strlen($senha))
{
	$erros[]= "A senha deve ter de 6 a 12 dígitos";
}

$confirmasenha = $request['confirmaSenha'];

if ($senha != $confirmasenha)
{
	$erros[]="a confirmação de senha deve ser igual a senha";
}

$senha = password_hash($senha, PASSWORD_DEFAULT);

if ($erros != null)
{
	session_start();
	$_SESSION['errocadastro'] = $erros;
	header('location: ../paginacadastro.php');
}
else
{
 $bd = new PDO('mysql:host=localhost;dbname=tcc-jambd;charset=utf8', 'tcc-jambd', 'jambdtcc');

  $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $insert = $bd->prepare(
   'INSERT INTO adm (username, senha)
    VALUES (:username, :senha)'
 );

 $insert->bindValue(':username', $username);
 $insert->bindValue(':senha', $senha);


 $insert -> execute();

 session_start();
 $_SESSION['emailAdmLogado'] = $username;
unset($_SESSION['emailUsuarioLogado']);
 header('location: ../paginahome.php');
}
?>
