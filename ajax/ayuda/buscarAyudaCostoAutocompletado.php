<?php
  session_start();

    if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: interfazPrincipal.php");
    exit;
     }
     $id=$_GET['q'];
   //$texto_buscar=(isset($_GET['q']))?"%".$_GET['q']."%":"%";

 ?>

  <?php


      require_once("../../servidor.php");

      $conn=null;
        try {

            $conn = new PDO($dir_server, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT COSTO FROM TIPOS_LICENCIAS_AUTORIZACIONES WHERE ID=$id;");
            $stmt->execute();

            $arrayJSON=array();
            $costo=array();
            
            while($fila = $stmt->fetch()){
              array_push($costo, $fila['COSTO']);

            }

            $arrayJSON['costo']=$costo;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

      print_r(json_encode($arrayJSON));

       ?>









