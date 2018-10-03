<?php
// Inicializações

ob_start();
session_start();

//GLOBAIS

$home = "http://localhost/pw2-sistema/cadastro.php";;
$title = "Administração!";
$msg = "";
$startaction = "";
$formulario = "";
$result = "";

if(isset($_GET["acao"])){

	$acao=$_GET['acao'];
	$startaction = 1;
}

// Conexão com o banco de dados
ini_set('default_charset', 'UTF-8');

include("classes/DB.classes.php");

$conectar = new DB;
$conn = $conectar->connect();


// Método de cadastro

if($startaction == 1){
	if($acao == "cadastrar"){

		$nome=$_POST['nome'];
		$end=$_POST['end'];
		$cpf=$_POST['cpf'];
		$tel=$_POST['tel'];
		$email=$_POST['email'];
		$senha=$_POST['senha'];
		$nivel=$_POST['nivel'];

		if(empty($nome)||empty($end)||empty($cpf)||empty($tel)||empty($email)||empty($senha)||empty($nivel)) {
			$result = "Preencha todos os campos!";
		}
		// Todos os campos preenchidos
		else{
			// E-mail valido
			if(filter_var($email,FILTER_VALIDATE_EMAIL)){
				// Senha ínválda
				if(strlen($senha)<8){
					$result = "As senhas devem ter no mínimo oito caracteres!";
				}
				// Senha váilida
				else{
					// Executa a classe de cadastro
					$result  = $conectar->insert($conn,$nome,$end,$cpf,$tel,$email,$senha,$nivel);
				}
			}
			// E-mail inválido
			else{
				$result = "Digite seu e-mail corretamente!";
			}
		}
	}
}

// Método de login
 if($startaction == 1){
	if($acao == "logar"){
		// Dados
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		if(empty($email) || empty($senha)){
			$result = "Preencha todos os campos!";
		}else{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$result = "Digite um e-mail válido!";
			}else{
				// Executa a busca pelo usuario

				$par = $conectar->login($conn,$email,$senha); 
				$result = $par[1];
			}
		}

	}
}


// Método de Excluir
 if($startaction == 1){
	if($acao == "excluir"){
		if(isset($_GET['id'])){

			// Dados
			$id = $_GET['id'];
			$par = $conectar->delete($conn,$id);
			$result = $par[1];
		}
	}
}

// Método de Editar
 if($startaction == 1){
	if($acao == "editfirst"){
		if(isset($_GET['id'])){

			// Dados
			$id = $_GET['id'];
			
			$par = $conectar->select($conn,$id);
            $selecao = mysqli_fetch_array($par[0]);
      
			$nome = $selecao['nome'];
			$endereco = $selecao['endereco'];
			$cpf = $selecao['cpf'];
			$telefone = $selecao['telefone'];
			$email = $selecao['email'];
			$senha = base64_decode($selecao['senha']);
			$nivel = $selecao['nivel'];		

		}
	}
}

 if($startaction == 1){
	if($acao == "edit"){
		if(isset($_GET['id'])){

			// Dados
			$id = $_GET['id'];
			$nome=$_POST['nome'];
			$endereco=$_POST['end'];
			$cpf=$_POST['cpf'];
			$telefone=$_POST['tel'];
			$email=$_POST['email'];
			$senha=$_POST['senha'];
			$nivel=$_POST['nivel'];

	
			$par = $conectar->update($conn,$id,$nome,$endereco,$cpf,$telefone,$email,$senha,$nivel);
			$result = $par[1];
						

		}
	}
}


// Método de logout

if($startaction == 1){
	if($acao == "logout"){
		setcookie("logado", "");
		unset($_SESSION['email'], $_SESSION['senha'], $_SESSION['nivel']);
	}
}

// Método de checagem 

if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
	$logado = 1;
	$nivel = $_SESSION['nivel'];
}

?>

