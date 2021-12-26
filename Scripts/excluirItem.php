<?php
session_start();
include_once '../Config/conection.php';
$itemId = $_GET['itemId'];
$excluir = $conectar->prepare("DELETE FROM tb_itens WHERE itemId=:itemId");
$excluir->bindValue(":itemId", $itemId);
$excluir->execute();
if($excluir == true){
	$_SESSION['itemExcluido'] = "Item excluido com sucesso!";
	header('location: ../Pages/produto.php');
}else{
		$_SESSION['itemNaoExcluido'] = "Erro item não excluido!";
	header('location: ../Pages/produto.php');
}
?>