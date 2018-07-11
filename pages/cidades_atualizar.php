<?php 
	require_once('../classes/db.class.php');
	$codigo = intval($_GET['cod']);

	$nome 	  = $_POST['nome'];
	$uf    = $_POST['uf'];
	$estado = $_POST['estado'];

	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$sql = "UPDATE cidades SET
			nome 	 = '$nome',
			uf 	 = '$uf',
			estado 	 = '$estado'
			WHERE cod_cidade = '$codigo'";
			
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/cidades_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}

 ?>
