<?php
$page = "Editar!";
include("header.php");
?>
		
	<div id="cadastrar">
		<a href="index.php?acao=logout" title="Faça login!">Logout &raquo;</a>
	</div>
		<div id="login" class="form bradius" style="top: 20px;">

			<div class="message bradius" style="<?php echo $display;?>"><?php echo $msg;?></div>

			<div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"><img src="css/imagens/logo.png" alt="<?php echo $title;?>" title="<?php echo $title;?>"></a></div>
			
			<div class="acomodar">

				<form action="?acao=editar?id=$id" method="post">
					<label for="nome">Nome: </label><input class="txt bradius" type="txt" id="nome" name="nome">
					<label for="end">Endereço: </label><input class="txt bradius" type="txt" id="end" name="end">
					<label for="cpf">CPF: </label><input class="txt bradius" type="txt" id="cpf" name="cpf">
					<label for="tel">Telefone: </label><input class="txt bradius" type="tel" id="tel" name="tel">
					<label for="email">E-mail: </label><input class="txt bradius" type="email" id="email" name="email">
					<label for="senha">Senha: </label><input class="txt bradius" type="password" id="senha" name="senha">
					<label for="senha">Tipo de usuário:
					<select name="nivel" id="nivel">
					  <option value="1" selected>Usuario</option> 
					  <option value="2">Administrador</option>
					</select>
					<input type="submit" class="sb" value="Cadastrar">
					</label>
				</form>
			</div>
		</div>
	</body>
</html>