<?php

require_once ('Modelo/tabelausuario.php');
require_once ('Modelo/tabeladiario.php');
require_once ('Modelo/tabelahumor.php');

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
	$dados = BuscaDados($email);
	$id_usuario = $dados['id_usuario'];

	$diario = BuscaÚltimoRegistro($id_usuario);
	$humor = BuscaÚltimoHumor($id_usuario);
}

//$fmt = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);


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

.botao {
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

h2 {

	font-size: 40px;
	margin-top: 0px;
	text-align: center;
}
 strong {

	font-size: 20px;
}

#dados {
	border-bottom:1px solid #e4e6e8;
	padding-bottom: 10px;
	margin: 10px;
	width: 600px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 20px;
}

.botao_alterar {
		background-color: white;
    border: 1px solid grey;
		border-radius: 4px;
    padding: 6px;
		color: black;
		margin-left: 45%;

}

#div_historico {

	padding: 10px;
	margin: 10px;
	width: 600px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 20px;
}


</style>

<head>
  <title>Perfil</title>
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

	<div id='dados'>
	<u><h2>DADOS</h2></u>
	<strong>NOME:</strong> &nbsp; <?= $dados['nomePróprio'] ?>  &nbsp; <?= $dados['sobrenome'] ?><br><br>
	<strong>DATA DE NASCIMENTO:</strong>&nbsp; <?= $dados['datNasc'] ?><br><br>
	  <strong>SEXO:</strong> &nbsp; <?php
									if ($dados['sexo'] == 1)
									{
										echo "Feminino";
									}
									else if ($dados['sexo'] == 2)
									{
										echo "Masculino";
									}
									else if ($dados['sexo'] == 3)
									{
										echo "Outro";
									}
								 ?><br><br>
	  <strong>EMAIL:</strong> &nbsp; <?= $dados['email'] ?><br><br>
	  <strong>AMIGO:</strong>&nbsp; <?= $dados['amigo'] ?><br><br>

				<p><a class='botao_alterar' href="alteradados.php">Alterar</a></p>
	</div>

	<div id='div_historico'>
	<u><h2>DIÁRIO</h2></u>
	<strong>DATA:</strong> &nbsp; <?= $diario['data_diario'] ?><br><br>
	<strong>REGISTRO:</strong> &nbsp; <?= $diario['registrodiario'] ?><br><br>

	</div>

	<div id='div_historico'>
  <u><h2>HUMOR</h2></u>
  <strong>DATA:</strong> &nbsp; <?= $humor['data_humor'] ?><br><br>
  <strong>HUMOR DA MANHÃ:</strong> &nbsp; <?php if($humor['humormanha'] == 1)
																					{
																						echo "<img src='../emojis/feliz_selecionado.png' />";
																					}
																					else if ($humor['humormanha'] == 2)
																					{
																						echo "<img src='../emojis/triste_selecionado.png' />";
																					}
																					else if ($humor['humormanha'] == 3)
																					{
																						echo "<img src='../emojis/indiferente_selecionado.png' />";
																					}
																					else if ($humor['humormanha'] == 4)
																					{
																						echo "<img src='../emojis/raiva_selecionado.png' />";
																					}
																		?><br><br>
	<strong>HUMOR DA TARDE:</strong> &nbsp; <?php if($humor['humortarde'] == 1)
																					{
																						echo "<img src='../emojis/feliz_selecionado.png' />";
																					}
																					else if ($humor['humortarde'] == 2)
																					{
																						echo "<img src='../emojis/triste_selecionado.png' />";
																					}
																					else if ($humor['humortarde'] == 3)
																					{
																						echo "<img src='../emojis/indiferente_selecionado.png' />";
																					}
																					else if ($humor['humortarde'] == 4)
																					{
																						echo "<img src='../emojis/raiva_selecionado.png' />";
																					}
																		?><br><br>
	<strong>HUMOR DA NOITE:</strong> &nbsp; <?php if($humor['humornoite'] == 1)
																					{
																						echo "<img src='../emojis/feliz_selecionado.png' />";
																					}
																					else if ($humor['humornoite'] == 2)
																					{
																						echo "<img src='../emojis/triste_selecionado.png' />";
																					}
																					else if ($humor['humornoite'] == 3)
																					{
																						echo "<img src='../emojis/indiferente_selecionado.png' />";
																					}
																					else if ($humor['humornoite'] == 4)
																					{
																						echo "<img src='../emojis/raiva_selecionado.png' />";
																					}
																		?><br><br>
	<a class='botao_alterar' href="paginahistorico.php">Histórico</a>
  </div>



	</div>
</body>
</html>
