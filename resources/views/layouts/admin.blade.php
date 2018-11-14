<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gimnasio Infantil Da Vinci | Gestión de notas</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{!!asset('css/bootstrap.min.css')!!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!!asset('css/font-awesome.css')!!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!!asset('css/AdminLTE.min.css')!!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!!asset('css/_all-skins.min.css')!!}">
    <link rel="apple-touch-icon" href="{!!asset('img/apple-touch-icon.png')!!}">
    <link rel="shortcut icon" href="{!!asset('img/favicon.ico')!!}">
    <link rel="stylesheet" href="{!!asset('css/estilos.css')!!}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  </head>
  @guest
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse" onload="cargar()">
  @else
    <body class="hold-transition skin-blue sidebar-mini" onload="cargar()">
  @endif
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>GIDV</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="/img/logojardin.png" width="30" height="30"/><b>Gestión de notas</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" name="sidebartoggler" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
                  @guest
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                    <!--<li><a href="{{ route('register') }}">Register</a></li>-->
                    @else
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" aria-haspopup="true" v-pre>
                              <small class="bg-green">Online</small>
                                {{ Auth::user()->name }} {{ Auth::user()->us_apellido }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      Software gestor de notas - Ricardo Franco Rios
                      <small>Proyecto de mejora empresarial</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
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
        @guest
        @else
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          @if($rol=Auth::user()->us_idRolFK==3)
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>Boletines</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="calificaciones"><i class="fa fa-circle-o"></i>Calificaciones</a></li>
              </ul>
            </li>
                                 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> <span>Configuración</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('estudiantes')}}"><i class="fa fa-circle-o"></i> Estudiantes</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda </span><small class="label pull-middle bg-red">PDF</small><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#ManualDocente"><i class="fa fa-circle-o"></i> Manual Docentes</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">Proyecto</small>
              </a>
            </li>       
          </ul>
          @else
          <ul class="sidebar-menu">
            <li class="header">Sistema de calificaciones</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list" aria-hidden="true"></i>
                <span>Boletines</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="boletines"><i class="fa fa-circle-o"></i> Generar boletines</a></li>
                <li><a href="calificaciones"><i class="fa fa-circle-o"></i> Calificaciones</a></li>
              </ul>
            </li>
                                 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog" aria-hidden="true"></i> <span>Configuración</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('competencias')}}"><i class="fa fa-circle-o"></i> Competencias</a></li>
                <li><a href="{{url('cursos')}}"><i class="fa fa-circle-o"></i> Cursos</a></li>
                <li><a href="{{url('estudiantes')}}"><i class="fa fa-circle-o"></i> Estudiantes</a></li>
                <li><a href="{{url('grados')}}"><i class="fa fa-circle-o"></i> Grados</a></li>
                <li><a href="{{url('materias')}}"><i class="fa fa-circle-o"></i> Materias</a></li>
                <li><a href="{{url('notas')}}"><i class="fa fa-circle-o"></i> Notas</a></li>
                <li><a href="{{url('observaciones')}}"><i class="fa fa-circle-o"></i> Observaciones</a></li>
                <li><a href="{{url('periodos')}}"><i class="fa fa-circle-o"></i> Periodos</a></li>
                <li><a href="{{url('procesos')}}"><i class="fa fa-circle-o"></i> Procesos</a></li>
                <li><a href="{{url('roles')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
                <li><a href="{{url('tipoDocumentos')}}"><i class="fa fa-circle-o"></i>Tipo de Documento</a></li>
                <li><a href="{{url('tipoObservaciones')}}"><i class="fa fa-circle-o"></i>Tipo de Observacion</a></li>
                <li><a href="{{url('usuarios')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda </span><small class="label pull-middle bg-red">PDF</small><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#ManualDirectivos"><i class="fa fa-circle-o"></i> Manual Directivos</a></li>
                <li><a href="#ManualDocente"><i class="fa fa-circle-o"></i> Manual Docentes</a></li>
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">Proyecto</small>
              </a>
            </li>       
          </ul>
          @endif
        </section>
        @endguest
        <!-- /.sidebar -->
      </aside>

       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Registro de Notas </h3>
                  <div class="box-tools pull-right">
                    <a class="btn btn-success" href="{{ URL::previous() }}">Volver</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                  	     <div class="row">
	                  	      <div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')
		                          <!--Fin Contenido-->
                            </div>
                          </div>
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2020 Ricardo Franco Rios.</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    <!--Funciones-->
    <script src="{{ asset('js/funciones.js') }}"></script>
    
  </body>
</html>