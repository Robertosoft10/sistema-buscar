<?php
session_start();
include_once 'conexao.php';

$id = $_GET['id'];
$item = $_POST['item'];
$codigo = $_POST['codigo'];
$preco = $_POST['preco'];

$sql = "UPDATE itens SET item='$item', codigo='$codigo', preco='$preco' WHERE id = '$id'";
$update = mysqli_query($conexao, $sql);
if($update > 0){
	$_SESSION['updateOk'] = "Item atualizado com sucesso";
	header('location: index.php');
}else{
	$_SESSION['updateErro'] = "Falha ao atualizar item";
	header('location: index.php');
}
?>