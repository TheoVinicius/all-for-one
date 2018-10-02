<?php

require_once ('conexao.php');

 function validaemail($email)
{
 $bd = ConexaoBD();

 $select = $bd->prepare(
   'SELECT email
    FROM usuario
    WHERE email = :email)'
 );

 $select->bindValue(':email', $email);

if (empty($select)) = false
{

}

}

function validasenha($senha)
{
$bd = ConexaoBD();

$select = $bd->prepare(
  'SELECT senha
   FROM usuario
   WHERE senha = :senha)'
);

$select->bindValue(':senha', $senha);

}


	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
	               $request,
	               [ 'email' => FILTER_VALIDATE_EMAIL,
	                 'senha' => FILTER_DEFAULT ]
	           );

	$email = $request['email'];
	$senha = $request['senha'];

	if ($email == false)
	{
		$erro = "E-Mail não informado";
	}
		else if ($senha == false)
	{
		$erro = "Senha não informada";
	}
	else if (array_key_exists($email, /*tabela com dados dos clientes*/) == false)
	{
		$erro = "Nenhum usuário cadastrado com o e-mail informado";
	}
  else if (password_verify($senha, /*tabela com dados dos clientes*/) == false)
	{
		$erro = "A senha está incorreta";
	}

	if ($erro != null)
	{
		session_start();
		$_SESSION['erroLogin'] = $erro;
		header('location: ../paginalogin.php');
  }
	else
	{
		session_start();
		$_SESSION['emailUsuarioLogado'] = $email;
		header('location: ../home.html');
	}
?>
