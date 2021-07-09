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
    <th>DNI</th>
    <th>Código</th>
    <th>Nom. y Apell.</th>
    <th >Título</th>
    <th>Sustentación</th>
    <th>Jurados</th>
    <th>Secretario</th>
    <th>Asesor</th>
    <th>Opciones</th>
    

  </tr>
  <?php 

        
   		require_once("../servidor.php");

        try {
         
            $conn = new PDO($dir_server,  $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT TESIS.ID AS ID_TESIS, DNI, CODIGO, CONCAT(NOMBRES,', ',APELLIDOS) AS NOM_APELL, ID_ESCUELA, (SELECT NOMBRE FROM ESCUELA WHERE ID=ID_ESCUELA) AS ID_ESCUELA, ID_TESISTA, FECHA_SUST, TITULO,CIUDAD, NOM_APELL_JUR_P,NOM_APELL_JUR_M1, NOM_APELL_JUR_M2 , CONCAT('P:', NOM_APELL_JUR_P,'<br>M1:' ,NOM_APELL_JUR_M1, '<br>M2:',NOM_APELL_JUR_M2 ) AS JURADOS, NOM_APELL_SECRE, NOM_APELL_ASESOR, CONCAT((SELECT NOMBRE FROM ESCUELA WHERE ID=ID_ESCUELA), '<br>',CIUDAD,'<br>', FECHA_SUST) AS SUSTENTACION FROM TESISTA INNER JOIN TESIS ON TESISTA.ID=TESIS.ID_TESISTA   WHERE NOMBRES LIKE '$texto_buscar' OR  APELLIDOS LIKE '$texto_buscar' OR  TITULO LIKE '$texto_buscar' OR NOM_APELL_JUR_P LIKE  '$texto_buscar' OR  FECHA_SUST LIKE '$texto_buscar' OR (SELECT NOMBRE FROM ESCUELA WHERE ID=ID_ESCUELA) ='$texto_buscar' OR NOM_APELL_ASESOR LIKE '$texto_buscar' OR NOM_APELL_JUR_M1 LIKE '$texto_buscar' OR NOM_APELL_JUR_M2 LIKE '$texto_buscar' OR NOM_APELL_SECRE LIKE '$texto_buscar' OR DNI LIKE '$texto_buscar' OR CODIGO LIKE '$texto_buscar';"); 
            $stmt->execute();

            while($tesis = $stmt->fetch()){
            ?>
              <tr>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt corporis, alias voluptatum. Voluptas perspiciatis debitis minima! Alias, illo praesentium fugit eligendi laudantium temporibus magnam assumenda ipsa, error dignissimos aspernatur, tempore.
                <td><?php echo $tesis['DNI']?></td>
                <td><?php echo $tesis['CODIGO']?></td>
                <td><?php echo $tesis['NOM_APELL']?></td>
                <td><?php echo $tesis['TITULO']?></td>
                <td><?php echo $tesis['SUSTENTACION']?></td>
                <td><?php echo $tesis['JURADOS']?></td>
                <td><?php echo $tesis['NOM_APELL_SECRE']?></td>
                <td><?php echo $tesis['NOM_APELL_ASESOR']?></td>

                <td>
                	<div class="btn-group">
                        <!--<a href="#" class="btn btn-primary btn-sm" data-toggle="modal tooltip" data-target="#exampleModal" data-id=" basedatos"  title="Ver" ><i class="nav-icon fa fa-eye"></i></a> -->

                        <a href="modificarRegistro.php?id_tesis=<?php echo $tesis['ID_TESIS'] ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Editar" >
                        <i class="nav-icon fa fa-edit" ></i>
                        </a>
                        <?php
                        if ($_SESSION['rol']==1) {
                          ?>
                           <a href="eliminarRegistro.php?id_tesis=<?php echo($tesis['ID_TESIS']);?>&id_tesista=<?php echo($tesis['ID_TESISTA']);?>" onclick="return confirm('¿Estás seguro de querer eliminar?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar">
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