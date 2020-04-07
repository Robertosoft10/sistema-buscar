<?php
session_start();
include_once 'conexao.php';

$item = $_POST['item'];
$codigo = $_POST['codigo'];
$preco = $_POST['preco'];

$sql = "INSERT INTO itens (item, codigo, preco)VALUES('$item', '$codigo', '$preco')";
$insrt = mysqli_query($conexao, $sql);
if($insrt > 0){
	$_SESSION['itemOk'] = "Item cadastro com sucesso";
	header('location: index.php');
}else{
	$_SESSION['itemErro'] = "Falha no cadasto do item";
	header('location: index.php');
}
?>