<?php
  session_start();
  if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
    header("location: login.php");
    exit;
  }

  if(empty($_POST['nombres2'])){
    $errors[]="Ingrese Nombres";
  }else if(empty($_POST['apellidos2'])){
    $errors[]="Ingrese Apellidos";
  }else {
    require_once("../servidor.php");
    $conn =null;
    try {
      $conn =new PDO($dir_server, $username, $password);
      
      $conn->beginTransaction();

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $par_modif= array($_POST['nombres2'], $_POST['apellidos2'], $_POST['clave2'], $_POST['rol2'], $_POST['dni2']);
      $query_modif= "UPDATE USUARIO SET NOMBRES=?, APELLIDOS=?, CLAVE=?, ROL=? WHERE DNI=?;";
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
      <div class="alert alert-danger" role="alert">
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
        <div class="alert alert-success" role="alert">
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