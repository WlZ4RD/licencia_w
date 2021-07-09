<?php
  


 $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];
  $rol = $_POST["rol"];




require_once("config/db.php");

$parametros=null;

try {
    $parametros= array( $rol, $usuario, $contrasena);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT NOMBRES, APELLIDOS, DNI, CLAVE, ROL FROM USUARIO WHERE ROL=? AND  DNI=? AND CLAVE=?;"); 
    $stmt->execute();

    if($user = $stmt->fetch()){

    	 session_start();
    	 $_SESSION['login_estado']=1;
    	 $_SESSION['idUsuario']=$user['ID'];
    	 $_SESSION['rol']=$user['TIPO_ROL'];
    	 $_SESSION['nombres']=$user['NOMBRES'];
    	 $_SESSION['apellidos']=$user['APELLIDOS'];
    	 $_SESSION['dni']=$user['DNI'];
         $_SESSION['cod_matricula']=$user['CODIGO_MATRICULA'];
   		header("location: interfazPrincipal.php");
    	exit;
    }else{
    	header("location: login.php");
    	exit;
    }





}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;





?>