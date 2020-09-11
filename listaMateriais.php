<?php

session_start();
include_once('connect.php');
include_once('autentica.php');

$sql = "SELECT t.tipo_mat, m.desc_mat, m.largura, m.valor, m.id_material FROM materiais as m left join tipo_mat as t  on m.id_tipo = t.id_tipo_mat;";
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>

    
 
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Artesanal</title>
    
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"/>
 
    <!-- Bootstrap -->
    <link href="bootstrap/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="bootstrap/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="bootstrap/gentelella-master/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo/listaMateriais.css">

  </head>

  <body>
    <?php
      include_once('menu.php');
    ?>
        <div class="right_col" role="main">
        <div id="msg" class="alert alert-success fade show" role="alert" style="opacity:0; text-align: center"></div>


          <h3>Lista de Materiais</h3>
          <div class="clearfix"></div>

          <!--img src="imagens/rolling.gif" id="loading-indicator" style="display:none;"/-->
          <div class="content">
            <div class="animated fadeIn">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <!--div class="card-body col-sm-12 col-xs-12"-->
                    <div class = "table-responsive">
                      <table id="id_table_usuario" class="table table-hover" data-search="true" data-sort-class="table-active" data-sortable="true" data-locale="pt-BR" data-height="550" data-toolbar=".toolbar" data-search="true"  data-show-toggle="true"  data-pagination="true">
                        <thead>
                          <tr>
                            <th>Material</th>
                            <th >Descrição</th>
                            <th >Comp \ Largura</th>
                            <th >Valor</th>
                          </tr>
                        </thead>
                          <tbody>
                          <?php 
                          $row = mysqli_num_rows($result);
                          if ($row > 0) {
                            while ($dados = $result->fetch_array()) {?>
                              
                              <tr>
                                <td><?php echo $dados['tipo_mat']; ?></td>
                                <td><?php echo $dados['desc_mat']; ?></td>
                                <td><?php echo $dados['largura']; ?></td>
                                <td><?php echo $dados['valor']; ?></td>
                               
                                <td><button class="btn btn-primary btn-sm" onclick="editar(<?php echo $dados['id_material'];?>)"><i class="fa fa-pencil"></i></button>
                                <button id="mod" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop" onClick="excluir(<?php echo $dados['id_material'];?>)"><i class="fa fa-trash"></i></button></td>
                              </tr><?php 
                            }}else {?>
                              <td id="tdnull"colspan="4">Nenhum material Cadastrado</td><?php
                            }?>
                          </tbody>
                    </table>
                    <button onclick="window.location = 'materiais.php'" class="btn btn-success btn-lg"><i class="fa fa-plus-square"></i> </button>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="theModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                  </div>
                </div>
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
<!-- jQuery format Money -->
<script src="//raw.github.com/plentz/jquery-maskmoney/master/jquery.maskMoney.js" type="text/javascript"></script>
<script src="script/listaMateriais.js"></script>
