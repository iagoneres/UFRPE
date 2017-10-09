<div class="wrapper">

    <div class="sidebar" data-color="green" >
    <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

          Tip 2: you can also add an image using data-image tag
          data-image="<?php //echo BASEURL; ?>assets/img/sidebar-5.png"
      -->

    <div class="logo">
      <a href="" class="simple-text">
        SmartOutlook
      </a>
    </div>

      <div class="sidebar-wrapper">
            <ul class="nav">
              <li>
                <a href="<? echo DASHBOARD; ?>">
                  <i class="fa fa-pie-chart " aria-hidden="true"></i>
                  <p>Painel de Controle</p>
                </a>
              </li>
              <li>
                <a href="<? echo OCCURRENCES; ?>">
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                  <p>Ocorrências</p>
                </a>
              </li>
              <li>
                <a href="<? echo PROFILE; ?>">
                  <i class="fa fa-address-card-o" aria-hidden="true"></i>
                  <p>Perfil</p>
                </a>
              </li>
              <li>
                <a href="<? echo  SIMULATIONS?>">
                  <i class="fa fa-cogs" aria-hidden="true"></i>
                  <p>Simulações</p>
                </a>
              </li>
              <!-- <li>
                <a href="<? echo NOTIFICATIONS; ?>">
                  <i class="fa fa-bell" aria-hidden="true"></i>
                  <p>Notificações</p>
                </a>
              </li> -->
            </ul>
      </div>
    </div>

    <div class="main-panel">
      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $PAGE ?></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

              <!-- <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="badge">0</span>
                  <i class="fa fa-bell" aria-hidden="true"></i>
                  <p class="hidden-lg hidden-md">Notificações</p>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Teste 1</a></li>
                  <li><a href="#">Teste 2</a></li>
                  <li><a href="#">Teste 3</a></li>
                  <li><a href="#">Teste 4</a></li>
                  <li><a href="#">Teste 5</a></li>
                </ul>
              </li> -->

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p class="hidden-lg hidden-md">Usuário</p>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo LOGOUT ?>">Sair</a></li>
                </ul>
              </li>

            </ul>

          </div>
        </div>
      </nav>
