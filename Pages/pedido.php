<?php 
session_start();
include_once '../Config/conection.php';
$sql = $conectar->query("SELECT * FROM tb_vendas ORDER BY vendaId DESC LIMIT 1");
$listVenda = $sql->fetch(PDO:: FETCH_OBJ);
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
  <h1><a href="">superPhp - Pedido</a></h1>
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
    <small id="nome-page"><i class="fa fa-shopping-cart"></i> Ultimo pedido</small>
   <?php if(isset($_SESSION['vendaRealizada'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['vendaRealizada'];?>
   </div>
   <?php unset($_SESSION['vendaRealizada']);}?>
    <div class="pull-right">
    <a href="pdv.php">
    <button class="btn btn-primary"><i class="fa fa-plus"></i> Novo Pedido</button></a>
     </div>
      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Pedido</h5>
          </div>
          <div class="widget-content nopadding">
           <table class="table table-bordered">
              <thead>
                <tr>
                  <th id="infor-item">Venda  </th>
                  <th id="infor-item">Valor  </th>
                  <th id="infor-item">Data  </th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX" id="dados-venda">
                  <td><?= $listVenda->vendaId;?></td>
                  <td>R$ <?= number_format($listVenda->vendaValor, 2, ',', '.');?></td>
                  <td><?= $listVenda->vendaData;?></td>
                    <td>
                    <a href="detalheVenda.php?vendaId=<?= $listVenda->vendaId;?>">
                    <i id="icon-venda-del" class="fa fa-eye"></i></a>
                    </td>
                    <td>
                    <a href="#myAlert<?= $listVenda->vendaId;?>" data-toggle="modal">
                    <i id="icon-venda-ex" class="fa fa-trash"></i></a>
                    <!-- modal excluir -->
                    <div id="myAlert<?= $listVenda->vendaId;?>" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Excluir venda</h3>
                        </div>
                          <div class="modal-body text-center">
                          <h4>Tem certeza que quer excluir este registro ?</h4>
                          </div>
                          <div class="modal-footer" id="btn-posicao-modal">
                          <a class="btn btn-primary" href="../Scripts/excluirVenda.php?vendaId=<?= $listVenda->vendaId;?>">
                        <i class="fa fa-thumbs-o-up"></i> Sim Excluir</a>
                       <a data-dismiss="modal" class="btn btn-danger" href="#"><i class="fa fa-thumbs-o-down"></i> Não Cancelar</a> </div>
                    </div>
                  </td>
                </tr>
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
