<?php
session_start();
include_once 'conexao.php';
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
			<a id="pagina" href="index.php">Voltar para Home</a>
				<h2>Sistema de Busca</h2>
				<?php 
				$rows = 0;
				$codigo = $_POST['codigo'];
				$item = $_POST['item'];
				
				if(isset($_POST['codigo']) && isset($_POST['item'])){
					$sql = "SELECT * FROM itens WHERE codigo LIKE '%$codigo%' or item LIKE '%$item%'";
					$consulta = mysqli_query($conexao, $sql);
					$rows = mysqli_fetch_array($consulta);
					echo "Intem com o código $codigo, e nome $item encontrado";
					
					}elseif(isset($_POST['codigo'])){
					$sql = "SELECT * FROM itens WHERE codigo LIKE '%$codigo%'";
					$consulta = mysqli_query($conexao, $sql);
					$rows = mysqli_fetch_array($consulta);
					echo "Intem com o código $codigo encontrado";
					
					}elseif(isset($_POST['item'])){
					$sql = "SELECT * FROM itens WHERE item LIKE '%$item%'";
					$consulta = mysqli_query($conexao, $sql);
					$rows = mysqli_fetch_array($consulta);
					echo "Intem com o nome $item encontrado";
					}
				?>
				
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
					 if($rows > 0) {
					while($linha = mysqli_fetch_array($consulta)){
					?>
					<tr>
						<td><?php echo $linha['id'];?></td>
						<td><?php echo $linha['item'];?></td>
						<td><?php echo $linha['codigo'];?></td>
						<td>R$ <?php echo number_format($linha['preco'], 2, ',', '.');?></td>
						<td>
						<a href="index.php?id=<?= $linha['id'];?>">
						<button class="btn-acao">Editar</button></a>
						<a href="deletar_item.php?id=<?= $linha['id'];?>">
						<button class="btn-acao">Excluir</button></a>
						</td>
					</tr>
					<?php
					}
					}else{
						echo "Nada encontrado tente novamente!";
					}
					?>
				</table>
			</div>
			
		</div>
	</body>
</html>