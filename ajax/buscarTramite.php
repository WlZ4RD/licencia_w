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
    <th>N° Exp.</th>
    <th >N° Resol.</th>
    <th>Contribuyente</th>
    <th>Act. Econ.</th>
    <th>Area(m2) </th>
    <th>F. Inicio</th> 
    <th>F. Ven.</th>
    <th>Estado</th>
    <th>Opciones</th>
    

  </tr>
  <?php 

        
   		require_once("../servidor.php");

        try {
         
            $conn = new PDO($dir_server,  $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT ID, (SELECT IF(TIPO_CONTRIBUYENTE=1, NOM_APELL_REPRE, RAZON_SOCIAL) FROM CONTRIBUYENTE WHERE ID=ID_CONTRIBUYENTE ) AS CONTRIBUYENTE, ACTIVIDAD_ECONOMICA, DIRECCION, TELEFONO, ZONIFICACION, COMPATIBILIDAD_DE_USO, NRO_EXPEDIENTE, NRO_RESOLUCION, ANCHO*LARGO AS AREA , F_INICIAL, F_VENCIMIENTO, IF(ESTADO=0,'Inhabilitado','Habilitado') AS ESTADO_DOC   FROM TRAMITE WHERE (SELECT IF(TIPO_CONTRIBUYENTE=1, NOM_APELL_REPRE, RAZON_SOCIAL) FROM CONTRIBUYENTE WHERE ID=ID_CONTRIBUYENTE ) LIKE '$texto_buscar' ;"); 
            $stmt->execute();
            $count=0;
            while($row = $stmt->fetch()){
            $count++;
            ?>
              <tr>
         
                <td><?php echo $count ?></td>
                <td><?php echo $row['NRO_EXPEDIENTE']?></td>
                <td><?php echo $row['NRO_RESOLUCION']?></td>
                <td><?php echo $row['CONTRIBUYENTE']?></td>
                <td><?php echo $row['ACTIVIDAD_ECONOMICA']?></td>
                <td><?php echo $row['AREA']?></td>
                <td><?php echo $row['F_INICIAL']?></td>
                <td><?php echo $row['F_VENCIMIENTO']?></td>
                <td><?php echo $row['ESTADO_DOC']?></td>
                <td>
                	<div class="btn-group">
                   <a onClick="return confirmEditar(<?php echo $row['ID'] ?>);" href="#editarModal" class="btn btn-success btn-sm" data-toggle="modal" data-toggle="tooltip" title="Editar Tramite" style="margin-right: 6px;"><i class="nav-icon fa fa-edit" ></i>
                    </a>

                        <?php
                          if ($_SESSION['rol']==1) {
                            ?>
                              <a href="eliminarTramite.php?id_eliminar=<?php echo($row['ID']);?>" onclick="return confirm('¿Estás seguro de querer eliminar?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar">
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