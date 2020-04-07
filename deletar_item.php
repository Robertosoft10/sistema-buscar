<?php
session_start();
include_once 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM itens WHERE id = '$id'";
$delete = mysqli_query($conexao, $sql);
if($delete > 0){
	$_SESSION['deleteOk'] = "Item deletdado com sucesso";
	header('location: index.php');
}else{
	$_SESSION['deleteErro'] = "Falha ao deletar item";
	header('location: index.php');
}
?>