<?php 
	require_once('../classes/db.class.php');
	$nome 	  = $_POST['nome'];
	$preco    = $_POST['preco'];
	$situacao = $_POST['situacao'];
	$objDb = new db();
	$link = $objDb->conecta_mysqli();

	$mat_existe = false;

	// verifica se o usuario já existe
	$sql = "select * from materiais where nome = '$nome'";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_material = mysqli_fetch_array($resultado_id);
		if (isset($dados_material['nome'])) {
			$mat_existe = true;	
		}
	}else{
		echo 'Ero ao tentar localizar o registro de material';
	}
	//se o material existe
	if ($mat_existe) {
		$retorno_get = '';
		if ($mat_existe) {
			$retorno_get.="erroMatExists=1";
		}
		header('Location: ../pages/materiais_cadastrar.php?'.$retorno_get);
		die();
	}
	$sql = "INSERT INTO materiais
			(nome, preco, situacao)
			VALUES
			('$nome','$preco','$situacao')";
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/materiais_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}
 ?>