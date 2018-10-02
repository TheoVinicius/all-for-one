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
  font-family: Freestyle Script;
  font-size: 90px;
  text-align: center;
  padding: 0px;
  -webkit-margin-after: 15px;
}

#corpo {
  background-color: white;
  margin: auto;
  width: 880px;
  padding: 10px;
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

#cadastrologin a:hover {
    color: #ff9600;
    border-bottom:3px solid #f3b205;
}

#cadastrologin a:-webkit-any-link {
    color: black;
    cursor: pointer;
    text-decoration: none;
}

#formulario {
    font-family: Freestyle Script;
    font-size: 25px;
		padding: 30px;
		width: auto;
		display: flex;
		flex-direction: row;
    justify-content: center;
    align-items: center;
}

#corform {
  width: 300px;
  height: 200px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  background-color: white;
  padding: 10px;
}
</style>
<head>
  <title>Login</title>
  <meta charset = "utf-8">
</head>


<body>

  <div id="corpo">
	<div id="cadastrologin"><a href='paginacadastro.php'>Cadastro</a> <a href='paginlogin.php'>Login</a></div>

  <div id="divtítulo"> <h1 id='Título'> all for one </h1>

		<?php if ($erro != null) { ?>
			<div class"alert alert-warning">
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
		</form>
  </div>
  </div>

  </div>
</body>
</html>
