<?php

// para barra de menu fixa http://www.tutorialwebdesign.com.br/simples-menu-scroll-fixo-com-jquery/
//view-source:http://www.tutorialwebdesign.com.br/exemplos/menu-scroll-fixo-jquery/


require_once ('Modelo/tabelausuario.php');

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
	$nome_usuario = BuscaNome($email);
}

//$fmt = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);

if (array_key_exists('errodiario', $_SESSION))
{
$erros = $_SESSION['errodiario'];
unset($_SESSION['errodiario']);
}
else
{
	$erros = null;
}


 ?>

<!DOCTYPE html>
<html>

<style>

#logo {
	width:200px;
	height: 200px;
	top:50%;
	left:50%;
	margin-left:-100px;
	position: relative;
}

#corpo {
	margin-top: 60px;
	margin-left: auto;
	margin-right: auto;
  background-color: #ffffff57;
  width: 880px;
  padding: 10px;
	border-left: 1px solid #e4e6e8;
	border-right: 1px solid #e4e6e8;
}

#divtítulo {
	padding: 6px;
	margin: 0px;
	position: relative;
	padding-bottom: 10px;
	border-bottom: 1px solid #e4e6e8;
	margin-left: 26px;
	margin-right: 26px;
	margin-bottom: 6px;
}

.botaosair {
		padding-top: 15px;
		background-color: white;
    border: 1px solid grey;
		border-radius: 4px;
    padding: 6px;
    float: left ;
		color: black;
		margin-left: 350px;
		margin-top: 15px;
}

#menufixo {
	width: auto;
	position: fixed;
	right: 0;
	left: 0;
	top: 0;
	height: 60px;
	background-color: white;
	z-index: 99;
  bottom: 0;
	border-bottom: 1px solid #e4e6e8;
}

.listamenu {
	padding-top: 20px;
	list-style:none;
	margin: 0px;
	margin-left: 20%;
	float: left;
}

.listamenu li {
	display: inline;
}

.listamenu li a {
	padding: 2px 20px;
  display: inline-block;
	color: black;
	text-decoration:none;
}

.listamenu li a:hover{
	color:#black;
	border-bottom: 2px solid #f8e8a2;
}


#img_menufixo {
	width: 17px;
	margin-left: 5px;
}

#logo_menufixo {
	width: 50px;
	height: 50px;
	padding: 5px;
  float: left;
	margin-left: 50px;
}

p {
	text-align: center;
	font-size: Arial;
	font-size: 20px;
}

.input {
	background-color:transparent;
	padding:8px;
	border:none;
	border-bottom:1px solid #ccc;
	width:160px;
	background-origin: inherit;
	margin-left: auto;
	margin-right: auto;
}

#diario {
	width: 750px;
	height: 394px;
	background-image: url(../fundos/papel_pautado_a4.png);
	margin-left: auto;
	margin-right: auto;

}
#text {
	width:700px;
	height: 500px;
	font-family: cursive;
	font-size:15px;
	line-height: 30px;
	padding-top: 3px;
	padding-left:130px;
	padding-right:10px;
	background-image:url(../fundos/lines.png), url(https://static.tumblr.com/maopbtg/nBUmgtogx/paper.png);
	background-repeat: repeat-y, repeat;
	border-top:1px solid #FFF;
	border-bottom:1px solid #FFF;
	overflow: hidden;
	word-wrap: break-word;
	resize: none;
}

#formulario {
	width: auto;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
}

.botao {
		background-color: #f8e8a2;
    border: 1px solid black;
		border-radius: 4px;
    padding: 5px;
    text-align: center;
    display: inline-block;
    font-size: 15px;
		margin-left: 45%;
}

#erromensagem {
	border: 1px solid;
	background-color: #ffef8a;
	padding: 5px;
}
</style>

<head>
  <title>Diário</title>
  <meta charset = "utf-8">

	<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous">

	</script>

	<link rel="shortcut icon" href="../logo/favicon.ico" />
</head>

<body>

	<div id = "menufixo">
		<img id="logo_menufixo" src="../logo/logo_allforone.png">
		<ul class="listamenu">
					<li><img id="img_menufixo" src="../menu fixo/home.png"><a href="paginahome.php">HOME </a></li>|
					<li><img id="img_menufixo" src="../menu fixo/humor.png"><a href="paginahumor.php">HUMOR </a></li>|
					<li><img id="img_menufixo" src="../menu fixo/diario.png"><a href="paginadiario.php">DIÁRIO </a></li>|
					<li><img id="img_menufixo" src="../menu fixo/perfil.png"><a href="paginaperfil.php">PERFIL</a></li>
		</ul>
		<a class="botaosair" href="Controlador/sair.php">Sair</a>
	</div>

  <div id="corpo">

  <div id="divtítulo"> <img id = "logo" src="../logo/logo_allforone.png" > </div>

	<p>Olá, <?php
      		echo $nome_usuario;
      		?>! <br>
			Como foi seu dia hoje? <br>
			Fique a vontade para expressar, aqui, todos os seus sentimentos! <br>
			Lembre-se: nenhum outro usuário terá acesso ao que você escrever.	<br>
	</p>

	<?php if ($erros != null) { ?>
		<div id='erromensagem'>
				<p>Erro:
					<?php foreach($erros as $erro)
						{
						echo $erro;
						} ?>
				</p>
		</div>
	<?php } ?>

	<div id="formulario">
	<form method="POST" action="Controlador/salvadiario.php">
		<label>Data: <input class="input" name="data_diario" type="date" required/></label> <br/> <br>
		<textarea id="text" name="registrodiario" ></textarea> <br> <br>
		<input class="botao" type="submit" value="Salvar"/>
	</form>
	</div>



	</div>
</body>
</html>
