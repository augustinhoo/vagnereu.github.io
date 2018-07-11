<?php 
	require_once('../classes/db.class.php');
	session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: ../index.php?erro=1');
	}
	$codigo = intval($_GET['cod']);
	if (!isset($_GET['cod'])) {
		header('Location: ../pages/cidades_home.php');
	}
	$sql = "SELECT * from cidades WHERE cod_cidade = '$codigo'";
	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$resultado_id = mysqli_query($link, $sql); 
	$dado = $resultado_id->fetch_array() ;
    $nome = $dado["nome"];
    $uf = $dado["uf"];
    $estado = $dado["estado"];
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			Bem-vindo a Expert
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="img/icon_expert.png" type="image/png">

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
				<a class="navbar-brand" href="#">
					<span title="Logo Expert">
						<div id="logoSVG">Expert</div>
					</span>
				</a>
		  	</div>
		  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span> 
						  	<?php  
							  echo $_SESSION['login']
						  	?> <span class="caret"></span></a>
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
			<li class="active">Alterar cidade</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				Campos obrigatórios <span class="">*</span>
			</div>
			<div class="panel-body">
				<h4 id="msgObrigatorio">Você está atualizando dados!</h4>
				<hr>
				<form method="post" action="../pages/cidades_atualizar.php?cod=<?php echo $dado["cod_cidade"]; ?>" name="cad_cidade" id="cad_cidade">
					<div class="form-group">
						<div class="row">
							<div class="col-xs-5">
								<label>Nome *</label>
								<input type="text" value="<?php echo $nome; ?>" name="nome" class="form-control text-uppercase"" id="" placeholder="Nome da cidade" required>
						  	</div>
							<div class="col-xs-2">
					    		<div class="form-group">
								    <label>UF*</label>
									<select class="form-control" " name="uf">
										<option value="<?php echo $uf; ?>"><?php echo $uf; ?></option>
									    <option value="AC">AC</option>
									    <option value="AL">AL</option>
									    <option value="AM">AM</option>
									    <option value="AP">AP</option>
									    <option value="BA">BA</option>
									    <option value="CE">CE</option>
									    <option value="DF">DF</option>
									    <option value="ES">ES</option>
									    <option value="GO">GO</option>
									    <option value="MA">MA</option>
									    <option value="MG">MG</option>
									    <option value="MS">MS</option>
									    <option value="MT">MT</option>
									    <option value="PA">PA</option>
									    <option value="PB">PB</option>
									    <option value="PE">PE</option>
									    <option value="PI">PI</option>
									    <option value="PR">PR</option>
									    <option value="RJ">RJ</option>
									    <option value="RN">RN</option>
									    <option value="RO">RO</option>
									    <option value="RR">RR</option>
									    <option value="RS">RS</option>
									    <option value="SC">SC</option>
									    <option value="SE">SE</option>
									    <option value="SP">SP</option>
									    <option value="TO">TO</option>
									 </select>
							  	</div>
					    	</div>

					    	<div class="col-xs-5">
					    		<div class="form-group">
								    <label >Estado *</label>
								    <input readonly type="text" value="<?php echo $estado; ?>" name="estado" class="form-control text-uppercase">
							  </div>
					    	</div>
					  	</div>
					</div>
					<div class="modal-footer">
						<button id="btnSalvar" type="submit" class="btn btn-success">Salvar</button>	
							<a href="../pages/cidades_home.php">
								<button id="btnCancelar" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
</body>
</html>