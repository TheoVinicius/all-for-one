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

	$historico = BuscaHistorico($id_usuario);
}

//$fmt = new NumberFormatter('pt_BR', NumberFormatter::CURRENCY);

 ?>

<!DOCTYPE html>
<html>

<style>

#divsmile {
	margin-left: auto;
	margin-right: auto;
	width: 40px;
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

#dados {
	border: 1px solid #e4e6e8;
	padding: 10px;
	margin: 10px;
	width: 600px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 20px;
}
#data {
	border-bottom: 1px solid #e4e6e8;
	margin: 0px;
}
table {
	border: 2px solid #373435;
	border-collapse: collapse;
	margin-left: auto;
	margin-right: auto;
}
th, td {
		text-align: center;
		border: 2px solid #373435;
		padding: 2px;
		margin-left: auto;
		margin-right: auto;
		width: 120px;
}





</style>

<head>
  <title>Home</title>
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

 	<?php foreach($historico as $h) {?>
		<div id="dados">
			<div id="data"> <h2><strong>DATA:</strong> &nbsp; <?= ($h['data_diario'] != null) ? $h['data_diario'] : $h['data_humor'] ?><br><br> <h2></div>
			<?php if($h['registrodiario'] != null) {?>
			<h2>DIÁRIO</h2>
			<p> <?= $h['registrodiario']?> </p>
			<?php  }
					else
					{ ?>
						<p>Não há registro do diário neste dia.</p>
	  	<?php } ?>

		<?php if($h['humormanha'] != null) {?>

		<h2>HUMOR</h2>
		<table>
			<tr>
	  		<th>Manhã </th>
 				<th> Tarde </th>
				<th>Noite </th>
			</tr>

			<tr>
				<td>
		 <?php if($h['humormanha'] == 1)
		{
		echo "<div id='divsmile'><img src='../emojis/feliz_selecionado.png' /></div>";
		}
		else if ($h['humormanha'] == 2)
		{
		echo "<div id='divsmile'><img src='../emojis/triste_selecionado.png' /></div>";
		}
		else if ($h['humormanha'] == 3)
		{
		echo "<div id='divsmile'><img src='../emojis/indiferente_selecionado.png' /></div>";
		}
		else if ($h['humormanha'] == 4)
		{
		echo "<div id='divsmile'><img src='../emojis/raiva_selecionado.png' /></div>";
	}?></td>

		<td class='yellowcell'>
    <?php if($h['humortarde'] == 1)
		{
		echo "<div id='divsmile'><img src='../emojis/feliz_selecionado.png' /></div>";
		}
		else if ($h['humortarde'] == 2)
		{
		echo "<div id='divsmile'><img src='../emojis/triste_selecionado.png' /></div>";
		}
		else if ($h['humortarde'] == 3)
		{
		echo "<div id='divsmile'><img src='../emojis/indiferente_selecionado.png' /></div>";
		}
		else if ($h['humortarde'] == 4)
		{
		echo "<div id='divsmile'><img src='../emojis/raiva_selecionado.png' /></div>";
		}

		?></td>

		<td>
		<?php if($h['humornoite'] == 1)
		{
		echo "<div id='divsmile'><img src='../emojis/feliz_selecionado.png' /></div>";
		}
		else if ($h['humornoite'] == 2)
		{
		echo "<div id='divsmile'><img src='../emojis/triste_selecionado.png' /></div>";
		}
		else if ($h['humornoite'] == 3)
		{
		echo "<div id='divsmile'><img src='../emojis/indiferente_selecionado.png' /></div>";
		}
		else if ($h['humornoite'] == 4)
		{
		echo "<div id='divsmile'><img src='../emojis/raiva_selecionado.png' /></div>";
		}
		?></td>
	</tr>
		<?php  }
		   		else
	      	{ ?>
		<p>Não há registro do humor neste dia.</p>
		<?php } ?>
	</table>
			</div>

	<?php } ?>

	</div>
</body>
</html>
