<?php

require_once ('Modelo/tabelausuario.php');
require_once ('Modelo/tabelaadm.php');

session_start();

if (array_key_exists('emailAdmLogado', $_SESSION) == false)
{
	$_SESSION['erroLogin'] = "Identifique-se para acessar a administração";
	header('location: paginaloginadm.php');
	exit();
}

if (array_key_exists('emailUsuarioLogado', $_SESSION) == true)
{
	header('location: paginahome.php');
	exit();
}

if (array_key_exists('erroCarregamento', $_SESSION))
{
$errocarregamento = $_SESSION['erroCarregamento'];
unset($_SESSION['erroCarregamento']);
}
else
{
	$errocarregamento = null;
}

if (array_key_exists('errocategoria', $_SESSION))
{
$errocategoria = $_SESSION['errocategoria'];
unset($_SESSION['errocategoria']);
}
else
{
	$errocategoria = null;
}

$data = new DateTime();

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



</style>

<head>
  <title>Home</title>

  <meta charset = "utf-8">

	<link rel="shortcut icon" href="../logo/favicon.ico" />
</head>

<body>

	<div id = "menufixo">
		<img id="logo_menufixo" src="../logo/logo_allforone.png">
    <ul class="listamenu">
          <li><img id="img_menufixo" src="../menu fixo/home.png"><a href="paginahome.php">HOME </a></li>|
					<li><a href="paginacadastroconteudo.php">CADASTRO DE CONTEÚDO</a></li>|
					<li><a href="paginacadastroadm.php">NOVO ADM</a></li>
    </ul>
		<a class="botao" href="Controlador/sair.php">Sair</a>
	</div>

  <div id="corpo">

  <div id="divtítulo"> <img id = "logo" src="../logo/logo_allforone.png" > </div>
<h2>Carregamento de Arquivos</h2>
	<?php if ($errocarregamento != null) { ?>
		<div id='erromensagem'>
				<p>Erro:
					<?php foreach($errocarregamento as $erroc)
						{
						echo $erroc;
						} ?>
				</p>
		</div>
	<?php } ?>

	<div id="formulario">
	<form method="POST" action="Controlador/enviaArquivo.php" enctype="multipart/form-data" >

			<input name="id_adm" type="hidden" value="<?= $id_adm ?>">

			<label>Data: <input class="input" name="data_postagem" type="date" value="<?= $data->format('Y-m-d') ?>" required/></label> <br/> <br>

			<label>Categoria: <input class="input" name="categoria" type="text" required/></label> <br/> <br>

	  	<input name="arquivo_postagem" type="file">

			<input type="submit" value="Enviar">
	</form>
	</div>

<br><br><br><br><br>

<h2>Salvamento de Categoria</h2>

<?php if ($errocategoria!= null) { ?>
	<div id='erromensagem'>
			<p>Erro:
				<?php foreach($errocategoria as $erro)
					{
					echo $erro;
					} ?>
			</p>
	</div>

<?php } ?>
<div id="formulario">
	<form method="POST" action="Controlador/salvacategoria.php" enctype="multipart/form-data">
     <label>Categoria: <input class="input" name="categoria" type="text" required/></label> <br/> <br>
		 	<input type="submit" value="Enviar">
	</form>
</div>

</body>
</html>
