<?php
	require "conexion.php";
	
	$id = $_REQUEST['id'];
	$id2 = $_REQUEST['id2'];

	$query = "SELECT m.nombre, m.clave_materia, m.creditos FROM materias AS m INNER JOIN materias_carga AS c ON c.clave_materia = m.clave_materia and c.id_carga_acad = '$id';";

	$query2 = "SELECT num_control FROM carga_academica WHERE num_control = '$id2'";

	$resultado = $conexion->query($query) or die($conexion->error);
	
	$resultado2 = $conexion->query($query2) or die($conexion->error);

	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
		    // Logo
		    $this->Image('TESJo_logo.jpg',10,5,45);
		    $this->Image('SEP.png',60,8,40);
		    $this->Image('edomex.png',115,1,50);
		    $this->Image('tecnm.png',170,8,30);
		   
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Movernos a la derecha
		    
		    // Título
		    $this->Ln(20);
		   	$this->Cell(0,0,utf8_decode('Tecnológico de Estudios Superiores de Jocotitlán'),0,1,'C');
		   	$this->Ln(8);
		   	$this->SetFont('Arial','B',14);
		   	$this->Cell(0,0,utf8_decode('Carga Académica del alumno: '),0,1,'C');
		   	
		    // Salto de línea
		    $this->Ln(4);
		}
	
		// Pie de página
		function Footer()
		{
		    // Posición: a 1,5 cm del final
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Número de página
		    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
		}
	}


	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Cell(70);
	while($row = $resultado2->fetch_assoc())
	{
		$pdf->Cell(50,6,utf8_decode($row['num_control']),0,0,'C');
	}
	$pdf->Ln(8);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(80,6,'Nombre',1,0,'C',1);
	$pdf->Cell(60,6,'Clave de la Materia',1,0,'C',1);
	$pdf->Cell(40,6,'Creditos',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(80,6,utf8_decode($row['nombre']),1,0,'C');
		$pdf->Cell(60,6,$row['clave_materia'],1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['creditos']),1,1,'C');
	}
	$pdf->Output();
?>