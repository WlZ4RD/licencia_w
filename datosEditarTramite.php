<?PHP
	$consulta = consultarTramite($_GET['editar']);

	function consultarTramite($editar){
		require_once("servidor.php");

        $conn = new PDO($dir_server, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT ID, ACTIVIDAD_ECONOMICA, DIRECCION, TELEFONO, ZONIFICACION,COMPATIBILIDAD_DE_USO, OBSERVACIONES, NRO_BOLETA, COSTO, NRO_EXPEDIENTE, NRO_RESOLUCION, UBICACION_ARCHIVO_FISICO, LARGO, ANCHO, F_INICIAL, F_VENCIMIENTO, ESTADO FROM TRAMITE WHERE ID=".$editar.";"); 
        $stmt->execute();
        $row = $stmt->fetch();
	    return [
	    	$row['ID'],
			$row['ACTIVIDAD_ECONOMICA'],
			$row['F_INICIAL'],
			$row['F_VENCIMIENTO'],
			$row['COSTO'],
			$row['DIRECCION'],
			$row['ZONIFICACION'],
			$row['TELEFONO'],
			$row['NRO_BOLETA'],
			$row['NRO_EXPEDIENTE'],
			$row['NRO_RESOLUCION'],
			$row['UBICACION_ARCHIVO_FISICO'],
			$row['LARGO'],
			$row['ANCHO'],
			$row['COMPATIBILIDAD_DE_USO'],
			$row['ESTADO'],
			$row['OBSERVACIONES']
		];
	}
	include("modal/editarTramite.php");
?>