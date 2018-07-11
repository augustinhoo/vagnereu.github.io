<?php 
	require_once('../classes/db.class.php');
	session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: ../index.php?erro=1');
	}
	//se possui login existente na hora de gravar no banco
	$erroLoginExists = isset($_GET['erroLoginExists']) ? $_GET['erroLoginExists'] : 0;
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Usuários
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="img/icon_experticon.png" type="image/png">

		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" ></link>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/jquery-3.1.0.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../estilos/style.css">
	</head>
	
<body>
	<nav class="navbar navbar-default"> 
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Expert</a>
			</div>
		  
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span> 
							  <?php  
								  echo $_SESSION['login']
							  ?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="../classes/sair.php""><span class="glyphicon glyphicon-off"></span> Sair</a></li> 
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<ol class="breadcrumb alert-default">
			<li><strong>Você está em:</a></strong></li>
			<li class="active">Usuários</li>
			<li class="active">Cadastrar novo usuário</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				Campos obrigatórios <span class="">*</span>
			</div>
			<div class="panel-body">
				<form method="post" action="../pages/usuarios_registrar.php" name="cad_usuarios" id="cad_usuarios">
					<div class="form-group">
					    <div class="row">
					    	<div class="col-xs-6">
					    		<label>Nome <i id="iconeAsterisco">*</i></label>
					    		<input type="text" value="" name="nome" class="form-control text-lowercase" placeholder="Nome do usuário" required>
					    	</div>
					    	<div class="col-xs-6">
					    		<label>Login <i id="iconeAsterisco">*</i></label>
					    		<input type="email" name="login" value="" class="form-control text-lowercase" id="" placeholder="Digite seu e-mail" required>
					    		<?php if ($erroLoginExists) {echo '<font style="color:#F00">Este e-mail já está sendo usado.</font>'; } ?>
					    	</div>		    	
					    </div>
				 	</div>
				  	<div class="row">
				    	<div class="col-xs-4">
				    		<div class="form-group">
							    <label >Senha <i id="iconeAsterisco">*</i></label>
							    <input type="password" value="" name="senha" class="form-control text-lowercase"  id="" placeholder="Digite uma senha" required>
						  </div>
				    	</div>
				    	<div class="col-xs-4">
				    		<div class="form-group">
							    <label>Perfil <i id="iconeAsterisco">*</i></label>
								<select class="form-control" " name="perfil" id="selecao">
								    <option value="Admin">Admin</option>
								    <option value="Professor(a)">Professor(a)</option>
								    <option value="Secretario(a)">Secretario(a)</option>
								 </select>
						  </div>
				    	</div>
				    	<div class="col-xs-4">
				    		<div class="form-group">
							    <label>Situação *</label>
					    		<input type="text" name="situacao" id="situacao" value="Ativo" class="form-control text-uppercase" readonly>
						  </div>
				    	</div>
				    </div>
					<div class="modal-footer">
			          	<button type="submit" class="btn btn-success" id="btnSalvar">Cadastrar</button>	
						<a href="../pages/usuarios_home.php">
							<button type="button" class="btn btn-danger" data-dismiss="modal" id="btnCancelar">Cancelar</button>
						</a>
			        </div>
				</form>
			</div>			
		</div>
	</div>

	<div class="panel-footer" id="rodape">
		Todos os direitos reservdos Expert
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function () {
			$('[data-toggle="popover"]').popover()
			})

		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
			})
	</script>
	</div>
</body>
</html>