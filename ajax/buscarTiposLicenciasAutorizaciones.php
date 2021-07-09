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
    <th>#</th>
    <th>Nombre</th>
    <th>Licencia</th>
    <th>Costo</th>
    <th>Opciones</th>
    

  </tr>
  <?php 

        
      require_once("../servidor.php");

        try {
         
            $conn = new PDO($dir_server,  $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT ID, ID_LICENCIAS_AUTORIZACIONES, NOMBRE, COSTO ,(SELECT  NOMBRE FROM LICENCIAS_AUTORIZACIONES WHERE ID=TIPOS_LICENCIAS_AUTORIZACIONES.ID_LICENCIAS_AUTORIZACIONES) AS LIC FROM TIPOS_LICENCIAS_AUTORIZACIONES WHERE NOMBRE LIKE '$texto_buscar'"); 
            $stmt->execute();

            while($tesis = $stmt->fetch()){
            ?>
              <tr>
              
                <td><?php echo $tesis['ID']?></td>
                <td><?php echo $tesis['NOMBRE']?></td>
                <td><?php echo $tesis['LIC']?></td>
                <td><?php echo $tesis['COSTO']?></td>

                <td>
                  <div class="btn-group">
                    <div class="btn-group">
                      <a onClick="return confirmEditar1(<?php echo $tesis['ID'] ?>, <?php echo $tesis['ID_LICENCIAS_AUTORIZACIONES']; ?>);" href="#editarModal1" class="btn btn-success btn-sm" data-toggle="modal" data-toggle="tooltip" title="Editar" style="margin-right: 6px;">
                        <i class="nav-icon fa fa-edit" ></i>
                      </a>

                      <?php
                        if ($_SESSION['rol']==1) {
                          ?>
                            <a href="eliminarTipoLicAut.php?id_eliminar=<?php echo($tesis['ID']);?>" onclick="return confirm('¿Estás seguro de querer eliminar?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar">
                            <i class="nav-icon fa fa-trash"></i>
                            </a>
                          <?php
                        }
                      ?>                      
                    </div>
                  </div>
                </td>

              </tr>

            <?php   
            }





        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


       ?>

</table>