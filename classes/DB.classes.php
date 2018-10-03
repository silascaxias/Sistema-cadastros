
<?php
	class DB{
		
		public function connect(){

			// Conexão com o banco de dados
			$host="localhost";
			$username="root";
			$pass="";
			$dbname="dados";

			$conexao = mysqli_connect($host, $username, $pass, $dbname);

			return $conexao;
		}
		public function insert($conn,$nome,$end,$cpf,$tel,$email,$senha,$nivel){
			// Tratamento das variáveis

			$senha = base64_encode($senha);
			
			// Inserindo no banco de dados
			$validaremail = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email'");
			$contar = mysqli_num_rows($validaremail);

			if($contar == 0){
				$insert = mysqli_query($conn,
				"INSERT INTO usuarios( nome, endereco, cpf, telefone, email, senha, nivel) 
				VALUES ('$nome','$end','$cpf','$tel','$email','$senha', '$nivel')");
			}else{
				return $result = "Email already registered!";
			}

			if(isset($insert)){
				return $result = "Successful registration!";
			}else{
				if($result == "")
					return $result = "System error, registration failed!";
			}

		}

		public function login($conn,$email,$senha){
			
			$senha = base64_encode($senha);

			$buscar = mysqli_query($conn, "SELECT * FROM usuarios where email='$email' and senha ='$senha' LIMIT 1");

			if(mysqli_num_rows($buscar) == 1){

				$dados = mysqli_fetch_array($buscar);
				$_SESSION['nome'] = $dados['nome'];	
				$_SESSION['email'] = $dados['email'];
				$_SESSION['senha'] = $dados['senha'];
				$_SESSION["nivel"] = $dados['nivel'];
				setcookie("logado",1);
				$log = 1;
				$result = "Logged in successfully!";
			}else
				$result = "Incorrect password or email!";

			$par = array($buscar,$result);
			return $par;
		}

		public function selectAll($conn){
			$select = mysqli_query($conn, "SELECT * FROM usuarios");

			if(!isset($select)){
				$result = "unsuccessful user select.";
			}

			return $select;
		}

		public function select($conn,$id){
			$select = mysqli_query($conn, "SELECT * FROM usuarios WHERE id='$id'");

			if(!isset($select))
				$result = "Unsuccessful user selection.";
			else
				$result = "";
			

			$par = array($select,$result);
			return $par;
		}

		public function delete($conn,$id){
			$delete = mysqli_query($conn, "DELETE FROM usuarios WHERE id = '$id'");

			if(!isset($delete)){
				$result = "Delete - unsuccessful.";
			}else{
				$result = "Deleted - Success.";
			}
			$par = array($delete,$result);
			return $par;
		}

		public function update($conn,$id,$nome,$end,$cpf,$tel,$email,$senha,$nivel){
			
			$senha = base64_encode($senha);

			$update = mysqli_query($conn, "UPDATE usuarios SET nome='$nome',endereco='$end',cpf='$cpf',telefone='$tel',email='$email',senha='$senha',nivel='$nivel' WHERE id = '$id' LIMIT 1");

			if(!isset($update)){
				$result = "Impossível autalizar usuários!";
			}

			if ($update == true) {
   				$result = "Record updated successfully";
			} else {
    			$result = "Error updating record: " . $conn->error;
			}

			$par = array($update,$result);
			return $par;
		}
	}

?>