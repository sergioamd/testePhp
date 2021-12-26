<?php 
session_start();
include_once '../Config/conection.php';
$vendaId = $_GET['vendaId'];
$sql = $conectar->query("SELECT * FROM tb_vendas WHERE vendaId = '$vendaId'");
$venda = $sql->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>SuperPhp - Venda</title>
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
  <h1><a href="">superPhp- PDV</a></h1>
</div>
<!--close-Header-part--> 
<!--top-Header-menu-->

<!--start-top-serch-->
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
    <small id="nome-page"><i class="fa fa-shopping-bag"></i> Detalhe da venda</small>
     <div class="pull-right">
    <a href="pdv.php">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> Nova Venda</button></a>
     </div>
      <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Venda</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered">
                <td id="venda-det">
                  Venda: <?= $venda->vendaId;?> |
                  Valor: R$ <?= number_format($venda->vendaValor, 2, ',', '.');?> |
                  Data: <?= $venda->vendaData;?>
                </td>
              </tbody>
            </table>
             <table class="table table-bordered">
               <?php
              $sql = $conectar->query("SELECT * FROM tb_itens_venda ITV  JOIN tb_vendas VD ON ITV.vendaCodigo = VD.vendaId JOIN tb_itens I ON ITV.itemVenda = I.itemId WHERE vendaId = '$vendaId'");
                while($itemVenda = $sql->fetch(PDO::FETCH_OBJ)){?>
               <tr  id="item-venda">
                <td><?= $itemVenda->itemNome;?></td>
                <td>R$ <?= number_format($itemVenda->itemPreco, 2, ',', '.');?></td>
                <td><?= $itemVenda->itemQuant;?></td>
              </tr>
            <?php }?>
            
              </tbody>
            </table>
          </div>
        </div>
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
