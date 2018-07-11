<?php 
	require_once('../classes/db.class.php');
	session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: ../index.php?erro=1');
	}
	$erroCursoExists = isset($_GET['erroCursoExists']) ? $_GET['erroCursoExists'] : 0;
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Bem-vindo a à Expert
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
			<li class="active">Cursos</li>
			<li class="active">Cadastrar novo curso</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				Campos obrigatórios *
			</div>
			<div class="panel-body">
				<form method="post" action="../pages/cursos_registrar.php" name="cad_cursos" id="cad_cursos">
					<div class="form-group">
					    <div class="row">
					    	<div class="col-xs-6">
					    		<label>Nome do curso *</label>
					    		<input autofocus type="text" value="" name="nome_curso" class="form-control text-uppercase" placeholder="Nome do curso" required>
					    		<?php if ($erroCursoExists) {echo '<font style="color:#F00">Este curso ja está cadastrado.</font>'; } ?>
					    	</div>
					    	<div class="col-xs-2">
					    		<label>Carga horária *</label>
					    		<input type="number" name="carga_horaria" value="" class="form-control" id="" placeholder="Carga horária" required>
					    	</div>
					    	<div class="col-xs-2">
					    		<label>Preço *</label>
					    		<input type="text" name="preco" value="" class="form-control" id="" placeholder="Preço" required>
					    	</div>
					    	<div class="col-xs-2">
					    		<div class="form-group">
						    		<label>Qtde aulas *</label>
						    		<input type="number" name="qtde_aulas" value="" class="form-control">
							  </div>
					    	</div>		    	
					    </div>
				 	</div>
				  	<div class="row">
				    	<div class="col-xs-2">
				    		<div class="form-group">
					    		<label>Qtde material *</label>
					    		<input type="number" name="qtde_material" value="" class="form-control">
						  </div>
				    	</div>
				    	<div class="col-xs-2">
				    		<div class="form-group">
				    			<label>Situação *</label>
					    		<input type="text" name="situacao" value="Ativo" class="form-control" readonly>
						  </div>
				    	</div>
				    </div>
					<div class="modal-footer">
			          	<button type="submit" class="btn btn-success" id="btnSalvar">Cadastrar</button>	
						<a href="../pages/cursos_home.php">
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