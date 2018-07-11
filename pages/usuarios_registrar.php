<?php 
	require_once('../classes/db.class.php');
	$nome 	  = $_POST['nome'];
	$login    = $_POST['login'];
	$senha    = md5($_POST['senha']);
	$perfil   = $_POST['perfil'];
	$situacao = $_POST['situacao'];
	$objDb = new db();
	$link = $objDb->conecta_mysqli();

	$login_existe = false;

	// verifica se o usuario já existe
	$sql = "select * from usuarios where login = '$login'";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if (isset($dados_usuario['login'])) {
			$login_existe = true;	
		}
	}else{
		echo 'Ero ao tentar localizar o registro de usuários';
	}
	//se o login existe
	if ($login_existe) {
		$retorno_get = '';
		if ($login_existe) {
			$retorno_get.="erroLoginExists=1";
		}
		header('Location: ../pages/usuarios_cadastrar.php?'.$retorno_get);
		die();
	}
	$sql = "INSERT INTO usuarios
			(nome, login, senha, perfil, situacao)
			VALUES
			('$nome','$login','$senha','$perfil','$situacao')";
	if(mysqli_query($link, $sql)){
		echo "Registro gravado!";
		header('Location: ../pages/usuarios_home.php');
	}else{
		echo "Erro ao gravar os registros";
	}
 ?>