<?php 
	require_once('../classes/db.class.php');

	session_start();
	if (!isset($_SESSION['login'])) {
		header('Location: ../index.php?erro=1');
	}

	$optradio = 'Todas';
	@$pesquisar = $_POST['pesquisar'];
	@$situacao = $_POST['optradio'];
	
	if( $situacao == NULL){
		$sql = "SELECT * from cidades WHERE nome LIKE  '%$pesquisar%' order by nome LIMIT 100";
	}elseif($situacao == 'Todas'){
		$sql = "SELECT * from cidades WHERE nome LIKE  '%$pesquisar%' order by nome LIMIT 100";
	}else{
		$sql = "SELECT * from cidades WHERE nome LIKE  '%$pesquisar%' AND situacao = '$situacao' order by nome LIMIT 100";
	}

	$objDb = new db();
	$link = $objDb->conecta_mysqli();
	$resultado_id = mysqli_query($link, $sql); 

	$cid = "SELECT count(*)as total from cidades";

	$resul = mysqli_query($link, $cid);
	$value = mysqli_fetch_assoc($resul);
	$allCidades = $value['total'];
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
		<script type="text/javascript" src="../bootstrap/js/jquery-3.1.1.min.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="estilos/style.css"> -->
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
				<a class="navbar-brand" href="#">
					<span title="Logo Expert">
						<div id="logoSVG">Expert</div>
					</span>
				</a>
		  	</div>
		  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="home.php">Início <span class="sr-only">(current)</span></a></li>
					<li><a href="#">Relatório</a></li>
				</ul>
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
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<form name="frmPesquisar" method="POST" id="pesquisar">
						<div class="col-sm-6">
							<div class="input-group">
						    	<span class="input-group-btn">
						        	<span class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Cadastrar nova cidade">
						        		<a href="../pages/cidades_cadastrar.php">
											<span class="glyphicon glyphicon-plus"></span>
										</a> 
						        	</span>
						    	</span>
						     	<input class="form-control" style="text-transform: uppercase;" name="pesquisar" type="text" placeholder="Pesquisar cidades">
						      	<span class="input-group-btn">
						        	<button id="pegou" type="submit" class="btn btn-default haha">
						    			<span class="glyphicon glyphicon-search"  data-toggle="tooltip" data-placement="bottom"  title="Pesquisar cidades"></span>
						    		</button>
						      	</span>
						    </div>
						</div>
						<!-- <div style="padding-top: 6px;" class="col-sm-6">
						    <label class="radio-inline">
						    	<input type="radio" name="optradio" value="Todas" <?php echo ($optradio == "Todas") ? "checked" : null; ?>><span  data-toggle="tooltip" data-placement="bottom" title="todas cidades">Todas</span>
						    </label>
						    <label class="radio-inline">
						    	<input type="radio" name="optradio" value="Estado" <?php echo ($optradio == "Estado") ? "checked" : null; ?>><span  data-toggle="tooltip" data-placement="bottom" title="Estado">Estado</span>
						    </label>
						</div> -->
					</form>				
				</div>				
			</div>

			<div class="panel-body">
				<!-- corpo do panel sta vazio -->
			</div>

			<table class="table table-hover table-responsive">
				<thead>
					<tr class="active">
						<th>Nome</th>
						<th>UF</th>
						<th>Estado</th>
						<th style="text-align: center;">Editar</th>
						<th style="text-align: center;">Apagar</th>
					</tr>
				</thead>

				<?php while ($dado = $resultado_id->fetch_array()) {?>

					<tr>
						<td style="text-transform: uppercase;"><?php echo $dado["nome"]; ?></td>
						<td><?php echo $dado["uf"]; ?></td>
						<td><?php echo $dado["estado"]; ?></td>
						<th style="text-align: center;">
							<a href="../pages/cidades_alterar.php?cod=<?php echo $dado["cod_cidade"]; ?>">
								<span data-toggle="tooltip" data-placement="bottom" title="Alterar esta cidade" class="glyphicon glyphicon-pencil"></span>
							</a>
					  	</td>
					  	<th style="text-align: center;">
							<a href="javascript:
								if(confirm('Tem certeza que deseja excluir esta cidade? <?php echo $dado["nome"]; ?>'))
									{ location.href='../pages/cidades_excluir.php?cod=<?php echo $dado["cod_cidade"]; ?>'}">
								<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Excluir esta cidade"></span>
							</a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<div class="container">
		<div class="breadcrumb">
			<h4>
				<span class="label label-primary">
					<?php echo $allCidades; ?> Cidades
				</span>
			</h4>
		</div>
	</div>

	<div class="panel-footer" id="rodape" style="bottom: 0px; position: fixed; width: 100%;	text-align: center;">
		Todos os direitos reservdos Expert
	</div>


	</div>
	
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>

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