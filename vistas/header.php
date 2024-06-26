<?php
if (strlen(session_id()) < 1) 
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Optica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

  </head>
  <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">Optica</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Optica</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
          <span class="hidden-xs"></span>
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
               <li class="dropdown user user-menu">
               <a href="#" class="dropdown-toggle">
              <img src="../public/dist/img/logo.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">ASOFT</span>
              </a>
              
               </li>
              <li class="dropdown user user-menu">
                
                <a href="#" class="dropdown-toggle">
                  <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                </a>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li>
              <a href="inicio.php">
                <i class="fa fa-tasks"></i> <span>Inicio</span>
              </a>
            </li>  
            <?php
              if ($_SESSION['agendarcita']==1){
                echo
                '<li class="treeview">
                  <a href="agendarcita.php">
                    <i class="fa fa-user"></i>
                    <span>Agendar Citas</span>
                  </a>
                </li>';
              }
            ?>          
            <?php
            if ($_SESSION['confirmarcita']==1){
              echo
              '<li class="treeview">
                <a href="confirmarcita.php">
                  <i class="fa fa-user"></i>
                  <span>Revisar Citas</span>
                </a>
              </li>';
            }
          ?>          
          <?php
            
              if ($_SESSION['datospaciente']==1){
                echo
                '<li class="treeview">
                  <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Datos de Pacientes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="historia.php"><i class="fa fa-circle-o"></i> Historia Ocular</a></li>
                    <li><a href="exp_funcional.php"><i class="fa fa-circle-o"></i> Exploracion Funcional</a></li>
                    <li><a href="exp_fisica.php"><i class="fa fa-circle-o"></i> Exploracion Fisica</a></li>   
                    <li><a href="ojo.php"><i class="fa fa-circle-o"></i> Ojo</a></li>             
                  </ul>
                </li>';
              }
            ?>
          <?php
              if ($_SESSION['misdatos']==1){
                echo
                '<li class="treeview">
                  <a href="mis_datos.php">
                    <i class="fa fa-user"></i>
                    <span>Mis Datos</span>
                  </a>
                </li>';
              }
            ?>
          <?php
              if ($_SESSION['recetas']==1){
                echo
            '<li class="treeview">
              <a href="#">
                <i class="fa fa-sticky-note"></i>
                <span>Recetas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="receta.php"><i class="fa fa-circle-o"></i> Receta</a></li>                        
              </ul>
            </li>';
          }
            ?>  
            
            <?php
              if ($_SESSION['acceso']==1){
                echo
            '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuarios.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="paciente.php"><i class="fa fa-circle-o"></i> Pacientes</a></li>
                <li><a href="doctor.php"><i class="fa fa-circle-o"></i> Doctores</a></li>
                <!-- <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li> -->
                
              </ul>
            </li>';
              }
            ?>
            <?php
            if ($_SESSION['lentes_opticos']==1){
              echo
              '<li class="treeview">
                <a href="lentesOpticos.php">
                  <i class="fa fa-eye"></i>
                  <span>Lentes Opticos</span>
                </a>
              </li>';
            }
          ?>  
            <li class="treeview">
                  <a href="mi_usuario.php">
                    <i class="fa fa-user"></i>
                    <span>Mi Usuario</span>
                  </a>
                </li>
                
                <li class="treeview">
                <a href="../ajax/usuarios.php?op=salir">
                    <span class='btn btn-danger'>Cerrar Sesion</span>
                  </a>
                </li>
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Consulta Compras</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultacompras.php"><i class="fa fa-circle-o"></i> Consulta Compras</a></li>                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Consulta Ventas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultaventas.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>                
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li> -->
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
