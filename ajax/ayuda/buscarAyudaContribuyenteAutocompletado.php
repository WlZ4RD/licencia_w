<?php
  session_start();

    if (!isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] != 1) {
        header("location: interfazPrincipal.php");
    exit;
     }
     $id=$_GET['id'];
   //$texto_buscar=(isset($_GET['q']))?"%".$_GET['q']."%":"%";

 ?>

  <?php


      require_once("../../servidor.php");

        try {

            $conn = new PDO($dir_server, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT ID, TIPO_CONTRIBUYENTE, IF(TIPO_CONTRIBUYENTE=1,DNI, RUC) AS DNI_RUC, CONCAT(IFNULL(NOM_APELL_REPRE,''),' - ', IFNULL(RAZON_SOCIAL,'')) AS NOM_RAZON FROM CONTRIBUYENTE WHERE ID=$id;");
            $stmt->execute();

            $arrayJSON=array();
            $id=array();
            $t_contri=array();
            $dni_ruc=array();
            $nom_razon=array();
            while($fila = $stmt->fetch()){
              array_push($id, $fila['ID']);
              array_push($t_contri, $fila['TIPO_CONTRIBUYENTE']);
              array_push($dni_ruc, $fila['DNI_RUC']);
              array_push($nom_razon, $fila['NOM_RAZON']);
            }

            $arrayJSON['id']=$id;
            $arrayJSON['t_contri']=$t_contri;
            $arrayJSON['dni_ruc']=$dni_ruc;
            $arrayJSON['nom_razon']=$nom_razon;
            
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

      print_r(json_encode($arrayJSON));

       ?>









