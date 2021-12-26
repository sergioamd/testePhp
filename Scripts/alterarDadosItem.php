<?php
session_start();
include_once '../Config/conection.php';
$itemId = $_GET['itemId'];
$itemNome = $_POST['itemNome'];
$itemCodigo = $_POST['itemCodigo'];
$itemPreco = $_POST['itemPreco'];
$itemImposto = $_POST['itemImposto'];


$sql = "UPDATE tb_itens SET itemNome=:itemNome, itemCodigo=:itemCodigo, itemPreco=:itemPreco, itemImposto=:itemImposto WHERE itemId = :itemId";

$atualizar = $conectar->prepare($sql);

$atualizar->bindParam(':itemNome', $itemNome);
$atualizar->bindParam(':itemCodigo', $itemCodigo);
$atualizar->bindParam(':itemPreco', $itemPreco);
$atualizar->bindParam(':itemImposto', $itemImposto);
$atualizar->bindParam(':itemId', $itemId);
$atualizar->execute();

if($atualizar > 0){
  $_SESSION['produtoAtualizado'] = "Item atualizado com sucesso!";
  header('location: ../Pages/itens.php');
}else{
    $_SESSION['produtoNaoAtualizado'] = "Erro item não atualizado";
     header('location: ../Pages/itens.php');
}
?>