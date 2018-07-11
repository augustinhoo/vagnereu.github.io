<?php 
	session_start();
	require_once('../classes/db.class.php');

	$login = $_POST['login'];
	$senha = md5($_POST['senha']);

	$sql = "SELECT * from usuarios WHERE login = '$login' AND senha = '$senha'";
	$objDb = new db();
	$link = $objDb->conecta_mysqli();

	$resultado_id = mysqli_query($link, $sql); 

	if ($resultado_id) {
		$dados_usuario = mysqli_fetch_array($resultado_id);
		
		if (isset($dados_usuario['login'])){
			$_SESSION['login'] = $dados_usuario['login'];
			$_SESSION['senha'] = $dados_usuario['senha'];			
			header('Location: ../pages/home.php?');
		}else{
			//usuario não existe
			header('Location: ../index.php?erro=1');
		}
	}else{
		echo "Erro ao na execução da consulta! Por favor entre em contato com o administrador do sistema.";
	}
 ?>