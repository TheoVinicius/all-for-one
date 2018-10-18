<?php

// para barra de menu fixa http://www.tutorialwebdesign.com.br/simples-menu-scroll-fixo-com-jquery/
//view-source:http://www.tutorialwebdesign.com.br/exemplos/menu-scroll-fixo-jquery/


require_once ('tabelausuario.php');

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
	margin-top: 40px;
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

#menufixo {
	width: auto;
	position: fixed;
	right: 0;
	left: 0;
	top: 0;
	height: 50px;
	background-color: white;
	z-index: 99;
  bottom: 0;
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


}
//*#text {
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
}*/

/#formulario {
	width: auto;
	display: flex;
	flex-direction: row;
	justify-content: center;
	align-items: center;
}

.botao {
		background-color: white;
    border: 1px solid grey;
		border-radius: 4px;
    padding: 6px;
		margin-left: 90%;
    float: left ;
    margin-top: 15px;


}

#erromensagem {
	border: 1px solid;
	background-color: #ffef8a;
	padding: 5px;
}

#logo_menufixo {
	width: 50px;
	height: 50px;
	padding: 5px;
	padding-left: 15px;
  float: left;
}

.botao1 {
    width: 40px;
    height: 40px;
		border-radius: 60px;
		margin: 20px;

}

.botao2 {
    width: 40px;
    height: 40px;
    background-image:;
		border-radius: 60px;
		margin: 20px;

}

.botao3 {
    width: 40px;
    height: 40px;

    background-image:;
		border-radius: 60px;
		margin: 20px;
}

.botao4 {
    width: 75px;
    height: 40px;
    background-image:;
		border-radius: 0px;
		margin: 20px;
}
//*parte da barra de menu, daqui para baixo*/

*{margin: 10; padding: 10s;}

body{
font-family: arial, helvetica, sans-serif;
font-size: 12px;
}

.menu{
list-style:none;
border:1px solid #black;
float: inherit;

}

.menu li{
position:relative;
float:left;
border-right:1px solid #c0c0c0;
border-top: 20px;
}

.menu li a{color:#222; text-decoration:none; padding:10px 180px; display: inline;}

.menu li a:hover{
background:#black;
color:#black;
-moz-box-shadow:0 10px 10px 0 #ccc;
-webkit-box-shadow:0 5px 5px 0 #ccc;
text-shadow:5px 5px 5px #ccc;
}

.menu li  ul{
position:absolute;
top:10px;
left:0;
background-color:#ccc;
display:none;
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
		<a class="botao" href="sair.php">Sair</a>
    <nav>
    <ul class="menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">humor</a></li>
          <li><a href="#">diario</a>
    <ul>
  </nav>
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
		<form method="POST" >
       <input type="button" value="feliz" class="botao1">
			 <input type="button" value="triste" class="botao2">
			 <input type="button" value="raiva" class="botao3">
			 <input type="button" value="indiferente" class="botao4">

		</form>
	</div>



	</div>
</body>
</html>
