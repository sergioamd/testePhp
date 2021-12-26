<?php
session_start();



include_once '../Config/conection.php';
 if(count($_SESSION['pdv']) == 0){
    }else{
   $somaValorItem = 0;
   foreach($_SESSION['pdv'] as $itemId => $quantidade){
   $sql   = $conectar->query("SELECT * FROM tb_itens WHERE itemId= '$itemId'");
   $listItem    = $sql->fetch(PDO::FETCH_OBJ);
   $subTotal = $listItem->itemPreco * $quantidade;
   $somaValorItem += $listItem->itemPreco * $quantidade;
   $vrImposto = (($subTotal * $listItem->itemImposto)/100);
   $somaImposto += $vrImposto + $subTotal;
       

        }
       date_default_timezone_set('America/Sao_Paulo');
        $vendaData =  date('d/m/Y \à\s H:i:s');
        $vendaData = date('d-m-y h:i:s A');
        $sql = "INSERT INTO tb_vendas(vendaValor, vendaImposto, vendaData)
                    VALUES(:vendaValor, :vendaImposto, :vendaData)";
        $cadastro = $conectar->prepare($sql);
        $cadastro->bindParam(':vendaValor', $somaValorItem);
        $cadastro->bindParam(':vendaImposto', $somaImposto);
        $cadastro->bindParam(':vendaData', $vendaData);
        $cadastro->execute();
        $vendaCodigo = $conectar->lastInsertId();
    }
    foreach($_SESSION['pdv'] as $itemId => $quantidade){
      $sql = "INSERT INTO tb_itens_venda(vendaCodigo, itemVenda, itemQuant)
                    VALUES(:vendaCodigo, :itemId, :quantidade)";
        $cadastro = $conectar->prepare($sql);
        $cadastro->bindParam(':vendaCodigo', $vendaCodigo);
        $cadastro->bindParam(':itemId', $itemId);
        $cadastro->bindParam(':quantidade', $quantidade);
        $cadastro->execute();
        $_SESSION['vendaRealizada'] = "Venda realizada coom sucesso";
        header('location: ../Pages/pedido.php');
    }
?>