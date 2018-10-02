<?php


$erros = [];

$request = array_map('trim', $_REQUEST);

		$request = filter_var_array(
			$request,
			[
				'nomePróprio' => FILTER_DEFAULT,
				'sobrenome' => FILTER_DEFAULT,
        'email' => FILTER_VALIDATE_EMAIL,
        'senha' => FILTER_DEFAULT,
				'confirmaSenha' => FILTER_DEFAULT,
				'dataNasc' => FILTER_DEFAULT,
				'sexo' => FILTER_VALIDATE_INT,
				'amigo' => FILTER_DEFAULT,
			]
);

$nomeProprio = $request['nomePróprio'];

if ($nomeProprio == false)
{
	$erros[]= "O campo nome foi deixado nome em branco ou é inválido";
}
else if (strlen($nomeProprio) < 3 || 35 < strlen($nomeProprio))
{
	$erros[]= "O nome deve ter de 3 a 35 caracteres";
}

$sobrenome = $request['sobrenome'];

if ($sobrenome == false)
{
	$erros[]= "O campo sobrenome foi deixado em branco ou é inválido";
}
else if (strlen($nomeProprio) < 3 || 35 < strlen($nomeProprio))
{
	$erros[]= "O sobrenome deve ter de 3 a 35 caracteres";
}

$Email = $request['email'];

if ($Email == false)
{
	$erros[]= "O campo E-mail foi deixado em branco ou é inválido";
}

$senha = $request['senha'];

if ($senha == false)
{
	$erros[]= "O campo senha foi deixado em branco ou é inválido";
}
else if (strlen($senha) < 6 || 12 < strlen($senha))
{
	$erros[]= "A senha deve ter de 6 a 12 dígitos";
}

$confirmasenha = $request['confirmaSenha'];

if ($senha != $confirmasenha)
{
	$erros[]="a confirmação de senha deve ser igual a senha";
}

$dataNasc = $request['dataNasc'];

$data = DateTime::createFromFormat('Y-m-d', $dataNasc);

if ($data == false)
{
	$erros[]= "O valor da data é inválido";
}
else
{
	$hoje = new DateTime();
	$diferença = $data->diff($hoje);

	$anoscorridos = $diferença->y;
	if ($anoscorridos < 16)
	{
	 $erros[]= "A idade mínima para cadastro é 16 anos";
	}
}

$sexo = $request['sexo'];

if ($sexo =! 1 || $sexo =! 2 || $sexo =! 3)
{
	$erros[]= "O campo sexo foi deixado em branco ou é inválido";
}

$amigo = $request['amigo'];

if ($amigo == false)
{
	$erros[]= "O campo amigo foi deixado nome em branco ou é inválido";
}
else if (strlen($amigo) < 3 || 35 < strlen($amigo))
{
	$erros[]= "O nome do amigo deve ter de 3 a 35 caracteres";
}

if (empty($erros) == false)
{
	foreach($erros as $erro)
	{
		echo $erro;
	}
}
else
{
 $bd = new PDO('mysql:host=localhost;dbname=tcc_jambd;charset=utf8', 'tcc_jambd', 'jambdtcc');

  $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $insert = $bd->prepare(
   'INSERT INTO Contatos (nomePróprio, sobrenome, email, senha, dataNasc, sexo, amigo)
    VALUES (:nomeProprio, :sobrenome, :email, :senha, :dataNasc, :sexo, :amigo)'
 );

 $insert->bindValue(':nomeProprio', $request['nomePróprio']);
 $insert->bindValue(':sobrenome', $request['sobrenome']);
 $insert->bindValue(':senha', $request ['senha']);
 $insert->bindValue(':email',$request['email']);
 $insert->bindValue(':dataNasc', $request['dataNasc']);
 $insert->bindValue('sexo', $request['sexo']);
 $insert->bindValue(':amigo', $request['amigo']);

 $insert -> execute();
}
?>
