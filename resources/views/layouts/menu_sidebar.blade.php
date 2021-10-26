<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link brand-link">

      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="brand-text"><img src="" >Pop</span>
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
              <a href="#" class="nav-link">
                
                  <p>
                    <i class="fas fa-balance-scale"></i>
                      Equilíbrio de </br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      Hardy-Weinberg
                  </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/equilibrio/por-geracao" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-leaf"></i>
                      <p>
                      Calculo por geração
                      </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/equilibrio/todas-geracoes" class="nav-link">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-seedling"></i>
                      <p>
                        Calculo todas gerações
                      </p>
                  </a>
                </li>
              </ul>
          </li>
         
          <li class="nav-item">
              
              <a href="/sexo" class="nav-link">
              <i class="fas fa-transgender"></i>
                <p>
                  Alelos Ligados ao Sexo
                <p>
              </a>
          </li>
          <li class="nav-item">
              <a href="/polialelia" class="nav-link">
                <i class="fas fa-tint"></i>
                <p>
                  Polialelia
                <p>
              </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
