<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#3CB371;">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link brand-link" >

      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="brand-text" style="color:black;"><img src="" >popuGENElation</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar" style="max-height: 100%;">
    <!-- @if (! Auth::guest())
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="/home" class="d-block"> Olá, {{$primeiroNome[0]}}</a>
             <span class="right badge badge-info">{{Auth::user()->getRoleNames()}}</span> 
          </div>
          <br>
      </div>
    @endif -->
             
      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
          <li class="nav-header" style="color:black;">MENU</li>

          <li class="nav-item">
            <a href="/home" class="nav-link destaque">
                <i class="nav-icon fas fa-project-diagram"></i>
                <span class="texto-estilo">
                    <p>Home</p>
                </span>
            </a>
          </li>
          <li class="nav-item" >
            <a href="/equilibrio/por-geracao" class="nav-link destaque estilo-icon">
                <i class="nav-icon fas fa-balance-scale "></i>
                <span class="texto-estilo">
                  <p>Equilíbrio de</p>
                </span>
                <br>
                <span class="texto-estilo" style="margin-left:16.5%;">
                  <p>Hardy-Weinberg</p>
                </span>
            </a>
              <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/equilibrio/por-geracao" class="nav-link destaque">
                  &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-leaf"></i>
                      <span class="texto-estilo">
                      Calculo por geração
                      </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/equilibrio/todas-geracoes" class="nav-link destaque">
                  &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-seedling"></i>
                      <span class="texto-estilo">
                        Calculo todas gerações
                      </span>
                  </a>
                </li>
              </ul> -->
          </li>
          <li class="nav-item">
            <a href="/sexo" class="nav-link destaque">
              <i class="nav-icon fas fa-transgender"></i>
              <span class="texto-estilo">
                <p>Alelos Ligados ao Sexo </p>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/polialelia" class="nav-link destaque">
              <i class="nav-icon fas fa-tint"></i>
              <span class="texto-estilo"> 
                <p>Polialelia</p>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/poliploidia" class="nav-link destaque">
              <i class="nav-icon fas fa-dna"></i>
              <span class="texto-estilo"> 
                <p>Poliploidia</p>
              </span>
            </a>
          </li>
          <li class="nav-item" >
            <a href="#" class="nav-link destaque estilo-icon">
                <i class="nav-icon fas fa-sitemap"></i>
                <p class="texto-estilo">Seleção Gamética</p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/selecao/completa" class="nav-link destaque">
                  &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-leaf"></i>
                      <span class="texto-estilo">
                        Dominância Completa
                      </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/selecao/incompleta" class="nav-link destaque">
                  &nbsp;&nbsp;&nbsp;<i class="nav-icon fas fa-seedling"></i>
                      <span class="texto-estilo">
                        Dominância Incompleta
                      </span>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item" >
            <a href="#" class="nav-link destaque estilo-icon">
            &nbsp;&nbsp;<i class="fas fa-project-diagram"></i>
                <span class="texto-estilo">
                &nbsp;<p>Mutação</p>
                </span>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/mutacao/recorrente" class="nav-link destaque">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-wave-square"></i>
                      <span class="texto-estilo">
                      &nbsp;Recorrente
                      </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/mutacao/nao-recorrente" class="nav-link destaque">
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-slash"></i>
                      <span class="texto-estilo">
                      &nbsp;&nbsp;&nbsp;Não Recorrente
                      </span>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="/migracao" class="nav-link destaque">
            &nbsp;&nbsp;<i class="fas fa-exchange-alt"></i>
              <span class="texto-estilo"> 
              &nbsp;&nbsp;<p>Migração</p>
              </span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar --> 
  </aside>
