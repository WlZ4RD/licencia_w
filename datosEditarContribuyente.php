<?PHP
	$consulta = consultarContribuyente($_GET['editar']);

	function consultarContribuyente($editar){
		require_once("servidor.php");

        $conn = new PDO($dir_server, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT ID, TIPO_CONTRIBUYENTE, DNI, RUC, NOM_APELL_REPRE, RAZON_SOCIAL, DIRECCION, EMAIL, TELEFONO FROM CONTRIBUYENTE WHERE ID=".$editar.";"); 
        $stmt->execute();
        $row = $stmt->fetch();
	    return [
	    	$row['ID'],
			$row['TIPO_CONTRIBUYENTE'],
			$row['DNI'],
			$row['RUC'],
			$row['NOM_APELL_REPRE'],
			$row['RAZON_SOCIAL'],
			$row['DIRECCION'],
			$row['EMAIL'],
			$row['TELEFONO']
		];
	}
	include("modal/editarPadron.php");
?>