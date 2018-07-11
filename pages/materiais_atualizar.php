<?php 
	require_once('../classes/db.class.php');
	$codigo = intval($_GET['cod']);

	$nome 	  = $_POST['nome'];
	$preco    = $_POST['preco'];
	$situacao = $_POST['situacao'];

	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$sql = "UPDATE materiais SET
			nome 	 = '$nome',
			preco 	 = '$preco',
			situacao = '$situacao'
			WHERE cod_material = '$codigo'";
			
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/materiais_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}

 ?>
