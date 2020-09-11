<?php
session_start();

include_once('autentica.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    
 
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="estilo/produtos.css">
	  
    <title>Artesanal</title>

    
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
    
    
    <!-- Bootstrap -->
    <link href="bootstrap/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="bootstrap/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="bootstrap/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="bootstrap/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="bootstrap/gentelella-master/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="bootstrap/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="bootstrap/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="bootstrap/gentelella-master/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="bootstrap/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="bootstrap/gentelella-master/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="bootstrap/gentelella-master/build/css/custom.min.css" rel="stylesheet">


  </head>

  <body>
    <?php
      include_once('menu.php');
    ?>
        <div class="right_col" role="main">
        <div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center"></div>
       
        <h3 id="title">Produtos</h3>
          
        <div id="central" name="central">
          <form id="form" name="form">
            <input type="hidden" name="id_prod" id="id_prod">
            <div class="col-sm-6 col-md-4">
            <label for="prod">Produto: </label>
            <input type="text" name="prod" id="prod" class="form-control" placeholder="Produto" autocomplete="off" maxlength="30"><br>
          </div>
          <div class="col-sm-6 col-md-5">
            <label for="desc">Descrição do produto: </label>
            <textarea name="desc" id="desc" cols="80" rows="4" class="form-control"  maxlength="350" placeholder="Descrição do produto" autocomplete="off" disabled="true"></textarea><br>
          </div>
          
          <div class="col-sm-6 col-md-10">
          <div id="separador" style="border: 1px solid grey"></div>
            <label for="tab">Mateiras utilizados: </label>
            <div class="container">
            <div style="border: 2px solid grey">
            <div class = "table-responsive">
                      <table id="tab" class="table table-hover" data-search="true" data-sort-class="table-active" data-sortable="true" data-locale="pt-BR" data-height="550" data-toolbar=".toolbar"
                       data-search="true"  data-show-toggle="true"  data-pagination="true">
                        <thead>
                          <tr>
                            <th >Material</th>
                            <th >Largura</th>
                            <th >Altura</th>
                            <th >Qtde</th>
                          </tr>
                        </thead>
                          <tbody id="tab">
                         
                          </tbody>
                          
                    </table>
                    
          </div>
          </div>
          <input id="addmat" name="addmat" value="Adcionar material" type="button" class="btn btn-success btn-sm" onClick="window.location='add_materiais.php'" disabled= "true">
          <div id="separador" style="border: 1px solid grey"></div>
          <div class="col-sm-6 col-md-3">
            <label for="valc">Valor  custo:  </label>
            <input type="decimal" name="valc" id="valc" class="form-control" placeholder="Valor de custo do produto" disabled="true" autocomplete="off"><br>
          </div>
          
          <div class="col-sm-6 col-md-3">
            <label for="val">Valor Venda:  </label>
            <input type="decimal" name="val" id="val" class="form-control" placeholder="Valor de Venda" disabled="true" autocomplete="off"><br>
          </div>
        
          <div class="col-sm-6 col-md-3">
            <label for="dat">Data da venda:  </label>
            <input type="date" name="dat" id="dat" class="form-control" disabled="true"><br><br>
          </div>
          
          <div class="col-sm-6 col-md-4">
          <input id="enviar" name="enviar" value="Salvar" type="button" class="btn btn-success btn-lg" onClick="validar()" disabled= "true"></input>
          <input id="cancelar" type="reset" class="btn btn-cancel btn-lg" onClick="limpar()" value="Cancelar"></input>
          </div>
          </form>  
        </div> 
        </div>
      </div>
    </div>
    <footer>
    </footer>
    
  </body>
</html>
<!-- jQuery -->
<script src="bootstrap/gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="bootstrap/gentelella-master/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bootstrap/gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="bootstrap/gentelella-master/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="bootstrap/gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="bootstrap/gentelella-master/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="bootstrap/gentelella-master/vendors/moment/min/moment.min.js"></script>
<script src="bootstrap/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="bootstrap/gentelella-master/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="bootstrap/gentelella-master/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="bootstrap/gentelella-master/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="bootstrap/gentelella-master/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="bootstrap/gentelella-master/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="bootstrap/gentelella-master/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="bootstrap/gentelella-master/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="bootstrap/gentelella-master/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="bootstrap/gentelella-master/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="bootstrap/gentelella-master/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="bootstrap/gentelella-master/build/js/custom.min.js"></script>    
<!--Mascaras-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="script/produtos.js"></script>

