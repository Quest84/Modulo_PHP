<?php

include("conexion.php");

	//Creacion de las variables de los campos de la tabla
	$ID_Inscripcion = $_POST['id_inscripcion'];
	$ID_Pago = $_POST['id_pago'];

	$query = "INSERT INTO inscripciones_pago (id_inscripcion, id_pago) VALUES 
	('$ID_Inscripcion', '$ID_Pago')";

	$resultado = $conexion->query($query);


	if($resultado){
		header("Location: tabla_InscPagos.php");
	} else {
		echo "Fallo la insercion";
	}


?>