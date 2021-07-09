

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link bg-primary">
      <img src="images/comer.jpg" alt="" class="brand-image img-circle elevation-3"
           style="opacity: 1.0">
      <span class="brand-text font-weight-light">Comercilizacion</span>
    </a>

    <div class="sidebar">


      <nav class="mt-2">
        <ul class="nav nav-pills
         nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Inicio
              </p>
            </a>

          <li class="nav-item has-treeview">
            <a href="gestionarPadronContribuyente.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Padrón de Contribuyente
              </p>
            </a> 
          </li>

          <li class="nav-item has-treeview">
            <a href="gestionarLicenciasAutorizaciones.php" class="nav-link">
              <i class="nav-icon fa fa-file-text"></i>
              <p>
                Licencias y Autorizaciones
              </p>
            </a> 
          </li>

          <li class="nav-item has-treeview">
            <a href="gestionarTramite.php" class="nav-link">
              <i class="nav-icon fa fa-file-text"></i>
              <p>
                Tramite
              </p>
            </a> 
          </li>

           <?php 
            if ($_SESSION['rol']==1) {
              ?>
             <li class="nav-item has-treeview">
            <a href="gestionUsuario.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Usuarios
              </p>
            </a>

          </li>
              <?php  
            }
           ?>

         

           <li class="nav-item">
            <a href="perfil.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Perfil
              </p>
            </a>
          </li>
        
           <li class="nav-item">
            <a href="salir.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Salir
              </p>
            </a>
          </li>


    </div>
  </aside>
