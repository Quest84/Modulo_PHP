<?php
include("conexion.php");

	$id = $_REQUEST['id'];

	$query = "DELETE FROM carga_academica WHERE id_carga_acad = '$id'";

	$resultado = $conexion->query($query);

	if($resultado){
		header("Location: tabla_CargaAcad.php");
	} else {
		echo "Fallo al eliminar";
	}
?>