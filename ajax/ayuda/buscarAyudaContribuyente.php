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
    <th>Agregar</th>
  </tr>
  <?php


   		require_once("../../servidor.php");

        try {

            $conn = new PDO($dir_server, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT ID, IF(TIPO_CONTRIBUYENTE=1,'Persona Natural', 'Persona Jurídica') AS T_PERSONA, DNI, RUC, NOM_APELL_REPRE, RAZON_SOCIAL, DIRECCION,EMAIL FROM CONTRIBUYENTE WHERE DNI LIKE '$texto_buscar' OR RUC LIKE '$texto_buscar' OR NOM_APELL_REPRE LIKE '$texto_buscar' OR RAZON_SOCIAL LIKE '$texto_buscar' OR EMAIL LIKE '$texto_buscar';");
            $stmt->execute();

            while($fila = $stmt->fetch()){
            ?>
              <tr>
                <td><?php echo $fila['ID']?></td>
                <td><?php echo $fila['T_PERSONA']?></td>
                <td><?php echo $fila['DNI']?></td>
                <td><?php echo $fila['RUC']?></td>
                <td><?php echo $fila['NOM_APELL_REPRE']?></td>
                <td><?php echo $fila['RAZON_SOCIAL']?></td>
                <td>
                  <button type='submit' class="btn btn-info" onclick="autocompletarContribuyente(<?php echo($fila['ID']);?>);"><i class="nav-icon fa fa-plus"></i></button>
                  <!--<form method="post" id="contribuyenteAutoCompletar" name="contribuyenteAutoCompletar" >
                    <input type="hidden" name="id" value="<?php echo($fila['ID']);?>">
                    <button type='submit' class="btn btn-info" ><i class="nav-icon fa fa-plus" onclick="eatFood();" ></i></button>  
                  </form> -->
                  

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