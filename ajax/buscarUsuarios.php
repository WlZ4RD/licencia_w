<?php
	session_start();

  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: interfazPrincipal.php");
    exit;
     }

	 $texto_buscar=(isset($_GET['q']))?"%".$_GET['q']."%":"%";

 ?> 
<table class="table table-hover">
  <tr>
    <th>Nro</th>
    <!--Codigo de distribucion academica es igual a periodo -->
    <th >DNI</th>
    <th>Nombres y Apellidos</th>
    <th>Rol</th>
    <th>Opciones</th>
  </tr>
  <?php 
        require_once("../servidor.php");

        try {
          $conn = new PDO($dir_server, $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT CONCAT(NOMBRES, ', ', APELLIDOS) AS NOM_APELL, DNI, CASE WHEN ROL=1 THEN 'Administrador' WHEN ROL=2 THEN 'Sub-Gerente' WHEN ROL=3 THEN 'Asistente' END AS ROL_NOMBRES  FROM USUARIO WHERE NOMBRES LIKE '$texto_buscar' OR APELLIDOS LIKE '$texto_buscar' OR DNI LIKE '$texto_buscar'; "); 
          //$stmt = $conn->prepare("SELECT CONCAT(NOMBRES, ', ', APELLIDOS) AS NOM_APELL, DNI, CASE WHEN ROL=1 THEN 'Administrador' WHEN ROL=2 THEN 'Sub-Gerente' WHEN ROL=3 THEN 'Asistente' END AS ROL_NOMBRES  FROM USUARIO; "); 
          $stmt->execute();
          $nro=0;
          while($periodo = $stmt->fetch()){
            $nro++;
            ?>
              <tr>
                <td><?php echo $nro; ?></td>
                <td><?php echo $periodo['DNI'];?></td>
                <td><?php echo $periodo['NOM_APELL'];?> </td>
                <td><?php echo $periodo['ROL_NOMBRES']; ?></td>
                <td>
                  <div class="btn-group">
                    <a onClick="return confirmEditar(<?php echo $periodo['DNI'] ?>);" href="#editarModal" class="btn btn-success btn-sm" data-toggle="modal" data-toggle="tooltip" title="Editar Licencia o Autorizacion" style="margin-right: 6px;">
                      <i class="nav-icon fa fa-edit" ></i>
                    </a>
                    
                    <?php
                     if ($_SESSION['rol']==1) {
                        ?>
                          <a href="eliminarUsuario.php?id_eliminar=<?php echo $periodo['DNI'];?>" onclick="return confirm('¿Estás seguro de querer eliminar?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar">
                          <i class="nav-icon fa fa-trash"></i>
                          </a>
                        <?php
                      }
                    ?>
                                       
                  </div>
                </td>
              </tr> 
            <?php   
          }
        }catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;

  ?>
</table>
