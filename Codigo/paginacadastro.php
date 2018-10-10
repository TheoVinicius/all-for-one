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

body {
	background-image: url('../fundos/fundoprinc.jpg');
}

#Título {
  font-family: fantasy;
  font-size: 70px;
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
  background: #fff;
  border: 400px;
  margin-top: 200px;
  padding-top: 10px;
	border-radius: 10px;
	border: 1px solid black;
}

#divtítulo {
  background-color:white;
	margin: 10px;
}

/*
#divmenu {
	font-size: 25px;
	margin: auto;
	width: 880px;
	padding: 0px;
	text-align: center;
}

#divmenu ul{
  padding:0px;
  margin:0px;
  list-style:none;
}

#divmenu ul li {
	display: inline;
}

#divmenu ul li a {
  padding: 2px 10px;
  display: inline-block;
}

#divmenu ul li a:hover {
    color: #ff9600;
    border-bottom:3px solid #f3b205;
}


a:-webkit-any-link {
    color: black;
    cursor: pointer;
    text-decoration: none;
}
*/

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
		font-family: fantasy;
		font-size: 20px;
		padding: 30px;
		width: auto;
		display: flex;
		flex-direction: row;
    justify-content: center;
    align-items: center;
		border: 1px;
}

/*#corform {
  width: 800px;
  height: 300px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  background-color: white;
  padding: 10px;
}
*/
 #erromensagem {
	 border: 1px solid;
	 background-color: #ffef8a;
	 padding: 5px;
 }
</style>
<head>
  <title>Cadastramento</title>
  <meta charset = "utf-8">
</head>


<body>

  <div id="corpo">


  <div id="divtítulo"> <h1 id='Título'> CADASTRO </h1>

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

<!--  <div id= "divmenu">
	<ul>
	<li><a href='home.html'>HOME</a></li> |
	<li><a href='diario.html'>DIÁRIO</a></li> |
	<li><a href='humor.html'>HUMOR</a></li>
	</ul>
  </div>
-->

  </div>

	<div id="formulario">
	<form method="POST" action="cadastrousuario.php">
   <label>Nome: <input minlength="3" maxlength="35" name="nomePróprio" type="text" required/></label>
   <label>Sobrenome: <input minlength="3" maxlength="35" name="sobrenome" type="text" required/></label> <br/> <br>
   <label>E-mail: <input name="email" type="email" required/> <br/></label> <br>
   <label>Senha: <input minlength="6" maxlength="12" name="senha" type="password"/></label>
   <label>Confirmar senha:<input minlength="6" maxlength="12" name="confirmaSenha" type="password"/></label> <br/> <br>
   <label>Data de nascimento: <input name="dataNasc" type="date" required/></label> <br/> <br>
	 <label>Sexo:  <select name="sexo">
       <option value="" disabled>Selecione</option>
       <option value="1">Feminino</option>
       <option value="2">Masculino</option>
       <option value="3">Outro</option>
     </select><br><br>
	 <label>Informe o nome de um amigo: <input minlength="3" maxlength="35" name="amigo" type="text" required/> <br/></label> <br><br>

	 <input type="submit" value="Cadastrar"/>
 </div>

</div>
</body>
</html>
