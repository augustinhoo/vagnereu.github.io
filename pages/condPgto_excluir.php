<?php 
	require_once('../classes/db.class.php');
	$cod_cond = intval($_GET['cod']);
	$sql = "DELETE from cond_pgto WHERE cod_cond = '$cod_cond'";
	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$resultado_id = mysqli_query($link, $sql); 
	if ($resultado_id ) {
		echo "<script>
				location.href='../pages/condPgto_home.php';
			</script>";
	}else{
		echo "<script>
			alert('Erro! Não foi possível excluir a condição de pagamento! Entre em contato com o administrador do sistema.')
			location.href=' ../pages/condPgto_home.php';
		</script>";
	}
 ?>