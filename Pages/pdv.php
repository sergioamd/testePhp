<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
if(!isset($_SESSION['pdv'])){
    $_SESSION['pdv'] = array();
}
if(isset($_GET['acao'])){
  if($_GET['acao'] == 'adItem'){
      $idItem = intval($_GET['idItem']);
      if(!isset($_SESSION['pdv'][$idItem])){
          $_SESSION['pdv'][$idItem] = 1;
      }else{
        $_SESSION['pdv'][$idItem] += 1;
      }
  }
   if($_GET['acao'] == 'atualizarQtd'){
          if(is_array(@$_POST['atualizar'])){
            foreach($_POST['atualizar'] as $idItem => $quantidade) {
              $idItem = intval($idItem);
              $quantidade = intval($quantidade);
              if(!empty($quantProduto) || $quantidade <> 0){
                $_SESSION['pdv'][$idItem] = $quantidade;
              }else{
                unset($_SESSION['pdv'][$idItem]);
              }
            }
          }
      }
      if($_GET['acao'] == 'deleleItem'){
          $idItem = intval($_GET['idItem']);
          if(isset($_SESSION['pdv'][$idItem])){
            unset($_SESSION['pdv'][$idItem]);
          }
      }
       if($_GET['acao'] == 'cancelar'){
          unset($_SESSION['pdv']);
      }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>superPhp - PDV</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../Componets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../Componets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../Componets/css/uniform.css" />
<link rel="stylesheet" href="../Componets/css/select2.css" />
<link rel="stylesheet" href="../Componets/css/matrix-style.css" />
<link rel="stylesheet" href="../Componets/css/matrix-media.css" />
<link href="../Componets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="../Componets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../Componets/style.css">
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="">superPhp - PDV</a></h1>
</div>
<!--close-Header-part--> 

<div id="sidebar">
  <ul>
    <li><a  id="link-left" href="pdv.php"><i class="fa fa-shopping-cart"></i> <span>Pdv</span></a> </li>
    <li><a id="link-left" href="produto.php"><i class="fa fa-barcode"></i> <span>Produtos</span></a> </li>
    <li><a id="link-left" href="vendas.php"><i class="fa fa-shopping-bag"></i> <span>Vendas</span></a> </li>
    
  </ul>
</div>
<div id="content">
  <div id="content-header">
  </div>
  <div class="container-fluid">
    <hr>
    <small id="nome-page"><i class="fa fa-shopping-cart"></i> PDV</small>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;font-size: 13pt;">Vendas</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th id="infor-item">Item</th>
                  <th id="infor-item">Imposto</th>
                  <th id="infor-item">Preço</th>
                  <th id="infor-item">Quant</th>
                  <th id="infor-item">SubTotal</th>
                  <th></th>
                </tr>
              </thead>
              <form  action="?acao=atualizarQtd" method="post">
              <tfoot>
                <tr>
              <td colspan="6">
              <tbody>
                <tr class="odd gradeX">
                  <?php if(count($_SESSION['pdv']) == 0){?>
                    <hr>
                   <small id="alet-pdv"> PDV Livre</small>
                 <?php }else{
                  require_once '../Config/conection.php';
                  $somaValorItem = 0;
                   foreach($_SESSION['pdv'] as $itemId => $quantidade){
                   $sql   = $conectar->query("SELECT * FROM tb_itens WHERE itemId= '$itemId'");
                  $listItem    = $sql->fetch(PDO::FETCH_OBJ);
                  $subTotal = $listItem->itemPreco * $quantidade;
                  $somaValorItem += $listItem->itemPreco * $quantidade;
                  $vrImposto = (($subTotal * $listItem->itemImposto)/100);
                  $somaImposto += $vrImposto + $subTotal;
                  echo '<tr id="item-pdv">
                  <td>'.$listItem->itemNome.'</td>
                  <td>'.$listItem->itemImposto.'</td>
                  <td>R$ '.number_format($listItem->itemPreco, 2, ',', '.').'</td>
                  <td  id="quant-td"><input id="quant" type="text" name="atualizar['.$itemId.']" value="'.$quantidade.'"></td>
                  <td>R$ '.number_format($subTotal, 2, ',', '.').'</td>
                  <td>
                   <a href="?acao=deleleItem&idItem='.$itemId.'">
                  <i id="icon-pdv" class="fa fa-trash"></i></a>
                  </td>
                  </tr>';
                      }
                    }
                  ?>
                <tr>
                  <td id="total" colspan="6">Total: R$ <?= number_format($somaValorItem, 2, ',', '.');?> </td>
                </tr>
                <tr>
                <td id="total" colspan="6">Total c/Impostos: R$ <?= number_format($somaImposto, 2, ',', '.');?> </td>
                </tr>
                <tr>              
                  <td>
                  <button class="btn btn-info"><i class="fa fa-refresh"></i>  Atualizar<br> Quant</button>
                  </form>
                </td>
                <?php if(isset($itemId)){?>   
                <td>
                  <form action="../Scripts/salvarPdv.php" method="post">
                   <button class="btn btn-success"><i class="fa fa-save"></i> Finalizar esse <br>Pedido</button>
                   </form>
                 </td>
                 <td>
                   <a href="?acao=cancelar&idItem='.$idItem.'">
                    <button class="btn btn-danger"><i class="fa fa-remove"></i> Limpar <br>Carrinho</button></a>
                  </td>
                  <td>
                    <a href="produto.php">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar <br> Produto</button></a>
                  </td>
                <?php }else{?>
                  <td>
                    <a href="produto.php">
                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar <br>Produto</button></a>
                  </td>
                <?php } ?>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2021 &copy; superPhp</div>
</div>
<!--end-Footer-part-->
<script src="../Componets/js/jquery.min.js"></script> 
<script src="../Componets/js/jquery.ui.custom.js"></script> 
<script src="../Componets/js/bootstrap.min.js"></script> 
<script src="../Componets/js/jquery.uniform.js"></script> 
<script src="../Componets/js/select2.min.js"></script> 
<script src="../Componets/js/jquery.dataTables.min.js"></script> 
<script src="../Componets/js/matrix.js"></script> 
<script src="../Componets/js/matrix.tables.js"></script>
</body>
</html>
