<?php
  session_start();
  if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
    header("location: login.php");
    exit;
  }

  if(empty($_POST['nombre12'])){
    $errors[]="Nombre vacio";
  }else if(empty($_POST['costo11'])){
    $errors[]="Costo vacio";
  }else {
    require_once("../servidor.php");
    $conn =null;
    try {
      $conn =new PDO($dir_server, $username, $password);
      
      $conn->beginTransaction();

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $par_modif= array($_POST['nombre12'], $_POST['costo11'], $_POST['id11'], $_POST['id22']);
      $query_modif= "UPDATE TIPOS_LICENCIAS_AUTORIZACIONES SET NOMBRE=?, COSTO=? WHERE ID=? AND ID_LICENCIAS_AUTORIZACIONES=?;";
      
      $pst_modif=$conn->prepare($query_modif);
      $pst_modif->execute($par_modif);

      $conn->commit();
      $messages[] ="Modificacion exitosa.";
    } catch (Exception $e) {
      //die(print_r($e->getMessage()));

      $mensaje=$e->getMessage();

      $errors []="Lo siento algo ha salido mal intenta nuevamente. ".$mensaje;
      $conn->rollBack();
    
    }finally{
      $conn=null;
    }

  }


if (isset($errors)){
      
      ?>
      <div class="alert alert-danger" role="alert" style="margin-bottom: 0px; margin-top: 6px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error!</strong> 
          <?php
            foreach ($errors as $error) {
                echo $error;
              }
            ?>
      </div>
      <?php
      }
      if (isset($messages)){
        
        ?>
        <div class="alert alert-success" role="alert" style="margin-bottom: 0px; margin-top: 6px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Bien hecho!</strong>
            <?php
              foreach ($messages as $message) {
                  echo $message;
                }
              ?>
        </div>
        <?php
      }

  
?>