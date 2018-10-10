<!DOCTYPE html>
<html>
<style>

body {
	background-image: url('../fundos/fundoprinc.jpg');
}

#Título {
  font-family: Freestyle Script;
  font-size: 90px;
  text-align: center;
  padding: 0px;
  -webkit-margin-after: 15px;
}
#corpo {
  background-color: #ffffffdb;
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

#titulo_cabeçalho {
  font-family: Freestyle Script;
  font-size: 40px;
  margin-top: 1px;
}


a:-webkit-any-link {
    color: black;
    cursor: pointer;
    text-decoration: none;
}


/*botão do menu fixo*/

.botao_cabeçalho {
	 background-color :#ffeb3b;
	 color : black;
	 padding: 20px;
	 font-size: 20px;
	 border: px;
	 margin-left: 200px;


		}

	.botao_cabeçalho {
		position: fixed;
		display: inline;

	}


	.divbotao_cabeçalho-content {
		display: none;
		position: absolute;
		background-color: lightgrey;
		min-width: 150px;
		z-index: 1;

	}


		.divbotao_cabeçalho-content a {
			color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: inline-flex;
		width: 2000px;

	}

	.divbotao_cabeçalho-content a:hover {
	background-color: #ebec8f;
	}

	.divbotao_cabeçalho:hover   .divbotao_cabeçalho-content {
	display:block;
	}

	.divbotao_cabeçalho:hover   .botao_cabeçalho {
	background-color: gray;
	}

</style>
</head>


<div class= "divbotao_cabeçalho">
<button class="botao_cabeçalho">all for onde</button>
<div class="divbotao_cabeçalho-content">


<a href="paginahumor.php">HUMOR</a>
<a href="paginadiario.php">DIÁRIO</a>
<a href="paginahome.php">HOME</a>


</div>
</div>

</style>
</head>



<head>
  <title>Página Inicial</title>
  <meta charset = "utf-8">
</head>

<body>
  <div id="cabeçalho">
    <p id="titulo_cabeçalho"></p>
  <div id="corpo">

  <div id="divtítulo"> <h1 id='Título'> all for onde</h1>
  <div id= "divmenu">

</div>
</div>
 <br>
 <br><br><br><br>
</body>
</html>
