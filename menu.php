<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="inicial.php" class="site_title"><img src="imagens/logo50.jpg" ></img> <span>ArtesAna</span></a>
            </div>
            <div class="clearfix"></div>

            <div class="profile clearfix"><!--
                <div class="profile_pic">
                    <img src="imagens/rosto.jpg"  class="img-circle profile_img">
                </div> -->
                <div class="profile_info">
                    <span>Bem vindo!</span>
                    <h2><?php echo $_SESSION['usuario']['usu']?></h2>
                    <h6>Nivel: <?php 
                    if ($_SESSION['usuario']['niv'] == 0) {
                        echo "Usuário";
                    }else{
                        echo "Administrador";
                    }?></h6>
                </div>
            </div>

            <br />

          
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                
                    <ul class="nav side-menu">
                    <li><a href="inicial.php"><i class="fa fa-home"></i> Pagina Inicial </a></li>
                    <li><a><i class="fa fa-edit"></i> Menu do sistema <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="listaClientes.php">Cliente</a></li>
                        <li><a href="listaProdutos.php">Produtos</a></li>
                        <li><a href="listaMateriais.php">Materiais</a></li>
                        <li><a href="financeiro.php">Financeiro</a></li>
                        <li><a href="usuario.php">Usuários</a></li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
 
            <div class="sidebar-footer hidden-small">
            <!--
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a> -->
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            
        </div>
    </div>

</body>