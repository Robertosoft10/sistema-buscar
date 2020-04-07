<?php
session_start();
include_once 'conexao.php';
@$id = $_GET['id'];
$sql = "SELECT * FROM itens WHERE id = '$id'";
$consulta = mysqli_query($conexao, $sql);
$result = mysqli_fetch_array($consulta);
?>
<html>
	<head>
	<meta charset="utf-8">
		<title>Sistema de Busca</title>
		<link rel="stylesheet" type="text/css" href="Css/style.css">
	</head>
	<body>
		<div class="containe">
			<div class="conteudo">
				<h2>Sistema de Busca</h2>
				<?php if(isset($_SESSION['itemOk'])){
					echo $_SESSION['itemOk'];
				unset($_SESSION['itemOk']); }?>
				
				<?php if(isset($_SESSION['itemErro'])){
					echo $_SESSION['itemErro'];
				unset($_SESSION['itemErro']); }?>
				
				<?php if(isset($_SESSION['updateOk'])){
					echo $_SESSION['updateOk'];
				unset($_SESSION['updateOk']); }?>
				
				<?php if(isset($_SESSION['updateErro'])){
					echo $_SESSION['updateErro'];
				unset($_SESSION['updateErro']); }?>
				
				<?php if(isset($_SESSION['deleteOk'])){
					echo $_SESSION['deleteOk'];
				unset($_SESSION['deleteOk']); }?>
				
				<?php if(isset($_SESSION['deleteErro'])){
					echo $_SESSION['deleteErro'];
				unset($_SESSION['deleteErro']); }?>
				
				
				<?php if(!isset($_GET['id'])){?>
				<form action="salvar_item.php" method="post">
				<fieldset>
					<legend>Cadastrar Itens</legend>
					 <input type="text" id="item" name="item"  placeholder="Nome do Item">
					 <input type="number" id="codigo" name="codigo"  placeholder="Código do Item">
					 <input type="text" id="preco" name="preco" placeholder="Preço do Item">
					 <button id="btn-salvar">Salvar</button>
				</fieldset>
				</form>
				<!-- editar -->
				<?php }else{?>
				<form action="atualizar_item.php?id=<?= $result['id'];?>" method="post">
				<fieldset>
					<legend>Editar dados do Itens</legend>
					 <input type="text" id="item" name="item"
					 value="<?php echo $result['item'];?>">
					 <input type="number" id="codigo" name="codigo"
					 value="<?php echo $result['codigo'];?>">
					 <input type="text" id="preco" name="preco"
					 value="<?php echo $result['preco'];?>">
					 <button id="btn-salvar">Alterar</button>
				</fieldset>
				</form>
				<?php }?>
				<hr>
				<form  action="buscar.php" method="post">
				<input type="number" id="cod-buscar" name="codigo" placeholder="Buscar pelo código">
				<input type="text" id="nome-buscar" name="item" placeholder="Buscar pelo nome">
				 <button id="btn-buscar">Buscar</button>
				</form>
				<h2>Lista de Intes</h2>
				<table class="table-list">
					<tr id="info-list">
						<th>ID</th>
						<th>Item</th>
						<th>Código</th>
						<th>Preço</th>
						<th id="acao">Ação</th>
					</tr>
					<?php
					$sql = "SELECT * FROM itens";
					$consulta = mysqli_query($conexao, $sql);
					while($rows = mysqli_fetch_array($consulta)){
					?>
					<tr>
						<td><?php echo $rows['id'];?></td>
						<td><?php echo $rows['item'];?></td>
						<td><?php echo $rows['codigo'];?></td>
						<td>R$ <?php echo number_format($rows['preco'], 2, ',', '.');?></td>
						<td>
						<a href="index.php?id=<?= $rows['id'];?>">
						<button class="btn-acao">Editar</button></a>
						<a href="deletar_item.php?id=<?= $rows['id'];?>">
						<button class="btn-acao">Excluir</button></a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			
		</div>
	</body>
</html>