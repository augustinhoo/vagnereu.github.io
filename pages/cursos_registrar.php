<?php 
	require_once('../classes/db.class.php');
	$nome_curso    = $_POST['nome_curso'];
	$carga_horaria = $_POST['carga_horaria'];
	$preco    	   = $_POST['preco'];
	$qtde_aulas    = $_POST['qtde_aulas'];
	$qtde_material = $_POST['qtde_material'];
	$situacao      = $_POST['situacao'];
	$objDb = new db();
	$link = $objDb->conecta_mysqli();

	$curso_existe = false;

	// verifica se o curso já existe
	$sql = "select * from cursos where nome = '$nome'";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_curso = mysqli_fetch_array($resultado_id);
		if (isset($dados_curso['nome_curso'])) {
			$curso_existe = true;	
		}
	}else{
		echo 'Erro ao tentar localizar o curso';
	}
	//se o curso existe
	if ($curso_existe) {
		$retorno_get = '';
		if ($curso_existe) {
			$retorno_get.="erroCursoExists=1";
		}
		header('Location: ../pages/cursos_cadastrar.php?'.$retorno_get);
		die();
	}
	$sql = "INSERT INTO cursos
			(nome_curso, carga_horaria,  preco, qtde_aulas, qtde_material, situacao)
			VALUES
			('$nome_curso', '$carga_horaria', '$preco', '$qtde_aulas', '$qtde_material', '$situacao')";
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/cursos_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}
 ?>