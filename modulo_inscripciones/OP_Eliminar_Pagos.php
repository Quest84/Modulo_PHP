<?php
include("conexion.php");

	$id = $_REQUEST['id'];

	$ID_Pago = $_POST['ID_Pago'];
	$Folio = $_POST['Folio'];
	$TipoPago = $_POST['tipoPago'];
	$Cantidad = $_POST['Cantidad'];

	$query = "DELETE FROM Pagos WHERE ID_Pago = '$id'";

	$resultado = $conexion->query($query);

	if($resultado){
		header("Location: tabla_Pagos.php");
	} else {
		echo "Fallo la insercion";
	}
?>