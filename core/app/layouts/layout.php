<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Releasix | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    
    <link href="admin/plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/plugins/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="admin/plugins/datatables/dataTables.bootstrap.css">
        
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="admin/plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="admin/plugins/morris/raphael-min.js"></script>
    <script src="admin/plugins/morris/morris.js"></script>
    <link rel="stylesheet" href="admin/plugins/morris/morris.css">
    <link rel="stylesheet" href="admin/plugins/morris/example.css">
    <script src="admin/plugins/jspdf/jspdf.min.js"></script>
    <script src="admin/plugins/jspdf/jspdf.plugin.autotable.js"></script>
    <?php if(isset($_GET["view"]) && $_GET["view"]=="sell"):?>
      <script type="text/javascript" src="admin/plugins/jsqrcode/llqrcode.js"></script>
      <script type="text/javascript" src="admin/plugins/jsqrcode/webqr.js"></script>
    <?php endif;?>
    <link href='admin/plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='admin/plugins/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='admin/plugins/fullcalendar/moment.min.js'></script>
    <script src='admin/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script src='admin/plugins/fullcalendar/locale/es.js'></script>
  </head>
    <script src="admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="admin/plugins/contextmenu/contextmenu.css" rel="stylesheet">
    <script src="admin/plugins/contextmenu/jquery.ui.position.js" type="text/javascript"></script>
    <script src="admin/plugins/contextmenu/contextmenu.js"></script>

  <body class="<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>  skin-blue sidebar-mini <?php else:?>login-page<?php endif; ?>" >
    <div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>R</b>L</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>RELEASIX</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
         <ul class="nav navbar-nav">

                  </ul> 
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class=""><?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name;

                  }?> <b class="caret"></b> </span>

                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
<!--
<div class="user-panel">
            <div class="pull-left image">
              <img src="1.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          -->
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <?php if(isset($_SESSION["user_id"])):?>
                        <li><a href="./index.php?view=home"><i class='fa fa-dashboard'></i> <span>Dashboard</span></a></li>
                        <!--
                        <li><a href="./index.php?view=clendar"><i class='fa fa-calendar'></i> <span>Calendario</span></a></li>
                      -->
                       <li><a href="./index.php?view=licenses"><i class='fa fa-clock-o'></i> <span>Licencias</span></a></li>
 

            <?php elseif(isset($_SESSION["client_id"])):?>
          <?php endif;?>

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    <?php endif;?>

      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
      <div class="content-wrapper">
      <section class="content">
        <?php View::load("index");?>
        </section>
      </div><!-- /.content-wrapper -->

        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.1
        </div>
        <strong>Copyright &copy; 2018 <a href="http://evilnapsis.com/company/" target="_blank">Evilnapsis</a></strong>
      </footer>
      <?php else:?>
<div class="login-box">
      <div class="login-logo">
        <a href="./"><b>RELEASIX</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <center><h4>Admin</h4></center>
        <form action="./?action=processlogin" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" required class="form-control" placeholder="Usuario"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" required class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->  
      <?php endif;?>


    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <!-- AdminLTE App -->
    <script src="admin/plugins/dist/js/app.min.js" type="text/javascript"></script>

    <script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "ordering":false,
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
</html>

