<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{

	include ('root.php');

	$bd->set_charset('utf8');

	if($bd->connect_errno){

		echo $bd->connect_error;
		exit();

	}

	$ci = $_GET['ci'];
	$query = "select * from estudiante where ci='$ci'";
	$res = mysqli_query($bd,$query);
	$row = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
	<html>
	<head>
			
		<?php include '../html/head.html';  ?>

	</head>
	<body>

		<main>
			<?php if($res->num_rows): ?>
				
				<h4>Datos del Estudiantes</h4>

				<div>
					<table width="100%">
						<tr>
							<thead>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Cedula</th>
							</thead>
						</tr>

						<tbody>
							<tr>
								<td><?php echo $row['nom']  ?></td>
								<td><?php echo $row['ape'] ?></td>
								<td><?php echo $row['ci']  ?></td>
							</tr>

							<tr>
								<thead>
									<th>C.I. Representante</th>
									<th>Código Instrumento</th>
								</thead>
							</tr>

							<tr>
								<td><?php echo $row['rep']  ?></td>
								<td><?php echo $row['inst']  ?></td>
									
							</tr>

							<tr>
								<thead>
									<th>Genero</th>
									<th>Fecha de Nacimiento</th>
									<th>Lugar de Nacimiento</th>
								</thead>
							</tr>

							<tr>
								<td><?php echo $row['gen']  ?></td>
								<td><?php echo $row['fnac']  ?></td>
								<td><?php echo $row['lnac']  ?></td>
							</tr>

							<tr>
								<thead>
									<th>Dirección</th>
									<th>Telefono Movil</th>
									<th>Telefono Fijo</th>
								</thead>
							</tr>
							
							<tr>
								<td><?php echo $row['dir']  ?></td>
								<td><?php echo $row['telm']  ?></td>
								<td><?php echo $row['telf']  ?></td>
							</tr>

							<tr>
								<thead>
									<th>Programa Músical</th>
									<th>Profesor</th>
								</thead>
							</tr>

							<tr>
								<td><?php echo $row['pro']  ?></td>
								<td><?php echo $row['prog']  ?></td>
							</tr>

							<tr>
								<thead>
									<th>Educación Inicial</th>
									<th>Educación Básica</th>
									<th>Educación Diversificada</th>
									<th>Educación Superior</th>
								</thead>
							</tr>

							<tr>
								<td><?php echo $row['edi']  ?></td>
								<td><?php echo $row['edb']  ?></td>
								<td><?php echo $row['edd']  ?></td>
								<td><?php echo $row['eds']  ?></td>
							</tr>

							<tr>
								<thead>
									<th>Institución</th>
									<th>Dirección</th>
									<th>Director</th>
									<th>Telefono</th>
								</thead>
							</tr>

							<tr>
								<td><?php echo $row['iti']  ?></td>
								<td><?php echo $row['dirt']  ?></td>
								<td><?php echo $row['dirtt']  ?></td>
								<td><?php echo $row['tlf']  ?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div>
					<button onclick="window.print()"><i>Imprimir</i></button>
				</div>

			<?php endif; ?>
		</main>
	
	</body>
	</html>



<?php }?>