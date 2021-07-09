<?PHP
	$consulta = consultarUsuario($_GET['editar']);

	function consultarUsuario($editar){
		require_once("servidor.php");

        $conn = new PDO($dir_server, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT DNI, NOMBRES, APELLIDOS, ROL FROM USUARIO WHERE DNI=".$editar.";"); 
        $stmt->execute();
        $row = $stmt->fetch();
	    return [
	    	$row['DNI'],
			$row['NOMBRES'],
			$row['APELLIDOS'],
			$row['ROL']
		];
	}
	include("modal/editarUsuario.php");
?>