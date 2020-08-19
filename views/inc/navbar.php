<nav class="navbar navbar-expand-sm bg-primary navbar-dark">

  <div class="container">
    <a class="navbar-brand" href="#">Hyaxe V</a>
  </div>

</nav>

<nav class="navbar navbar-expand-sm bg-light navbar-light navbar-sub">

  <div class="container">
    <ul class="navbar-nav sub">
      <li class="nav-item">
        <a class="nav-link" href="./panel"><i class="fa fa-user fa-lg"></i> Cuenta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./"><i class="fa fa-sticky-note fa-lg"></i> Noticias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./options"><i class="fa fa-cog fa-lg"></i> Opciones</a>
      </li>
    </ul>
    <ul class="navbar-nav sub">
      <li class="nav-item dropdown">
        <a class="nav-link sub-active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$data["name"]?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./options"><i class="fa fa-cog"></i> Configuración</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./logout"><i class="fa fa-power-off"></i> Cerrar sesión</a>
        </div>
      </li>
    </ul>
  </div>

</nav>