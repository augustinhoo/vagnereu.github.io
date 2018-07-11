<?php 
	require_once('../classes/db.class.php');
	$tipo    	= $_POST['tipo'];
	$num_parc   = $_POST['num_parc'];
	$forma_pgto = $_POST['forma_pgto'];
	$situacao   = $_POST['situacao'];
	$objDb = new db();
	$link = $objDb->conecta_mysqli();

	$cond_existe = false;

	// verifica se a condição de pagamento já existe
	// $sql = "select * from cond_pgto where tipo = '$tipo'";
	// if($resultado_id = mysqli_query($link, $sql)){
	// 	$dados_cond = mysqli_fetch_array($resultado_id);
	// 	if (isset($dados_cond['tipo'])) {
	// 		$cond_existe = true;	
	// 	}
	// }else{
	// 	echo 'Erro ao tentar localizar a condição de pagamento!';
	// }
	// //se o curso existe
	// if ($cond_existe) {
	// 	$retorno_get = '';
	// 	if ($cond_existe) {
	// 		$retorno_get.="erroCondExists=1";
	// 	}
	// 	header('Location: ../pages/condPgto_cadastrar.php?'.$retorno_get);
	// 	die();
	// }
	$sql = "INSERT INTO cond_pgto
			(tipo, num_parc,  forma_pgto, situacao)
			VALUES
			('$tipo', '$num_parc', '$forma_pgto', '$situacao')";
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/condPgto_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}
 ?>