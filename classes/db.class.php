<?php 
	class db {
		// //host
		// private $host     = 'despesas.mysql.uhserver.com';
		// private $usuario  = 'expert21';
		// private $senha	  = '@thmpv77d6f94376';
		// private $banco = 'despesas';

		// public function conecta_mysqli(){
		// 	//criar conexao
		// 	// mysqli_connect(localizacao do banco de dados, usuario de acesso, senha, banco de dados);
		// 	$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);
			
		// 	mysqli_set_charset($con,'utf8');

		// 	if(mysqli_connect_errno()){
		// 		echo 'Erro ao tentar se conectar com o banco de dados!' .mysqli_connect_error();
		// 	}
		// 	return $con;

		// }
		private $host     = 'localhost';
		private $usuario  = 'root';
		private $senha	  = '';
		private $banco	  = 'expert';

		public function conecta_mysqli(){
			//criar conexao
			// mysqli_connect(localizacao do banco de dados, usuario de acesso, senha, banco de dados);
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);			
			mysqli_set_charset($con,'utf8');
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar com o banco de dados!' .mysqli_connect_error();
			}
			return $con;
		}
	}
 ?>