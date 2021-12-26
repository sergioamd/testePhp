<?php 
session_start();
include_once '../Config/conection.php';
$page_primary = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
$page = (!empty($page_primary)) ? $page_primary : 1;
$quant_page_res = 6;
$ini = ($quant_page_res * $page) - $quant_page_res; 
$sql = $conectar->query("SELECT * FROM tb_itens");
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
<body></body>

<!--Header-part-->
<div id="header">
  <h1><a href="">superPhp - Produtos</a></h1>
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
    <small id="nome-page"><i class="fa fa-file-text"></i> Lista de Produtos</small>
  <?php if(isset($_SESSION['itemNaoExcluido'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['itemNaoExcluido'];?>
   </div>
   <?php unset($_SESSION['itemNaoExcluido']);}?>

   <?php if(isset($_SESSION['itemExcluido'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['itemExcluido'];?>
   </div>
   <?php unset($_SESSION['itemExcluido']);}?>

   <?php if(isset($_SESSION['produtoNaoAtualizado'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['produtoNaoAtualizado'];?>
   </div>
   <?php unset($_SESSION['produtoNaoAtualizado']);}?>

    <?php if(isset($_SESSION['produtoAtualizado'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['produtoAtualizado'];?>
   </div>
   <?php unset($_SESSION['produtoAtualizado']);}?>


    <a href="cadastroItem.php">
    <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Novo Produto</button></a>
      <div class="row-fluid">
      <?php while($listItem = $sql->fetch(PDO::FETCH_OBJ)){ ?>
      <div class="span3">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Produto</h5>
          </div>
          <div class="widget-content nopadding">
            <a href="pdv.php?acao=adItem&idItem=<?= $listItem->itemId;?>" id="link-item">
            <table class="table table-bordered">
              <td>
             
                <?='Produto: ', $listItem->itemNome;?> -
                
                R$ <?= number_format($listItem->itemPreco, 2, ',', '.');?><br>
                <?= 'imposto: ', $listItem->itemImposto;?><br>
               <hr>
                 
                <a id="edit-item" href="cadastroItem.php?itemId=<?= $listItem->itemId;?>"> 
                <i class="fa fa-pencil"></i></a>

                <a id="excluir-item"  href="../Scripts/excluirItem.php?itemId=<?= $listItem->itemId;?>">
                <i class="fa fa-trash"></i></a>

              </td>
              </tbody>
            </table>
            </a>
          </div>
        </div>
      </div>
    <?php }?>
      
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2021 &copy;superPhp</div>
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
