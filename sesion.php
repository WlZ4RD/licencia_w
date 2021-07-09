<?php 
	session_start();
	  if (isset($_SESSION['login_estado']) AND $_SESSION['login_estado'] == 1) {
        header("location: interfazPrincipal.php");
    	exit;
     }

	$tipo_rol = $_POST['tipo_usuario'];
	$codigo = $_POST['codigo'];
	$pass=$_POST['password'];
	require_once("servidor.php");

	$conn=null;
	$query=null;
	$pst=null;
	$parametros=null;


	try {
		$parametros= array($tipo_rol, $codigo, $pass );
		//$conn =new PDO($dir_server, $preUsuario.$codigo /*usuario*/, $pass);
		$conn = new PDO($dir_server, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query= "SELECT NOMBRES, APELLIDOS, DNI, CLAVE, ROL FROM USUARIO WHERE ROL=? AND  DNI=? AND CLAVE=?;";
		$pst=$conn->prepare($query);
		$pst->execute($parametros);

		if ($row = $pst->fetch()) {

			$_SESSION['login_estado']=1;
			$_SESSION['rol']=$tipo_rol;
			$_SESSION['codigo']=$codigo;
			$_SESSION['usuario']=$codigo;
			$_SESSION['contrasenia']=$pass;
			$_SESSION['nombres']=$row["NOMBRES"];
			$_SESSION['apellidos']=$row["APELLIDOS"];
			$_SESSION['nombre_rol']=($row["ROL"]==1)?"Administrador":"Secretario";
		
		
		
			header("location: interfazPrincipal.php");
		}

		
		print "<script> alert('datos incorrectos')</script>;";
		print "<script>window.location = 'index.php'</script>";



	} catch (Exception $e) {
		//die(print_r($e->getMessage()));
		$mensaje=$e->getMessage();
		print "<script> alert(\"error $mensaje \")</script>";
		print "<script>window.location = 'index.php'</script>";


	}finally{
		$conn=null;
	}


 ?>