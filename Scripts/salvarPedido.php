<?php
session_start();

 if(count($_SESSION['pdv']) == 0){
    }else{
	require_once '../Config/conection.php';
    $somaValorItem = 0;
    foreach($_SESSION['pdv'] as $idItem => $quantidade){
    $sql   = mysqli_query($conection, "SELECT * FROM tb_itens WHERE idItem= '$idItem'");
    $linha    = mysqli_fetch_assoc($sql);
    $subTotal = $linha['itemPreco'] * $quantidade;
    $somaValorItem += $linha['itemPreco'] * $quantidade;
		}
	}
	 foreach($_SESSION['pdv'] as $idItem => $quantidade){
		 $sql = "INSERT INTO pedido(item, quant, valor, data)
					VALUES('$idItem', '$quantidade', '$somaValorItem', NOW())";
		$insert = mysqli_query($conection, $sql);
					
		$_SESSION['pedOk'] = "Pedido realizado com sucesso! Finalize sua compra";
		//header('location: ../Pags/pedido.php');
					
	 }

?>