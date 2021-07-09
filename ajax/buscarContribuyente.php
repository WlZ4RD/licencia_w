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
    <th>Tipo Per.</th>
    <th>DNI</th>
    <th >RUC</th>
    <th>Nom. y Apell.</th>
    <th>Razón Social</th>
    <th>Direccion</th>
    <th>E-Mail</th>
    <th>Opciones</th>
  </tr>
  <?php 

        
   		require_once("../servidor.php");

        try {
         
            $conn = new PDO($dir_server,  $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT ID, IF(TIPO_CONTRIBUYENTE=1,'Persona Natural', 'Persona Jurídica') AS T_PERSONA, DNI, RUC, NOM_APELL_REPRE, RAZON_SOCIAL, DIRECCION,EMAIL FROM CONTRIBUYENTE WHERE DNI LIKE '$texto_buscar' OR RUC LIKE '$texto_buscar' OR NOM_APELL_REPRE LIKE '$texto_buscar' OR RAZON_SOCIAL LIKE '$texto_buscar' OR EMAIL LIKE '$texto_buscar';"); 
            $stmt->execute();

            while($tesis = $stmt->fetch()){
            ?>
              <tr>
           
                <td><?php echo $tesis['ID']?></td>
                <td><?php echo $tesis['T_PERSONA']?></td>
                <td><?php echo $tesis['DNI']?></td>
                <td><?php echo $tesis['RUC']?></td>
                <td><?php echo $tesis['NOM_APELL_REPRE']?></td>
                <td><?php echo $tesis['RAZON_SOCIAL']?></td>
                <td><?php echo $tesis['DIRECCION']?></td>
                <td><?php echo $tesis['EMAIL']?></td>

                <td>
                	<div class="btn-group">

                        <a onClick="return confirmEditar(<?php echo $tesis['ID'] ?>);" href="#editarModal" class="btn btn-success btn-sm" data-toggle="modal" data-toggle="tooltip" title="Editar Contribuyente" style="margin-right: 6px;"><i class="nav-icon fa fa-edit" ></i>
                        </a>

                        <?php
                          if ($_SESSION['rol']==1) {
                            ?>
                              <a href="eliminarPadron.php?id_eliminar=<?php echo($tesis['ID']);?>" onclick="return confirm('¿Estás seguro de querer eliminar?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar">
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





        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


       ?>

</table>