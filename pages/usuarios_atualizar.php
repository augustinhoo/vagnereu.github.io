<?php 
	require_once('../classes/db.class.php');
	$codigo = intval($_GET['cod']);

	$nome 	  = $_POST['nome'];
	$login    = $_POST['login'];
	$senha    = md5($_POST['senha']);
	$perfil   = $_POST['perfil'];
	$situacao = $_POST['situacao'];

	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$sql = "UPDATE usuarios SET
			nome 	 = '$nome',
			login 	 = '$login',
			senha 	 = '$senha',
			perfil   = '$perfil',
			situacao = '$situacao'
			WHERE cod_usuario = '$codigo'";
			
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/usuarios_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}

 ?>
