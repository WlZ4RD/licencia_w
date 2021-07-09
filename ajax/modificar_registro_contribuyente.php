<?php
  session_start();
  if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
    header("location: login.php");
    exit;
  }

  if(empty($_POST['dni1'])){
    $errors[]="DNI vacío";
  }else if(empty($_POST['ruc1'])){
    $errors[]="RUC vacío";
  }else if(empty($_POST['nomApell1'])){
    $errors[]="Nombres y apellidos del contribuyente vacío";
  }else if(empty($_POST['direccion1'])){
    $errors[]="Direccion vació";
  }else if(empty($_POST['telefono1'])){
    $errors[]="Telefono vacío";
  }else {
    require_once("../servidor.php");
    $conn =null;
    try {
      $conn =new PDO($dir_server, $username, $password);
      
      $conn->beginTransaction();

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if ($_POST['id_tipo']==1) {
        $par_modif= array($_POST['dni1'], $_POST['ruc1'], $_POST['nomApell1'], $_POST['direccion1'], $_POST['telefono1'], $_POST['email1'], $_POST['id']);
        $query_modif= "UPDATE CONTRIBUYENTE SET DNI=?, RUC=?, NOM_APELL_REPRE=?, DIRECCION=?, TELEFONO=?, EMAIL=? WHERE ID=?;";
      }elseif ($_POST['id_tipo']==2) {
        $par_modif= array($_POST['dni1'], $_POST['ruc1'], $_POST['nomApell1'], $_POST['direccion1'], $_POST['razon1'], $_POST['telefono1'], $_POST['email1'], $_POST['id']);
        $query_modif= "UPDATE CONTRIBUYENTE SET DNI=?, RUC=?, NOM_APELL_REPRE=?, DIRECCION=?, RAZON_SOCIAL=?, TELEFONO=?, EMAIL=? WHERE ID=?;";
      }
      
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