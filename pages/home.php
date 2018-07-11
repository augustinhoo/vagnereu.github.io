<?php 
	session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: ../index.php?erro=1');
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Bem-vindo à Expert
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="img/icon_expert.png" type="image/png">

		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" ></link>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/jquery-3.1.0.min.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="../estilos/style.css"> -->
	</head>
	
<body onLoad="showtime()">
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<span title="Logo Expert">
						<div id="logoSVG">Expert</div>
					</span>
				</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="../pages/cidades_home.php">Cidades</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Sala de aula <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Avaliações</a></li>
							<li><a href="../pages/cursos_home.php">Cursos</a></li>
							<li><a href="#">Frequencia</a></li>
							<li><a href="#">Turmas</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Financeiro <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Contas a pagar</a></li>
							<li><a href="#">Contas a receber</a></li>
							<li><a href="#">Despesas</a></li>
							<li><a href="../pages/condPgto_home.php">Condição Pgto</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Matrículas</a></li>
							<li><a href="#">Parcelas</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Estornos</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Controle <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="../pages/materiais_home.php">Materiais</a></li>
							<li><a href="#">Entrega materiais</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Opções <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Contato</a></li>
							<li><a href="#">Suporte</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Pessoas <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Alunos</a></li>
							<li><a href="#">Fornecedores</a></li>
							<li><a href="#">Professores</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../pages/usuarios_home.php">Usuários</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span> 
							<?php echo $_SESSION['login'] ?> 
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="../classes/sair.php"">
									<span class="glyphicon glyphicon-off"></span> Sair
								</a>
							</li> 
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="well well-lg">
			bem vindo
		</div>
	</div>
		
	<div class="panel-footer" id="rodape" style="bottom: 0px; position: fixed; width: 100%;	text-align: center;">
		<div class="row">
			<div class="container">
				<div class="col-sm-6">
					 Todos os direitos reservados Expert!
				</div>
				<!-- <div class="col-sm-6">
					<label>
						<?php
							setlocale(LC_ALL,"pt_BR","ptb");
							date_default_timezone_set('America/Sao_Paulo');
						 	echo date("l j \of F Y");
						 	?>
					
						<script language="JavaScript">
							function showtime(){
								setTimeout("showtime();",1000);
								callerdate.setTime(callerdate.getTime()+1000);
								var hh = String(callerdate.getHours());
								var mm = String(callerdate.getMinutes());
								var ss = String(callerdate.getSeconds());
								document.clock.face.value = 
								((hh < 10) ? " " : "") + hh +
								((mm < 10) ? ":0" : ":") + mm +
								((ss < 10) ? ":0" : ":") + ss;
							}
							callerdate = new Date(<?php echo date("Y,m,d,H,i,s");?>);
						</script>
							<form name="clock">
								<input type="text" name="face" value="" size=15 readonly>
							</form>
					</label>
				</div> -->

			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
			})
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	
</body>
</html>