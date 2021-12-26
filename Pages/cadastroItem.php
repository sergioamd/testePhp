<?php 
session_start();
ini_set('display_errors', 0 );
error_reporting(0);
include_once '../Config/conection.php';
$itemId = $_GET['itemId'];
$sql = $conectar->query("SELECT * FROM tb_itens WHERE itemId = '$itemId'");
$item = $sql->fetch(PDO::FETCH_OBJ);
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
  <h1><a href="">superPhp - Cadastro Produtos</a></h1>
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
  <small id="nome-page"><i class="fa fa-codepen"></i> Produto</small>
  <?php if(isset($_SESSION['produtoNaoCatrastrado'])){?>
  <div class="alert alert-danger">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['produtoNaoCatrastrado'];?>
   </div>

   <?php unset($_SESSION['produtoNaoCatrastrado']);}?>

   <?php if(isset($_SESSION['produtoCatrastrado'])){?>
  <div class="alert alert-success">
  <button class="close" data-dismiss="alert">×</button>
  <?= $_SESSION['produtoCatrastrado'];?>
   </div>
   <?php unset($_SESSION['produtoCatrastrado']);}?>
  <div class="row-fluid">

    <?php if(!isset($_GET['itemId'])){?>
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title">
          <h5  style="color: #ffffff;">Cadastrar Produtos</h5>
        </div>

        <div class="widget-content nopadding">
          <form action="../Scripts/cadastrarItem.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Nome *</label>
              <div class="controls">
                <input type="text" class="span11" name="itemNome" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Código *</label>
              <div class="controls">
                <input type="text" class="span11" name="itemCodigo" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Preço *</label>
              <div class="controls">
                <input type="text" class="span11"  name="itemPreco" placeholder="Ex: 1 ou 1.20 Não usar virgula usar ponto" required="" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">imposto</label>
              <div class="controls">
                <input type="text" class="span11" name="itemImposto"  required="" />
              </div>
            </div>
              
            <div class="form-actions">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cadastrar</button>
            </div>
            </form>

        <?php }else{?>
        <div class="span7">
        <div class="widget-box">
          <div class="widget-title">
            <h5 style="color: #ffffff;">Alterar Produto</h5>
          </div>

          <div class="widget-content nopadding">
           <form action="../Scripts/alterarDadosItem.php?itemId=<?= $item->itemId;?>" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nome </label>
              <div class="controls">
                <input type="text" class="span11" name="itemNome"
                value="<?= $item->itemNome;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Código </label>
              <div class="controls">
                <input type="text" class="span11" name="itemCodigo"
                value="<?= $item->itemCodigo;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Preço </label>
              <div class="controls">
                <input type="text" class="span11"  name="itemPreco"
                 value="<?= $item->itemPreco;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Imposto R$</label>
              <div class="controls">
                <input type="text"  class="span11" name="itemPeso" value="<?= $item->itemImposto;?>"/>
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>  Salvar</button>
            </div>
          </form>
          </div>

        </div>
      </div>
      
        <?php } ?>
        </div>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2021 &copy; SuperPhp</div>
</div>
<!--end-Footer-part--> 
<script src="../Componets/js/jquery.min.js"></script> 
<script src="../Componets/js/jquery.ui.custom.js"></script> 
<script src="../Componets/js/bootstrap.min.js"></script> 
<script src="../Componets/js/bootstrap-colorpicker.js"></script> 
<script src="../Componets/js/bootstrap-datepicker.js"></script> 
<script src="../Componets/js/jquery.toggle.buttons.js"></script> 
<script src="../Componets/js/masked.js"></script> 
<script src="../Componets/js/jquery.uniform.js"></script> 
<script src="../Componets/js/select2.min.js"></script> 
<script src="../Componets/js/matrix.js"></script> 
<script src="../Componets/js/matrix.form_common.js"></script> 
<script src="../Componets/js/wysihtml5-0.3.0.js"></script> 
<script src="../Componets/js/jquery.peity.min.js"></script> 
<script src="../Componets/js/bootstrap-wysihtml5.js"></script> 
</body>
</html>

