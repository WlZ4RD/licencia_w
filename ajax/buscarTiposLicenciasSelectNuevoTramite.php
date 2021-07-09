<?php 
	session_start();

  	if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: interfazPrincipal.php");
    exit;
     }
  $id=$_GET['action'];

	   //$texto_buscar=(isset($_REQUEST['q']))?"%".$_REQUEST['q']."%":"%";

 ?>

  <?php 

        
   		require_once("../servidor.php");

        try {
         
            $conn = new PDO($dir_server,  $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT ID, NOMBRE FROM TIPOS_LICENCIAS_AUTORIZACIONES WHERE ID_LICENCIAS_AUTORIZACIONES=$id;"); 
            $stmt->execute();

            ?>
            <option value="" selected="true" disabled="disabled">-- Seleccione Tipo Licencia o Autorizacion --</option>
            <?php  
            while($row = $stmt->fetch()){
            ?>
            <option value="<?php echo $row['ID']; ?>" ><?php echo $row['NOMBRE'];  ?></option>

            <?php   
            }





        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;


       ?>

</table>