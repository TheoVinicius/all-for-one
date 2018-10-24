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
	/*background-image: url('../fundos/fundo.jpg');*/
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

	<script>
	function selecionaHumor(turno, humor) {
			document.getElementById('humor_' + turno + '_' + humor).src = "../emojis/" + humor + "_selecionado.png";

			if (humor == 'feliz') {
				document.getElementById('humor_' + turno).value = 1;
				document.getElementById('humor_' + turno + '_triste').src = "../emojis/triste.png";
				document.getElementById('humor_' + turno + '_indiferente').src = "../emojis/indiferente.png";
				document.getElementById('humor_' + turno + '_raiva').src = "../emojis/raiva.png";
			}
			else if (humor == 'triste') {
				document.getElementById('humor_' + turno).value = 2;
				document.getElementById('humor_' + turno + '_feliz').src = "../emojis/feliz.png";
				document.getElementById('humor_' + turno + '_indiferente').src = "../emojis/indiferente.png";
				document.getElementById('humor_' + turno + '_raiva').src = "../emojis/raiva.png";
			}
			else if (humor == 'indiferente') {
				document.getElementById('humor_' + turno).value = 3;
				document.getElementById('humor_' + turno + '_feliz').src = "../emojis/feliz.png";
				document.getElementById('humor_' + turno + '_triste').src = "../emojis/triste.png";
				document.getElementById('humor_' + turno + '_raiva').src = "../emojis/raiva.png";
			}
			else if (humor == 'raiva') {
				document.getElementById('humor_' + turno).value = 4;
				document.getElementById('humor_' + turno + '_feliz').src = "../emojis/feliz.png";
				document.getElementById('humor_' + turno + '_indiferente').src = "../emojis/indiferente.png";
				document.getElementById('humor_' + turno + '_triste').src = "../emojis/triste.png";
			}
	}
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
       <image id="humor_manha_feliz" onclick="selecionaHumor('manha', 'feliz')" src="../emojis/feliz.png"/>
			 <image id="humor_manha_triste" onclick="selecionaHumor('manha', 'triste')"  src="../emojis/triste.png"/>
			 <image id="humor_manha_indiferente" onclick="selecionaHumor('manha', 'indiferente')"  src="../emojis/indiferente.png"/>
			 <image id="humor_manha_raiva" onclick="selecionaHumor('manha', 'raiva')"  src="../emojis/raiva.png"/>
			 <input id="humor_manha" name="humormanha" type="hidden"/>
		 </div>

		 <div class="divhumor">
			 <h2>TARDE</h2>
			<image id="humor_tarde_feliz" onclick="selecionaHumor('tarde', 'feliz')" src="../emojis/feliz.png"/>
			<image id="humor_tarde_triste" onclick="selecionaHumor('tarde', 'triste')"  src="../emojis/triste.png"/>
			<image id="humor_tarde_indiferente" onclick="selecionaHumor('tarde', 'indiferente')"  src="../emojis/indiferente.png"/>
			<image id="humor_tarde_raiva" onclick="selecionaHumor('tarde', 'raiva')"  src="../emojis/raiva.png"/>
			<input id="humor_tarde" name="humortarde" type="hidden"/>
		</div>

		<div class="divhumor">
			<h2>NOITE</h2>
		 <image id="humor_noite_feliz" onclick="selecionaHumor('noite', 'feliz')" src="../emojis/feliz.png"/>
		 <image id="humor_noite_triste" onclick="selecionaHumor('noite', 'triste')"  src="../emojis/triste.png"/>
		 <image id="humor_noite_indiferente" onclick="selecionaHumor('noite', 'indiferente')"  src="../emojis/indiferente.png"/>
		 <image id="humor_noite_raiva" onclick="selecionaHumor('noite', 'raiva')"  src="../emojis/raiva.png"/>
		 <input id="humor_noite" name="humornoite" type="hidden"/>
	 </div>


	 		<input id="botaoenviar" type="submit" value="Enviar"/>
		</form>
	</div>



	</div>
</body>
</html>
