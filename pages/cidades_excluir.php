<?php 
	require_once('../classes/db.class.php');
	$cod_cidade = intval($_GET['cod']);
	$sql = "DELETE from cidades WHERE cod_cidade = '$cod_cidade'";
	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$resultado_id = mysqli_query($link, $sql); 
	if ($resultado_id ) {
		echo "<script>
				location.href='../pages/cidades_home.php';
			</script>";
	}else{
		echo "<script>
			alert('Não foi possível excluir esta cidade! Entre em contato com o administrador do sistema.')
			location.href=' ../pages/cidades_home.php';
		</script>";
	}
 ?>