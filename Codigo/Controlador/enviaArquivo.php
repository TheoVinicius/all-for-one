<?php

require_once('../Modelo/tabelacategoria.php');
require_once('../Modelo/tabelaadm.php');

session_start();

if (array_key_exists('emailAdmLogado', $_SESSION))
{
  $username = $_SESSION['emailAdmLogado'];
	$id_adm = BuscaAdmPorId($username);
}
else
{
	$_SESSION['errologin'] = 'Identifique-se para poder carregar um arquivo';
	header('Location: ../loginadm.php');
	exit();
}

$erro = [];
$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
							$request,
							[ 'data_postagem' => FILTER_DEFAULT,
                'categoria' => FILTER_DEFAULT  ]
              );

$data_postagem = $request['data_postagem'];
if ($data_postagem == false)
{
	$erro[] = "Data da Postagem nao foi informado ou é invalido"
}

$categoria = $request['categoria'];
if ($categoria == false)
{
	$erro[] = "Categoria nao foi informado ou é invalido"
}
else
{
  $id_categoria = BuscaIdCategoria($categoria);
}

if (array_key_exists('arquivo_postagem', $_FILES) == false)
{
$erro[]= "arquivo nao informado";
}
else if ($erro == null)
{
	$arquivo_postagem = $_FILES['arquivo_postagem'];

  $pasta= "../Carregamentos/$categoria/" ;
  mkdir("../$pasta");

  $nomeOrig = basename($arquivo_postagem['name']);

	if ($arquivo_postagem['error'] != UPLOAD_ERR_OK)
	{
		$erro[]= "erro ao carregar o arquivo";
	}
	else if ( move_uploaded_file($arquivo_postagem['tmp_name'],	"../$pasta/$nomeOrig") == false)
  {
    $erro[] = "Erro ao salvar arquivo";
  }
}

if ($erro == null)
{
  $bd = new PDO('mysql:host=localhost;dbname=tcc-jambd;charset=utf8', 'tcc-jambd', 'jambdtcc');

   $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $insert = $bd->prepare(
    'INSERT INTO postagem (id_adm, data_postagem, id_categoria, arquivo_postagem)
     VALUES (:id_adm, :data_postagem, :id_categoria, arquivo_postagem)'
  );

  $insert->bindValue(':id_adm', $id_adm);
  $insert->bindValue(':data_postagem', $data_postagem);
  $insert->bindValue(':id_categoria', $id_categoria);
  $insert->bindValue(':arquivo_postagem', "$pasta/$nomeOrig");


  $insert -> execute();

  session_start();
  header('location: ../pagiancadastroconteudo.php');

}
else
{
	$_SESSION['erroCarregamento'] = $erro;
  	header('location: ../paginacadastroconteudo.php');
}


?>
