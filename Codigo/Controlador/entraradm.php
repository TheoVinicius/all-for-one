<?php

require_once ('../Modelo/conexaobd.php');

 function BuscaSenhaPorUsername($username)
{
 $bd = ConexaoBD();

 $select = $bd->prepare(
   'SELECT senha
    FROM usuario
    WHERE username = :username'
 );

 $select->bindValue(':username', $username);

 $select -> execute();

 return $select -> fetch();

}

	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
	               $request,
	               [ 'username' => FILTER_VALIDATE_EMAIL,
	                 'senha' => FILTER_DEFAULT ]
	           );

	$username = $request['username'];
	$senha = $request['senha'];

	if ($username == false)
	{
		$username = "E-Mail não informado";
	}
		else if ($senha == false)
	{
		$erro = "Senha não informada";
	}
	else
  {
    $adm = BuscaSenhaPorUsername($username);
    if (empty($adm) == false)
    {
      $erro = "Nenhum usuário cadastrado com o e-mail informado";
	  }
    else if ( password_verify($senha, $adm['senha']) == false )
	  {
		   $erro = "A senha está incorreta";
	  }
  }

	if ($erro != null)
	{
		session_start();
		$_SESSION['erroLogin'] = $erro;
		header('location: ../paginaloginadm.php');
  }
	else
	{
		session_start();
		$_SESSION['emailAdmLogado'] = $email;
    unset($_SESSION['emailUsuarioLogado']);
		header('location: ../paginacadastroconteudo.php');
	}
?>
