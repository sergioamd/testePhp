<?php
session_start();
include_once '../Config/conection.php';

$itemNome = $_POST['itemNome'];
$itemCodigo = $_POST['itemCodigo'];
$itemPreco = $_POST['itemPreco'];
$itemImposto = $_POST['itemImposto'];
$descricao = $_POST['descricao'];


$sql = "INSERT INTO tb_itens (itemNome, itemCodigo, itemPreco, itemImposto, descricao)VALUES(:itemNome, :itemCodigo, :itemPreco, :itemImposto, :descricao)";

$cadastrar = $conectar->prepare($sql);

$cadastrar->bindParam(':itemNome', $itemNome);
$cadastrar->bindParam(':itemCodigo', $itemCodigo);
$cadastrar->bindParam(':itemPreco', $itemPreco);
$cadastrar->bindParam(':itemImposto', $itemImposto);
$cadastrar->bindParam(':descricao', $descricao);



$cadastrar->execute();

if($cadastrar > 0){
  $_SESSION['produtoCatrastrado'] = "Item cadastrado com sucesso!";
  header('location: ../Pages/cadastroItem.php');
}else{
    $_SESSION['produtoNaoCatrastrado'] = "Preencha todos os campos obrigatórios";
     header('location: ../Pages/cadastroItem.php');
}
?>