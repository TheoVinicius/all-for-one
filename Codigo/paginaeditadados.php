
<?php

 require_once ('Modelo/tabelausuario.php');

 session_start();

 if (array_key_exists('emailUsuarioLogado', $_SESSION) == false)
 {

 	header('location: paginaperfil.php');
 	exit();
 }
 else
 {
 	$email = $_SESSION['emailUsuarioLogado'];
 	$dados = BuscaDados($email);
  $nomePróprio = $dados['nomePróprio'];
  $sobrenome = $dados['sobrenome'];
  $dataNasc = $dados['datNasc'];
 	$id_usuario = $dados['id_usuario'];

}

if (array_key_exists('erroEdição', $_SESSION))
{
$erros = $_SESSION['erroEdição'];
unset($_SESSION['erroEdição']);
}
else
{
	$erros = null;
}
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
	margin-left: 25%;
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

 h1 {
   text-align: center;
 }
</style>

<head>
  <title>Edição</title>
  <meta charset = "utf-8">

	</script>

	<link rel="shortcut icon" href="../logo/favicon.ico" />
</head>

<body>

	<div id = "menufixo">
		<img id="logo_menufixo" src="../logo/logo_allforone.png">
    <ul class="listamenu">
          <li><img id="img_menufixo" src="../menu fixo/home.png"><a href="paginahome.php">HOME </a></li>|
          <?php
            if(array_key_exists('emailAdmLogado', $_SESSION) == false)	{
          ?>
          <li><img id="img_menufixo" src="../menu fixo/humor.png"><a href="paginahumor.php">HUMOR </a></li>|
          <li><img id="img_menufixo" src="../menu fixo/diario.png"><a href="paginadiario.php">DIÁRIO </a></li>|
					<li><img id="img_menufixo" src="../menu fixo/perfil.png"><a href="paginaperfil.php">PERFIL</a></li>
          	<?php } ?>
          <?php
            if(array_key_exists('emailAdmLogado', $_SESSION) == true)	{
          ?>
					<li><a href="paginacadastroconteudo.php">CADASTRO DE CONTEÚDO</a></li>
				<?php } ?>
    </ul>
		<a class="botao" href="Controlador/sair.php">Sair</a>
	</div>

  <div id="corpo">

  <div id="divtítulo"> <img id = "logo" src="../logo/logo_allforone.png" > </div>


	</div>


</style>



<body>

  <div id="corpo">

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

<h1>Alterar Dados</h1>

	<div id="formulario">
	<form method="POST" action="Controlador/editadados.php">


   	<label>Nome: <input class="input" minlength="3" maxlength="35" name="nomePróprio" type="text" required  value = "<?= $nomePróprio ?>"/></label>
   	<label>Sobrenome: <input class="input" minlength="3" maxlength="35" name="sobrenome" type="text" required value = "<?= $sobrenome?>"/></label> <br/> <br>
    <label>Senha Antiga: <input class="input" minlength="6" maxlength="12" name="senhaantiga" type="password" required/></label> <br><br>
   	<label>Nova Senha: <input class="input" minlength="6" maxlength="12" name="senha" type="password" required/></label>
   	<label>Confirmar senha:<input class="input" minlength="6" maxlength="12" name="confirmaSenha" type="password" required /></label> <br/> <br>
   	<label>Data de nascimento: <input class="input" name="dataNasc" type="date" required value = "<?=$dataNasc?>"/></label> <br/> <br>
	 	<label>Sexo:  <select name="sexo">
       <option value="" disabled>Selecione</option>
       <option value="1">Feminino</option>
       <option value="2">Masculino</option
       <option value="3">Outro</option>
     </select><br><br>

 		<input class="botao" type="submit" value="Alterar"/>
		<br>

 </div>
</div>
</body>
</html>
