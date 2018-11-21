<?php
session_start();
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

.img_fofa {
  height: 150px;
  margin: 5px;
}

.divhome {
  margin-left: auto;
  margin-right: auto;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center

}

h1 {
  text-align: center;
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
          <?php
            if(array_key_exists('emailAdmLogado', $_SESSION) == false)	{
          ?>
          <li><img id="img_menufixo" src="../menu fixo/humor.png"><a href="paginahumor.php">HUMOR </a></li>|
          <li><img id="img_menufixo" src="../menu fixo/diario.png"><a href="paginadiario.php">DIÁRIO </a></li>|
					<li><img id="img_menufixo" src="../menu fixo/perfil.png"><a href="paginaperfil.php">PERFIL</a></li>
          	<?php } ?>
          <?php
            if(array_key_exists('emailAdmLogado', $_SESSION) == true)	{    ?>
					<li><a href="paginacadastroconteudo.php">CADASTRO DE CONTEÚDO</a></li> |
          <li><a href="paginacadastroadm.php">NOVO ADM</a></li>
				<?php } ?>

    </ul>

  <?php  if(array_key_exists('emailUsuarioLogado', $_SESSION) == true || array_key_exists('emailAdmLogado', $_SESSION) == true) { ?>
		<a class="botao" href="Controlador/sair.php">Sair</a>
  <?php }
    else if (array_key_exists('emailUsuarioLogado', $_SESSION) == false || array_key_exists('emailAdmLogado', $_SESSION) == false ){
   ?>
   <a class="botao" href="paginalogin.php">Login</a>
   <a class="botao" href="paginacadastro.php">Cadastro</a>
   <?php } ?>

	</div>

  <div id="corpo">

  <div id="divtítulo"> <img id = "logo" src="../logo/logo_allforone.png" > </div>
<div class="divhome">
  <img id="frase_diaria" src="../Carregamentos/feliz/no_fim_tudo_da_certo.jpg">
	</div>

<div class="divhome">
  <h1>Que tal assistir um vídeo?<h1>
    <video height="300" controls>
      <source src="../Carregamentos/videos/Cópia de Mude - Vídeo Motivacional.mp4" type="video/mp4">
    </video>
	</div>

    <div class="divhome">
  <h1>Melhore seu dia vendo algumas imagens</h1>
    <img class="img_fofa" src="../Carregamentos/imagens_fofas/1.jpg">
    <img class="img_fofa" src="../Carregamentos/imagens_fofas/2.jpg">
    <img class="img_fofa" src="../Carregamentos/imagens_fofas/3.jpg">
    <img class="img_fofa" src="../Carregamentos/imagens_fofas/4.jpg">
    <img class="img_fofa" src="../Carregamentos/imagens_fofas/5.jpg">
	</div>

</div>

</body>
</html>
