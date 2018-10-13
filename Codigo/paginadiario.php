<?php
require_once ('funções.php');

session_start();
$email = $_SESSION['emailUsuarioLogado'];

if (array_key_exists('emailUsuarioLogado', $_SESSION) == false)
{
	$_SESSION['erroLogin'] = "Identifique-se para acessar o perfil";
	header('location: paginalogin.php');
}

//$fmt = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);

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
	position:relative;
	top:50%;
	left:50%;
	margin-left:-100px;
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
	padding-bottom: 10px;
	margin: 0px;
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
	height: 40px;
	background-color: white;

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
	height: 600px;
	font-family:Courier;
	font-size:20px;
	line-height: 30px;
	padding-top: 3px;
	padding-left:130px;
	padding-right:10px;
	background-image:url(../fundos/lines.png), url(https://static.tumblr.com/maopbtg/nBUmgtogx/paper.png);
	background-repeat: repeat-y, repeat;
	border-top:1px solid #FFF;
	border-bottom:1px solid #FFF;
}
</style>

<head>
  <title>Diário</title>
  <meta charset = "utf-8">
</head>

<body>

	<div id = "menufixo"> ola aaaaa</div>

  <div id="corpo">

  <div id="divtítulo"> <img id = "logo" src="../logo/logo_allforone.png" > </div>

	<p>Olá, <?php
      		$nome = BuscaNome($email);
      		echo $nome['nomePróprio'];
      		?>! <br>
			Como foi seu dia hoje? <br>
			Fique a vontade para expressar, aqui, todos os seus sentimentos! <br>
			Lembre-se: nenhum outro usuário terá acesso ao que você escrever.	<br>
	</p>

	<form>
		<label>Data: <input class="input" name="data_diario" type="date" required/></label> <br/> <br>
		<textarea id="text" name="registrodiario" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; "></textarea>
	</form>





	</div>
</body>
</html>
