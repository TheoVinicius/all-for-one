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




.dropbtn {
	 background-color :#ffeb3b;
	 color : black;
	 padding: 20px;
	 font-size: 20px;
	 border: px;
	 margin-left: 200px;


		}

	.dropbtn {
			position: fixed;
		display: inline;
		width: 2000px;

	}


	.dropdown-content {
		display: none;
		position: absolute;
		background-color: lightgrey;
		min-width: 150px;
		z-index: 1;

	}


		.dropdown-content a {
			color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: inline-flex;
		width: 2000px;

	}

	.dropdown-content a:hover {background-color: #ebec8f;}
	.dropdown:hover   .dropdown-content {display:block;}
	.dropdown:hover   .dropbtn {background-color: gray;}

</style>
</head>


<div class= "dropdown">
<button class="dropbtn">all for onde</button>
<div class="dropdown-content">


<a href="https://mail.google.com">HUMOR</a>
<a href="https://github.com/">DIÁRIO</a>
<a href="https://globoesporte.globo.com">HOME</a>


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
