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
		unset($_SESSION['emailAdmLogado']);
		header('location: paginadiario.php');
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>


#titulo {
  font-family: fantasy;
  font-size: 50px;
  text-align: center;
  padding-top: 10px;
	padding-bottom: 15px;
	margin: 0px;
  border-bottom: 1px solid #e4e6e8;
	margin-left: 26px;
	margin-right: 26px;
}

#corpo {
  margin: auto;
  width: 400px;
  background: #fff;
  border: 400px;
  margin-top: 35px;
  padding-top: 10px;
	border-radius: 10px;
	border: 1px solid black
	;
}

#divtítulo {
  background-color:white;
	align-items: center;
}

#logo {
	width:60px;
	height: 60px;
	position:relative;
	top:50%;
	left:50%;
	margin-left:-30px;
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
    font-family: Arial;
    font-size: 15px;
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
.cadastrese {
	font-size: 10px;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}

#linkcadastrese {
	color: blue;
}

.paginahome {
	font-size: 10px;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}

#linkhome {
	color: blue;
}

#erromensagem {
	border: 1px solid;
	background-color: #ffef8a;
	padding: 5px;
}

.botao {
		background-color: #f8e8a2;
    border: 1px solid black;
		border-radius: 4px;
    padding: 5px;
    text-align: center;
    display: inline-block;
    font-size: 15px;
		margin-left: 40%;
}
</style>
<head>
  <title>Login</title>
  <meta charset = "utf-8">
	<link rel="shortcut icon" href="../logo/favicon.ico" />
</head>


<body>

  <div id="corpo">

<!--	<div id="cadastrologin"><a href='paginacadastro.php'>Cadastro</a> <a href='paginlogin.php'>Login</a></div> -->


  <div id="divtítulo">
		<img src="../logo/logo_allforone.png" align= "center" id="logo">
		<p id="titulo">LOGIN</p>
	</div>

		<?php if ($erro != null) { ?>
			<div id='erromensagem'>
					<p>Erro: <?= $erro ?> </p>
			</div>
		<?php } ?>

  <div id="formulario">
		<form method="POST" action="Controlador/entrar.php">
				<label>E-mail: <input  id="input-email" class="w3-input" name="email" type="email" required placeholder="example@example.net"/></label><br><br>
				<label> Senha: <input  class="w3-input" name="senha" type="password" required minlength="6" maxlength="12" placeholder="******"/></label>
        <br><br>
				<input class="botao "type="submit" value="Entrar"/>
				<br>
				<p class= "cadastrese"> Ainda não possui uma conta? <a href='paginacadastro.php' id='linkcadastrese'> Cadastre-se </a> </p>
				<p class= "cadastrese"><a href='paginaloginadm.php' id='linkcadastrese'> Administrador </a> </p>
				<p class= "cadastrese"><a href='paginahome.php' id='paginahome'> Pagina Home </a> </p>
		</form>

  </div>
  </div>

</body>
</html>
