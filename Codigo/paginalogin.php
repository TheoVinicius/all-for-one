<?php
	session_start();
	if (array_key_exists('erroLogin', $_SESSION))
	{
	$erro = $_SESSION['erroLogin'];
	unset($_SESSION['erroLogin']);
  }
	else
	{
		$erro = null;
	}

	if (array_key_exists('emailUsuarioLogado', $_SESSION) == true)
	{
		header('location: home.html');
	}
?>

<!DOCTYPE html>
<html lang="pt-br">

<style>

body {
	background-image: url('../fundos/fundoprinc.jpg');
}

#Título {
  font-family: fantasy;
  font-size: 70px;
  text-align: center;
  padding: 0px;
  -webkit-margin-after: 15px;
	border: none;
	border-radius: 0;
	border-top: 1px;
	border-bottom: 1px solid #bdbbbb;
	min-height: 44px;
}

#corpo {
  margin: auto;
  width: 400px;
  background: #fff;
  border: 400px;
  margin-top: 200px;
  padding-top: 10px;
	border-radius: 10px;
	border: 1px solid black
	;
}

#divtítulo {
  background-color:white;
}

#cadastrologin {
	 float: right;
}

#cadastrologin a {
		padding: 4px;
}
/*
#cadastrologin a:hover {
    color: #ff9600;
    border-bottom:3px solid #f3b205;
}

#cadastrologin a:-webkit-any-link {
    color: black;
    cursor: pointer;
    text-decoration: none;
}
*/
#formulario {
    font-family: fantasy;
    font-size: 20px;
		padding: 30px;
		width: auto;
		display: flex;
		flex-direction: row;
    justify-content: center;
    align-items: center;
}
/*
#corform {
  width: 300px;
  height: 200px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  background-color: white;
  padding: 10px;
	border: 1px solid black;
}
*/
#cadastrese {
	color: blue;
	font-size: 10px;
}

#erromensagem {
	border: 1px solid;
	background-color: #ffef8a;
	padding: 5px;
}
</style>
<head>
  <title>Login</title>
  <meta charset = "utf-8">
</head>


<body>

  <div id="corpo">

<!--	<div id="cadastrologin"><a href='paginacadastro.php'>Cadastro</a> <a href='paginlogin.php'>Login</a></div> -->


  <div id="divtítulo"> <h1 id='Título'> LOGIN </h1>

		<?php if ($erro != null) { ?>
			<div id='erromensagem'>
					<p>Erro: <?= $erro ?> </p>
			</div>
		<?php } ?>
  </div>

  <div id="formulario">
    <div id="corform">
		<form method="POST" action="entrar.php">
				<label>E-mail: <input name="email" type="email" required placeholder="example@example.net"/></label><br><br>
				<label> Senha: <input name="senha" type="password" required minlength="6" maxlength="12" placeholder="******"/></label>
        <br><br>
			<input type="submit" value="Entrar"/>
				<br><br>	<a href='paginacadastro.php' id='cadastrese'>Cadastre-se</a>
		</form>

  </div>
  </div>

  </div>
</body>
</html>
