<?php 
	require_once('../classes/db.class.php');
	$cod_curso = intval($_GET['cod']);
	$sql = "DELETE from cursos WHERE cod_curso = '$cod_curso'";
	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$resultado_id = mysqli_query($link, $sql); 
	if ($resultado_id ) {
		echo "<script>
				location.href='../pages/cursos_home.php';
			</script>";
	}else{
		echo "<script>
			alert('Erro! Não foi possível excluir o curso! Entre em contato com o administrador do sistema.')
			location.href=' ../pages/cursos_home.php';
		</script>";
	}
 ?>