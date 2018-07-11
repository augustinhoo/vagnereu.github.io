<?php 
	require_once('../classes/db.class.php');
	$codigo = intval($_GET['cod']);

	$tipo       = $_POST['tipo'];
	$num_parc   = $_POST['num_parc'];
	$forma_pgto = $_POST['forma_pgto'];
	$situacao   = $_POST['situacao'];

	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$sql = "UPDATE cond_pgto SET
			tipo 	  	   = '$tipo',
			num_parc 	   = '$num_parc',
			forma_pgto 		   = '$forma_pgto',
			situacao 	 	   = '$situacao'
			WHERE cod_cond    = '$codigo'";
			
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/condPgto_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}

 ?>
