<?php 
	require_once('../classes/db.class.php');
	require_once('../pages/cidades_lista_estados.php');
	session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: ../index.php?erro=1');
	}
	//se possui cidade existente na hora de gravar no banco
	$erroCidadeExists = isset($_GET['erroCidadeExists']) ? $_GET['erroCidadeExists'] : 0;
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
		<link rel="shortcut icon" href="img/icon_experticon.png" type="image/png">

		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" ></link>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/jquery-3.1.0.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../estilos/style.css">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
  		</script>
  		
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
			<li class="active">Cidades</li>
			<li class="active">Cadastrar nova cidade</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				Campos obrigatórios <span class="">*</span>
			</div>
			<div class="panel-body">
				<form method="post" action="../pages/cidades_registrar.php" name="cad_cidades" id="cad_cidades">
					<div class="form-group">
					    <div class="row">
					    	<div class="col-xs-5">
					    		<label>Nome *</label>
					    		<input type="text" value="" name="nome" class="form-control" style="text-transform: uppercase;" placeholder="Nome da cidade" required autofocus ><?php if ($erroCidadeExists) {echo '<font style="color:#F00">Esta cidade já está cadastrada.</font>'; } ?>
					    	</div>
					    	<div class="col-xs-2">
					    		<div class="form-group">
								    <label>UF*</label>
									<select class="form-control" name="uf" id="selectOK" onchange="estadoSecionado();">
									    <option value="AC" id="ACRE">AC</option>
									    <option value="AL" id="ALAGOAS">AL</option>
									    <option value="AP" id="AMAPÁ">AP</option>
									    <option value="AM" id="AMAZÔNIA">AM</option>
									    <option value="BA" id="BAHIA">BA</option>
									    <option value="CE" id="CEARÁ">CE</option>
									    <option value="DF" id="DISTRITO FEDERAL">DF</option>
									    <option value="ES" id="ESPÍRITO SANTO">ES</option>
									    <option value="GO" id="GOIÁS">GO</option>
									    <option value="MA" id="MARANHÃO">MA</option>
									    <option value="MG" id="MINAS GERAIS">MG</option>
									    <option value="MS" id="MATO GROSSO DO SUL">MS</option>
									    <option value="MT" id="MATO GROSSO">MT</option>
									    <option value="PA" id="PARÁ">PA</option>
									    <option value="PB" id="PARAÍBA">PB</option>
									    <option value="PE" id="PERNANBUCO">PE</option>
									    <option value="PI" id="PIAUÍ">PI</option>
									    <option value="PR" id="PARANÁ">PR</option>
									    <option value="RJ" id="RIO DE JANEIRO">RJ</option>
									    <option value="RN" id="RIO GRANDE DO NORTE">RN</option>
									    <option value="RO" id="RONDÔNIA">RO</option>
									    <option value="RR" id="RORAÍMA">RR</option>
									    <option value="RS" id="RIO GRANDE DO SUL">RS</option>
									    <option value="SC" id="SANTA CATARINA">SC</option>
									    <option value="SE" id="SERGIPE">SE</option>
									    <option value="SP" id="SÃO PAULO">SP</option>
									    <option value="TO" id="TOCANTINS">TO</option>
									 </select>
							  	</div>
					    	</div>
					    	<div class="col-xs-5">
					    		<div class="form-group">
								    <label >Estado *</label>
								    <input type="text" value="ACRE" id="campo_estado" name="estado" class="form-control text-uppercase" readonly>
							  </div>
					    	</div>		    	
					    </div>
				 	</div>
					<div class="modal-footer">
			          	<button type="submit" class="btn btn-success" id="btnSalvar">Cadastrar</button>	
						<a href="../pages/cidades_home.php">
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