<?php
$page = "Login!";

if($result == ""){
	$result = "Bem - Vindo!";
}
include("header.php");
?>
		<div id="centralizar">
			<div id="login" class="form bradius">

				<div class="logo">
					<a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/logo.png" alt="<?php echo $title;?>" title="<?php echo $title;?>"></a>

				</div>
				<div class="boxLogin">

					<form action="?acao=logar" method="post">
						<label for="email">E-mail: </label><input class="txt bradius" type="email" id="email" name="email">
						<label for="senha">Senha: </label><input class="txt bradius" type="password" id="senha" name="senha" onclick="document.getElementById('senha').type = 'text';" onblur="document.getElementById('senha').type = 'password'";>
						<input type="submit" class="sb" value="Entrar">
					</form>

				</div>
			</div>
		</div>
	</body>
</html>
