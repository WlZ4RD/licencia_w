<?PHP
	$consulta = consultarLicAut($_GET['editar']);

	function consultarLicAut($editar){
		require_once("servidor.php");

        $conn = new PDO($dir_server, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT ID, NOMBRE FROM LICENCIAS_AUTORIZACIONES WHERE ID=".$editar.";"); 
        $stmt->execute();
        $row = $stmt->fetch();
	    return [
	    	$row['ID'],
			$row['NOMBRE'],
		];
	}
	include("modal/editarLicenciasAutorizaciones.php");
?>