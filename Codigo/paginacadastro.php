<!DOCTYPE html>
<html>
<style>

body {
	background-image: url('fundos/fundoprinc.jpg');
}

#Título {
  font-family: Freestyle Script;
  font-size: 90px;
  text-align: center;
  padding: 0px;
  -webkit-margin-after: 15px;
}

#corpo {
  background-color: #fff7b4;
  margin: auto;
  width: 880px;
  padding: 10px;
}

#divtítulo {
  background-color:#ffeb3b;
}


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
		padding: 30px;
		width: auto;
		display: flex;
		flex-direction: row;
    justify-content: center;
    align-items: center
}
</style>
<head>
  <title>Página Inicial</title>
  <meta charset = "utf-8">
</head>


<body>

  <div id="corpo">
	<div id="cadastrologin"><a href="cadastramento.php">Cadastro</a> <a href="login.php">Login</a></div>

  <div id="divtítulo"> <h1 id='Título'> all for one </h1>

  <div id= "divmenu">
	<ul>
	<li><a href='htmlprincipal.html'>HOME</a></li> |
	<li><a href='diario.html'>DIÁRIO</a></li> |
	<li><a href='humor.html'>HUMOR</a></li>
	</ul>
  </div>

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
