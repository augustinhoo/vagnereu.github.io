<?php 
	require_once('../classes/db.class.php');
	$codigo = intval($_GET['cod']);

	$nome_curso    = $_POST['nome_curso'];
	$carga_horaria = $_POST['carga_horaria'];
	$preco    	   = $_POST['preco'];
	$qtde_aulas    = $_POST['qtde_aulas'];
	$qtde_material = $_POST['qtde_material'];
	$situacao      = $_POST['situacao'];

	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$sql = "UPDATE cursos SET
			nome_curso 	  	   = '$nome_curso',
			carga_horaria 	   = '$carga_horaria',
			preco 	 	 	   = '$preco',
			qtde_aulas 		   = '$qtde_aulas',
			qtde_material	   = '$qtde_material',
			situacao 	 	   = '$situacao'
			WHERE cod_curso    = '$codigo'";
			
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/cursos_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}

 ?>
