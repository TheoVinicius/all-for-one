<?php

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

if (array_key_exists('errohumor', $_SESSION))
{
$erros = $_SESSION['errohumor'];
unset($_SESSION['errohumor']);
}
else
{
	$erros = null;
}


 ?>

<!DOCTYPE html>
<html>

<style>

body {
	background-image: url('../fundos/fundo.jpg');
	background-size: cover;
	background-repeat: no-repeat;
}

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

.botao {
		padding-top: 15px;
		background-color: white;
    border: 1px solid grey;
		border-radius: 4px;
    padding: 6px;
    float: left ;
		color: black;
		margin-left: 50px;
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
	border-bottom: 2px solid blue;
}

.listamenu li a:active{
	color:#black;
	border-bottom: 2px solid #2f3975;
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


#formulario {
	width: auto;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
}

#erromensagem {
	border: 1px solid;
	background-color: #ffef8a;
	padding: 5px;
}

.botao_sentimento {
	border: none;
  width: 40px;
  height: 40px;
	border-radius: 60px;
	margin: 20px;
	padding: 0px;
}

#botao_feliz {
	background-image: url('../emojis/feliz.png');
}

#botao_triste {
	background-image: url('../emojis/triste.png');
}

#botao_indiferente {
	background-image: url('../emojis/indiferente.png');
}

#botao_raiva {
	background-image: url('../emojis/raiva.png');
}

.divhumor {
	border: 1px solid #e4e6e8;
	padding: 10px;
	margin: 10px;
}

h2 {
	text-align: center;
}

#botaoenviar {
		background-color: white;
    border: 1px solid grey;
		border-radius: 4px;
    padding: 6px;
		margin-left: 45%;
    float: left ;
    margin-top: 15px;
}



</style>

<head>
  <title>Humor</title>
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
		<a class="botao" href="Controlador/sair.php">Sair</a>
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
		<form method="POST" action="Controlador/salvahumor.php">
			<label>Data: <input class="input" name="data_humor" type="date" required/></label> <br/> <br>
			<div class="divhumor">
				<h2>MANHÃ</h2>
       <input type="button" name="humormanha" value="1" id="botao_feliz" class="botao_sentimento">
			 <input type="button" name="humormanha" value="2" id="botao_triste" class="botao_sentimento">
			 <input type="button" name="humormanha" value="3" id="botao_indiferente" class="botao_sentimento">
			 <input type="button" name="humormanha" value="4" id="botao_raiva" class="botao_sentimento">
		 </div>

		 <div class="divhumor">
			 <h2>TARDE</h2>
			<input type="button" name="humortarde" value="1" id="botao_feliz" class="botao_sentimento">
			<input type="button" name="humortarde" value="2" id="botao_triste" class="botao_sentimento">
			<input type="button" name="humortarde" value="3" id="botao_indiferente" class="botao_sentimento">
			<input type="button" name="humortarde" value="4" id="botao_raiva" class="botao_sentimento">
		</div>

		<div class="divhumor">
			<h2>NOITE</h2>
		 <input type="button" name="humortarde" value="1" id="botao_feliz" class="botao_sentimento">
		 <input type="button" name="humortarde" value="2" id="botao_triste" class="botao_sentimento">
		 <input type="button" name="humortarde" value="3" id="botao_indiferente" class="botao_sentimento">
		 <input type="button" name="humortarde" value="4" id="botao_raiva" class="botao_sentimento">
	 </div>
	 		<input id="botaoenviar" type="submit" value="Enviar"/>
		</form>
	</div>



	</div>
</body>
</html>
