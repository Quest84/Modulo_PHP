<!DOCTYPE html>
<html>
<style>
L{
	font-size:18px;
}

body{
	background-image: url("tesjo.png");
	background-repeat: no-repeat;
  	background-attachment: fixed;
  	background-position: center;

}
a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
}
a:visited {
  color: red;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: white;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}
</style>
<head>
	<title>Tabla</title>
</head>
<body>
	<font size face="roboto" color=white>
	<center>
		<form method = "LINK" action = "index.php">
			<input type = "submit" value = "Regresar">
		</form>	
		<table border = "3">
			<thead>
				<tr>
					<table style border=1 bgcolor=black>
					<th colspan="1"><a href="F_Insertar_MatCarga.php"><L>Nuevo</L></a></th>
					<th colspan="7"><L>Materias-Carga</L></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th><center><L>ID Carga Academica</L></center></th>
					<th><center><L>ID Materia</L></center></th>
					<th colspan = "1"><center><L>Operaciones</L></center></th>

				</tr>
				<?php
					include ("conexion.php");

					$query = "SELECT * FROM Materias_Carga ORDER BY ID_Carga_Acad";
					$resultado = $conexion->query($query);
					while($row = $resultado->fetch_assoc()){
				?>
						<tr>
							<td><center><?php echo $row['id_carga_acad']; ?></center></td>
							<td><center><?php echo $row['clave_materia']; ?></center></td>
							<td><a href = "OP_Eliminar_MatCarga.php?id=<?php echo $row['id_carga_acad']; ?>
							&id2=<?php echo $row['clave_materia'];?>">
							<center><img border ="0" alt= "eliminar" src=eliminar.png width="30" height="30">
							</a><center/>
						</tr>						
					<?php
							}
					?>
			</tbody>
		</table>
	</center>
</body>
</html>
