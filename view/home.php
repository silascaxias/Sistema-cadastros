<?php
$page = "Painel Administrativo!";
if($result == ""){
	$result = "Bem vindo " . $_SESSION['nome'] . "!";
}
include("header.php");


if(!isset($acao)){
	$acao = "listar";
}
if(!isset($id)){
	$id = 0;
}

if($acao == "listar"){
	$action = "?acao=cadastrar";
}else if($acao == "editfirst"){
	$action = "?acao=edit&amp;id=$id";
}

if($acao == "editfirst"){
	$display = "";
}else{
	$display = "none";
}
?>	
	<div id="cadastrar">
		<a href="index.php?acao=logout" title="Faça Logout!">Logout &raquo; <?php echo $_SESSION['nome']?></a>

	</div>
		<div class="group">
			<div class="a">
				<table>

					<?php
					$resultado = $conectar->selectAll($conn);
					$contar = mysqli_num_rows($resultado);
					if($contar == 0){
						echo "Nenhum usuário cadastrado no sistema!";
					}else{
						?>
						<tr>
							<div id="cadCenter">
								<?php
								if($_SESSION['nivel'] == 1){
									$link = "index.php";
									$msg = "alert('Você não tem permissões para cadastrar!')";
								}else{
									$link = "cadastro.php";
									$msg = "";
								}

								echo "<a href=\"$link\" title=\"Cadastrar!\" onclick=\"$msg\">Cadastrar &raquo;</a>";
								?>

							</div>
						</tr>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Endereço</th>
							<th>CPF</th>
							<th>Telefone</th>
							<th>E-mail</th>	
							<th>Senha</th>
							<th>Nível</th>
							<th>Ação</th>
						</tr>
						<?php
						while($linha = mysqli_fetch_array($resultado)){
							?>
							<tr>
								<td><?=$linha["id"];?></td>
								<td><?=$linha["nome"];?></td>
								<td><?=$linha["endereco"];?></td>
								<td><?=$linha["cpf"];?></td>
								<td><?=$linha["telefone"];?></td>
								<td><?=$linha["email"];?></td>
								<td> ******</td>
								<td><?=$linha['nivel'] == 1 ?  "Usuário" : "Admin";?></td>
								<td align="center">
									<?php 

									$id = $linha["id"];

									if($_SESSION["nivel"] == 1){
										echo "Sem permissões!";
									}else{


										echo "<div class=\"icons\"><a href=\"index.php?acao=editfirst&amp;id=$id\" class=\"icon-edit\"></a>";	
										echo "<a href=\"index.php?acao=excluir&amp;id=$id\" class=\"icon-excluir\" onclick=\"return confirm('Tem certeza que deseja deletar este registro?')\" style=\"color:red;\">Excluir</a></div>";										
									}

									?>							
								</td>
							</tr>
							<?php }}?>				

						</table>
				</div>
				<div class="b" style="display:<?=$display?>;">
					<div id="cad" class="form bradius" style="top:50px;">
						<div class="boxLogin">

							<label align="center" style="font-size: 25px;">Editar</label>
							<form action="<?=$action?>" id="form" method="post" >
								<label for="nome">Nome: </label><input class="txt bradius" type="txt" id="nome" name="nome" value=""> 

								<label for="end">Endereço: </label><input class="txt bradius" type="txt" id="end" name="end" value="">

								<label for="cpf">CPF: </label><input class="txt bradius" type="txt" id="cpf" name="cpf" maxlength="14" OnKeyPress="GeneralFunctions.Format('###.###.###-##', this)" placeholder="Informe seu CPF (opcional)" value="">

								<label for="tel">Telefone: </label><input maxlength="13"  onkeydown="mascaraTelefone(this)" onkeyup="mascaraTelefone(this)" class="txt bradius" type="tel" id="tel" name="tel" value="">

								<label for="email">E-mail: </label><input class="txt bradius" type="email" id="email" name="email" value="" autocomplete="off">

								<label for="senha">Senha: </label><input class="txt bradius" type="password" id="senha" name="senha" value="" onclick="document.getElementById('senha').type = 'text';" onblur="document.getElementById('senha').type = 'password'";>

								<label for="senha">Tipo de usuário:
								<select name='nivel' value="" id='nivel'>
									<option value='1' selected>Usuario</option> 
									<option value='2'>Administrador</option>
								</select>
								<input type="submit" class="sb" value="Cadastrar" <?php if($_SESSION['nivel'] == 1) "disabled" ?>>
								</label>
							</form>
						</div>
					</div>
				</div>
			</div>
	</body>
</html>
<?php if($acao == "editfirst"):?>
	<script language="javascript" type="text/javascript">  
		load_value("<?=$nome?>","<?=$endereco?>","<?=$cpf?>","<?=$telefone?>","<?=$email?>","<?=$senha?>","<?=$nivel?>");
	</script>
<?php endif; ?>
