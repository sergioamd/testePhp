<?php
session_start();
include_once '../Config/conection.php';
$vendaId = $_GET['vendaId'];

$excluir = $conectar->prepare("DELETE FROM tb_vendas, tb_itens_venda
    USING tb_vendas
    INNER JOIN tb_itens_venda
    WHERE tb_vendas.vendaId = tb_itens_venda.vendaCodigo
    AND tb_vendas.vendaId = $vendaId");

if($excluir == true){
	$_SESSION['vendaExcluido'] = "Venda excluido com sucesso!";
	header('location: ../Pages/vendas.php');
}else{
		$_SESSION['vendaNaoExcluido'] = "Erro venda não excluido!";
	header('location: ../Pages/vendas.php');
}
?>