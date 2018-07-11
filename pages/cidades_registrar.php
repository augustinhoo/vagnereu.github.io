<?php 
	require_once('../classes/db.class.php');
	$nome 	= $_POST['nome'];
	$uf    	= $_POST['uf'];
	$estado = $_POST['estado'];
	$objDb 	= new db();
	$link 	= $objDb->conecta_mysqli();

	$cidade_existe = false;

	// verifica se o cidade já existe
	$sql = "select * from cidades where nome = '$nome'";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_cidade = mysqli_fetch_array($resultado_id);
		if (isset($dados_cidade['nome'])) {
			$cidade_existe = true;	
		}
	}else{
		echo 'Erro ao tentar localizar o registro da cidade';
	}
	//se o cidade existe
	if ($cidade_existe) {
		$retorno_get = '';
		if ($cidade_existe) {
			$retorno_get.="erroCidadeExists=1";
		}
		header('Location: ../pages/cidades_cadastrar.php?'.$retorno_get);
		die();
	}
	$sql = "INSERT INTO cidades
			(nome, uf, estado)
			VALUES
			('$nome','$uf','$estado')";
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/cidades_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}
 ?>