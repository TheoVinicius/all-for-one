<?php
require_once ('../Modelo/conexaobd.php');
require_once ('entrar.php');

session_start();

if (array_key_exists('emailUsuarioLogado', $_SESSION) == false)
{
	$_SESSION['erroLogin'] = "Identifique-se para acessar o perfil";
	header('location: paginalogin.php');
	exit();
}
else
{
	$email = $_SESSION['emailUsuarioLogado'];

}

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
				'nomePróprio' => FILTER_DEFAULT,
				'sobrenome' => FILTER_DEFAULT,
        'senha' => FILTER_DEFAULT,
				'confirmaSenha' => FILTER_DEFAULT,
				'dataNasc' => FILTER_DEFAULT,
				'sexo' => FILTER_VALIDATE_INT,
				'amigo' => FILTER_DEFAULT,
        'senhaantiga' => FILTER_DEFAULT
			]
);
$senhaantiga = $request['senhaantiga'];

if ($senhaantiga == false)
{
	$erros[]= "O campo senha antiga foi deixado em branco ou é inválido";
}
else
{
  $senhadobanco = BuscaSenhaPorEmail($email);
  if (password_verify($senhaantiga, $senhadobanco['senha']) == false )
  {
     $erros[] = "A senha está incorreta";
  }
}

$nomeProprio = $request['nomePróprio'];

if ($nomeProprio == false)
{
	$erros[]= "O campo nome foi deixado nome em branco ou é inválido";
}
else if (strlen($nomeProprio) < 3 || 35 < strlen($nomeProprio))
{
	$erros[]= "O nome deve ter de 3 a 35 caracteres";
}

$sobrenome = $request['sobrenome'];

if ($sobrenome == false)
{
	$erros[]= "O campo sobrenome foi deixado em branco ou é inválido";
}
else if (strlen($nomeProprio) < 3 || 35 < strlen($nomeProprio))
{
	$erros[]= "O sobrenome deve ter de 3 a 35 caracteres";
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

$dataNasc = $request['dataNasc'];

$data = DateTime::createFromFormat('Y-m-d', $dataNasc);

if ($data == false)
{
	$erros[]= "O valor da data é inválido";
}
else
{
	$hoje = new DateTime();
	$diferença = $data->diff($hoje);

	$anoscorridos = $diferença->y;
	if ($anoscorridos < 16)
	{
	 $erros[]= "A idade mínima para cadastro é 16 anos";
	}
}

$sexo = $request['sexo'];


if ($sexo =! 1 || $sexo =! 2 || $sexo =! 3)

{
	$erros[]= "O campo sexo foi deixado em branco ou é inválido";
}

$amigo = $request['amigo'];

if ($amigo == false)
{
	$erros[]= "O campo amigo foi deixado nome em branco ou é inválido";
}
else if (strlen($amigo) < 3 || 35 < strlen($amigo))
{
	$erros[]= "O nome do amigo deve ter de 3 a 35 caracteres";
}

if ($erros != null)
{
	session_start();
	$_SESSION['erroEdição'] = $erros;
	header('location: ../paginaeditadados.php');
}
else
{
 $bd = new PDO('mysql:host=localhost;dbname=tcc-jambd;charset=utf8', 'tcc-jambd', 'jambdtcc');

  $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $insert = $bd->prepare(
   'UPDATE usuario
    SET nomePróprio = :nomeProprio, sobrenome = :sobrenome, senha = :senha, datNasc = :datNasc, sexo= :sexo, amigo = :amigo
    WHERE email = :email'
 );

 $insert->bindValue(':nomeProprio', $request['nomePróprio']);
 $insert->bindValue(':sobrenome', $request['sobrenome']);
 $insert->bindValue(':senha', $senha);
 $insert->bindValue(':email', $email);
 $insert->bindValue(':datNasc', $request['dataNasc']);
 $insert->bindValue(':sexo', $request['sexo']);
 $insert->bindValue(':amigo', $request['amigo']);

 $insert -> execute();

 session_start();
 header('location: ../paginaperfil.php');
}

}

?>
