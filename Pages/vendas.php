<?php 
session_start();
include_once '../Config/conection.php';
$sql = $conectar->query("SELECT * FROM tb_vendas");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>superPhp</title>
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
  <h1><a href="">Admin - PDV</a></h1>
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
    <small id="nome-page"><i class="fa fa-shopping-bag"></i> Lista de Vendas</small>
    <?php if(isset($_SESSION['vendaNaoExcluido'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['vendaNaoExcluido'];?>
   </div>
   <?php unset($_SESSION['vendaNaoExcluido']);}?>

   <?php if(isset($_SESSION['vendaExcluido'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['vendaExcluido'];?>
   </div>
   <?php unset($_SESSION['vendaExcluido']);}?>
    <div class="pull-right">
    <a href="pdv.php">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> Nova Venda</button></a>
     </div>
      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Vendas</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th id="infor-item">Venda <i class="fa fa-sort"></i> </th>
                  <th id="infor-item">Valor <i class="fa fa-sort"></i> </th>
                  <th id="infor-item">Data <i class="fa fa-sort"></i> </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php while($listVenda = $sql->fetch(PDO:: FETCH_OBJ)){?>
                <tr class="gradeX" id="dados-venda">
                  <td><?= $listVenda->vendaId;?></td>
                  <td>R$ <?= number_format($listVenda->vendaValor, 2, ',', '.');?></td>
                  <td><?= $listVenda->vendaData;?></td>
                  
                    <td>
                    <a href="detalheVenda.php?vendaId=<?= $listVenda->vendaId;?>">
                    <i id="icon-venda-del" class="fa fa-eye"></i></a>
                    </td>
                    <td>
                    <a href="../Scripts/excluirVenda.php?vendaId=<?= $listVenda->vendaId;?>">
                    <i id="icon-venda-ex" class="fa fa-trash"></i></a>
                                       
                  </td>
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
