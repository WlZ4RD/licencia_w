<!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-primary navbar-dark border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Perfil</a>
      </li>
    </ul>

    <!--Busqueda 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Menu nabvar derecho -->
    <ul class="navbar-nav ml-auto">
      <!-- Menú desplegable de mensajes -->
      <li class="nav-item dropdown">

        <div class="user-panel mt-1 pb-1 mb-1 d-flex">
        <div class="image">
          <img src="dist/img/user1.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">

        <ul class="nav navbar-nav navbar-right">
          <a href="#" class="d-block"><?php
              echo $_SESSION['nombres'].", ".$_SESSION['apellidos']; ?></a>
        </ul>

        </div>
            

      </div>
     
    </ul>
  </nav>