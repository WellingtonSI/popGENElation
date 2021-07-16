<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link brand-link">

      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="brand-text"><img src="" >Treinamento</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    @if (! Auth::guest())
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <?php $primeiroNome = explode(' ', Auth::user()->nome); ?>
            <a href="/home" class="d-block"> Olá, {{$primeiroNome[0]}}</a>
            <!-- <span class="right badge badge-info">{{Auth::user()->getRoleNames()}}</span> -->
          </div>
          <br>
      </div>
      @endif
             
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>

          <li class="nav-item">
            <a href="/home" class="nav-link">
                <i class="nav-icon fas fa-project-diagram"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
           

          <li class="nav-item">
           <a href="{{ url('/logout') }}"  class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="nav-icon fa fa-power-off"></i>  
                    <p>
                        Sair da Conta
                    </p>
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="submit" value="logout" style="display: none;">
            </form>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
