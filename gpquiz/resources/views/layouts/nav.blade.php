<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

    @if(Auth::check())
      <a class="navbar-brand" href="/admin">GP Quiz - Bem vindo {{ Auth::user()->name }}</a>
      @else
      <a class="navbar-brand" href="/admin">GP Quiz - Bem vindo</a>

  @endif


    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
  
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/admin">
            <i class="fa fa-fw fa-question"></i>
            <span class="nav-link-text">Quiz</span>
          </a>
        </li> -->

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/admin/winners">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Ganhadores</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/admin/users">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Usuários</span>
          </a>
        </li>

        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="/admin/regulation">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Regulamento</span>
          </a>
        </li> -->

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        

        <li class="nav-item">
          <a class="nav-link" href="/admin/logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>