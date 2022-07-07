<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administração</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style-custom.css')}}">
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>   
    </ul>
    <ul class="navbar-nav ml-auto">
    <a href="{{route('admin.logout')}}" class="btn btn-warning">Sair do Sistema</a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link  @if(request()->is('/')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('customers.index') }}" class="nav-link @if(request()->is('admin/customers*')) active @endif ">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Clientes</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('os.index') }}" class="nav-link @if(request()->is('admin/os*')) active @endif">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>Ordens de Serviço
              </p>
            </a>
          </li>




          <li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(request()->is('admin/reports*')) active @endif">
              <i class="nav-icon fas fa-copy"></i>
              <p> Relatório
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">   
              <li class="nav-item">
                <a href="{{route('admin.reports.index')}}" class="nav-link">
                  <i class="fas fa-calendar nav-icon"></i>
                  <p>Por Data</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.reports.customers.all')}}" target="_blank" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
             

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link @if(request()->is('admin/reports/os* ')) active @endif">
                  <i class="fas fa-clipboard nav-icon"></i>
                  <p>
                  Ordens de Serviço
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('admin.reports.os.all')}}" target="_blank" class="nav-link @if(request()->is('admin/reports/os/all')) active @endif">
                      <i class="fas fa-file-invoice nav-icon"></i>
                      <p>Todas OS</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('admin.reports.os.cancel')}}" target="_blank" class="nav-link @if(request()->is('admin/reports/os/cancel')) active @endif">
                      <i class="fas fa-file-excel nav-icon"></i>
                      <p>OS Cancelada</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('admin.reports.ospeding')}}" target="_blank" class="nav-link @if(request()->is('admin/reports/os/ospeding')) active @endif">
                      <i class="fas fa-file-powerpoint nav-icon"></i>
                      <p>OS Pendente</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="{{route('admin.reports.oswaiting')}}" target="_blank" class="nav-link @if(request()->is('admin/reports/os/oswaiting')) active @endif">
                      <i class="fas fa-file-invoice-dollar nav-icon"></i>
                      <p>OS Aguardando Pagamento</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('admin.reports.os.progress')}}" target="_blank" class="nav-link @if(request()->is('admin/reports/os/progress')) active @endif">
                      <i class="fas fa-file-alt nav-icon"></i>
                      <p>OS Em Andamento</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('admin.reports.os.finished')}}" target="_blank" class="nav-link @if(request()->is('admin/reports/os/finished')) active @endif">
                      <i class="fas fa-file nav-icon"></i>
                      <p>OS Encerrada</p>
                    </a>
                  </li>

                </ul>
              </li>

            </ul>
          </li>



          @if((auth()->user()->level == 'admin') or (auth()->user()->level == 'super'))
          <li class="nav-item has-treeview">
            <a href="" class="nav-link @if(request()->is('admin/settings*')) active @endif">
              <i class="nav-icon fas fa-tools"></i>
              <p> Configurações
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">   
              <li class="nav-item">
                <a href="{{route('admin.settings.users.index')}}" class="nav-link @if(request()->is('admin/settings/users*')) active @endif">
                  <i class="fas fa-user-circle nav-icon"></i>
                  <p>Usuários</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/settings/backup/index" class="nav-link">
                  <i class="fas fa-database nav-icon"></i>
                  <p>Backups</p>
                </a>
              </li>
           
                </ul>
              </li>

            </ul>
          </li>
          @endif
        
        
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include('flash::message')


  @yield('content')
 
   
  </div>

 


  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!--Scripts-->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>

