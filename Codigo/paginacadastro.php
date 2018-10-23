<?php
session_start();
if (array_key_exists('errocadastro', $_SESSION))
{
$erros = $_SESSION['errocadastro'];
unset($_SESSION['errocadastro']);
}
else
{
	$erros = null;
}
?>
<!DOCTYPE html>
<html>
<style>

#input-email {
	width: 300px;
}

.input {
	padding:8px;
	border:none;
	border-bottom:1px solid #ccc;
	width:160px;
}

body {
	background-image: url('../fundos/fundo.jpg');
	background-size: cover;
	background-repeat: no-repeat;
}

#titulo {
  font-family: fantasy;
  font-size: 50px;
  text-align: center;
  padding: 0px;
  -webkit-margin-after: 15px;
	border: none;
	border-radius: 0;
	border-top: 1px ;
	border-bottom: 1px ;
	min-height: 44px;

}

#corpo {


   margin: auto;
  width: 400px;
  padding-top: 10px;
	padding-bottom: 15px;
	margin: 0px;
  border-bottom: 1px solid #e4e6e8;
	margin-left: 26px;
	margin-right: 26px;
}


#logo {
	width:60px;
	height: 60px;
	position:relative;
	top:50%;
	left:50%;
	margin-left:-30px;
}

#corpo {
  margin: auto;
  width: 700px;
  background: #fff;
  border: 400px;
  margin-top: 30px;
  padding-top: 10px;
	border-radius: 10px;
	border: 1px solid black;
}

#divtítulo {
  background-color:white;
	margin: 10px;
}


#cadastrologin {
	 float: right;
}

#cadastrologin a {
		padding: 4px;
}

#cadastrologin a:hover {
    color: #ff9600;
    border-bottom:3px solid #f3b205;
}

#cadastrologin a:-webkit-any-link {
    color: black;
    cursor: pointer;
    text-decoration: none;
}

#formulario {
    font-family: Arial;
    font-size: 15px;
		padding: 30px;
		width: auto;
		display: flex;
		flex-direction: row;
    justify-content: center;
    align-items: center;
		border: 1px;

}

 #erromensagem {
	 border: 1px solid;
	 background-color: #ffef8a;
	 padding: 5px;
 }

 .loguese {
 	font-size: 10px;
 	margin-left: auto;
 	margin-right: auto;
 	text-align: center;
 }

 #linklogin {
 	color: blue;
 }

 .botao {
 		background-color: white;
     border: 1px solid black;
 	  	border-radius: 4px;
     padding: 5px;
     text-align: center;
     display: inline-block;
     font-size: 15px;
 		margin-left: 43%;
 }
</style>
<head>
  <title>Cadastramento</title>
  <meta charset = "utf-8">
	<link rel="shortcut icon" href="../logo/favicon.ico" />
</head>


<body>

  <div id="corpo">


		<div id="divtítulo">
			<img src="../logo/logo_allforone.png" align= "center" id="logo">
			<p id="titulo">CADASTRO</p>
		</div>


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
	<form method="POST" action="Controlador/cadastrousuario.php">
   	<label>Nome: <input class="input" minlength="3" maxlength="35" name="nomePróprio" type="text" required/></label>
   	<label>Sobrenome: <input class="input" minlength="3" maxlength="35" name="sobrenome" type="text" required/></label> <br/> <br>
   	<label>E-mail: <input id="input-email" class="input" name="email" type="email" required/> <br/></label> <br>
   	<label>Senha: <input class="input" minlength="6" maxlength="12" name="senha" type="password"/></label>
   	<label>Confirmar senha:<input class="input" minlength="6" maxlength="12" name="confirmaSenha" type="password"/></label> <br/> <br>
   	<label>Data de nascimento: <input class="input" name="dataNasc" type="date" required/></label> <br/> <br>
	 	<label>Sexo:  <select name="sexo">
       <option value="" disabled>Selecione</option>
       <option value="1">Feminino</option>
       <option value="2">Masculino</option>
       <option value="3">Outro</option>
     </select><br><br>
	 	<label>Informe o nome de um amigo: <input class="input" minlength="3" maxlength="35" name="amigo" type="text" required/> <br/></label> <br><br>

 		<input class="botao" type="submit" value="Cadastrar"/>
		<br>
		<p class= "loguese"> Já possui uma conta? <a href='paginalogin.php' id='linklogin'> Login </a> </p>
 </div>
</div>
</body>
</html>
