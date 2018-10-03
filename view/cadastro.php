<?php
$page = "Cadastro!";

if($result == ""){
	$result = "Registro De Usuários";
}
include("header.php");

?>
	
	<div id="cadastrar">
		<a href="index.php" title="Faça login!">Home &raquo;</a>
	</div>

	<div id="centralizar">
		<div id="login" class="form bradius" style="top:100px;">

			<div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/logo.png" alt="<?php echo $title;?>" title="<?php echo $title;?>"></a></div>
			
			<div class="boxLogin">

				<form action="?acao=cadastrar" id="form" method="post">
					<label for="nome">Nome: </label><input class="txt bradius" type="txt" id="nome" name="nome">

					<label for="end">Endereço: </label><input class="txt bradius" type="txt" id="end" name="end">

					<label for="cpf">CPF: </label><input class="txt bradius" type="txt" id="cpf" name="cpf" maxlength="14" OnKeyPress="GeneralFunctions.Format('###.###.###-##', this)" placeholder="Informe seu CPF (opcional)">

					<label for="tel">Telefone: </label><input maxlength="13"  onkeydown="mascaraTelefone(this)" onkeyup="mascaraTelefone(this)" class="txt bradius" type="tel" id="tel" name="tel">

					<label for="email">E-mail: </label><input class="txt bradius" type="email" id="email" name="email">

					<label for="senha">Senha: </label><input class="txt bradius" type="password" id="senha" name="senha" onclick="document.getElementById('senha').type = 'text';" onblur="document.getElementById('senha').type = 'password'";>

					<label for="senha">Tipo de usuário:
					<select name="nivel" id="nivel" >
					  <option value="1" selected>Usuario</option> 
					  <option value="2">Administrador</option>
					</select>
					<input type="submit" class="sb" value="Cadastrar">
					</label>
				</form>
			</div>
		</div>
	</div>
	</body>
</html>