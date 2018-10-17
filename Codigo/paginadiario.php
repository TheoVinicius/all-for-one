<?php










// para barra de menu fixa http://www.tutorialwebdesign.com.br/simples-menu-scroll-fixo-com-jquery/
//view-source:http://www.tutorialwebdesign.com.br/exemplos/menu-scroll-fixo-jquery/




require_once ('funções.php');

session_start();
$email = $_SESSION['emailUsuarioLogado'];

if (array_key_exists('emailUsuarioLogado', $_SESSION) == false)
{
	$_SESSION['erroLogin'] = "Identifique-se para acessar o perfil";
	header('location: paginalogin.php');
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
	height: 40px;
	background-color: white;
	z-index: 99;
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
		background-color: white;
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
	<form method="POST" action="salvadiario.php">
		<label>Data: <input class="input" name="data_diario" type="date" required/></label> <br/> <br>
		<textarea id="text" name="registrodiario" ></textarea> <br> <br>
		<input class="botao" type="submit" value="Salvar"/>
	</form>
	</div>



	</div>
</body>
</html>
