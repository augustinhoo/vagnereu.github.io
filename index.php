<?php 
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Início
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="img/icon_expert.png" type="image/png">

		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" ></link>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/jquery-3.1.0.min.js"></script>
		<link rel="stylesheet" type="text/css" href="estilos/style.css">
	</head>
<body id="b" onLoad="document.validar_acesso.login.focus();">
	<div class="container">
		<div class="form-control" id="tela" >
			<form method="post" action="classes/validar_acesso.php" name="validar_acesso" id="validar_acesso">
				<div class="form-group">
					<label>Login</label>
					<input id="login" name="login" class="form-control" type="text" placeholder="Digite seu login">
				</div>
				<div class="form-group">
					<label>Senha</label>
					<input id="senha" name="senha" class="form-control" type="password" placeholder="Digite sua senha">
				</div>
				<button class="btn btn-info form-control" type="submit">Entrar</button>
			</form>	
			<div>
				<label id="msg" class="alert alert-danger" >
				<?php 
					if ($erro == 1) {
						echo "Login ou senha incorretos!";
					}
				 ?>
			</label> 	
			</div>
		</div>
	</div>
</body>
</html>