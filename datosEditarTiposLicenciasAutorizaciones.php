<?PHP
	$consulta = consultarLicAut($_GET['editar1'], $_GET['editar2']);

	function consultarLicAut($editar1, $editar2){
		require_once("servidor.php");

        $conn = new PDO($dir_server, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT ID, ID_LICENCIAS_AUTORIZACIONES, NOMBRE, COSTO FROM TIPOS_LICENCIAS_AUTORIZACIONES WHERE ID=".$editar1." AND ID_LICENCIAS_AUTORIZACIONES=".$editar2.";"); 
        $stmt->execute();
        $row = $stmt->fetch();
	    return [
	    	$row['ID'],
	    	$row['ID_LICENCIAS_AUTORIZACIONES'],
	    	$row['NOMBRE'],
			$row['COSTO']
		];
	}
	include("modal/editarTiposLicenciasAutorizaciones.php");
?>