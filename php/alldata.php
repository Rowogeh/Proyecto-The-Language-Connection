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

	$query = "select 

			representante.nom as nomrep, 
			representante.ape as aperep, 
			representante.ci as cirep,
			par,
			representante.telm as telmrep,
			representante.telf as telfrep,

			curso,
			estudiante.nom as nomest,
			estudiante.ape as apeest,
			estudiante.ci as ciest,
			gen,
			fnac,
			lnac,
			dir,
			estudiante.telm as telmest,
			estudiante.telf as telfest,

			cursos.nom as nominst,
			cod

			from representante 
		
			inner join cursos on estudiante.curso = cursos.cod

			 where estudiante.ci = '$ci'";

			 //echo $query;


	if(!$res = $bd->query($query)){

		echo $bd->error;
		exit();
	}

	$row = $res->fetch_assoc();

	?>

	<!DOCTYPE html>
	<html>
	<head>
			
		<?php include '../html/head.html';  ?>

	</head>
	<body>

		<main>
			<?php if($res->num_rows): ?>

				<div>
					<table class="table table-bordered table-striped">
						<thead>
							<th colspan="9" class="text-center">Planilla Estudiantil</th>
						</thead>
						<tr>
							<thead>
								<th colspan="9" class="text-center">Datos del Representante</th>
							</thead>
						</tr>

						<thead>
							<center><img src="../img/fundacion.png" style="width: 20em; height: 6em; margin-left: 50px;"></center>
							<hr size="1">
						</thead>

						<tr>
							<thead>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Cedula</th>
							</thead>
						</tr>

						<tbody>
							<tr>
								<td><?php echo $row['nomrep']  ?></td>
								<td><?php echo $row['aperep'] ?></td>
								<td><?php echo $row['cirep']  ?></td>
							</tr>

						<tr>
							<thead>
								<th colspan="9">Parentesco</th>
							</thead>
						</tr>

						<tr>
							<td colspan="9"><?php echo $row['par'] ?></td>
						</tr>

						<tr>
							<thead>
								<th>Telefono Celular</th>
								<th>Telefono Fijo</th>
							</thead>
						</tr>

							<tr>
								<td><?php echo $row['telmrep']  ?></td>
								<td><?php echo $row['telfrep']  ?></td>
									
							</tr>

							<tr>
								<thead>
									<th colspan="9" class="text-center">Datos del curso</th>
								</thead>
							</tr>

							<tr>
								<thead>
									<th>Nombre</th>
									<th>Codigo</th>
								</thead>
							</tr>

							<tr>
								<td><?php echo $row['nominst'] ?></td>
								<td><?php echo $row['cod'] ?></td>
							</tr>

							

							

							<tr>
								<thead>
									<th colspan="9" class="text-center">Datos del Estudiante</th>
								</thead>
							</tr>

							<tr>
								<thead>
									<th colspan="9">Fecha de Inscripción</th>
								</thead>
							</tr>

							<tr>
								<td colspan="9"><?php echo $row['insc'] ?></td>
							</tr>

							<tr>
								<thead>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>Cedula</th>
								</thead>
							</tr>

							<tr>
								<td><?php echo $row['nomest']  ?></td>
								<td><?php echo $row['apeest']  ?></td>
								<td><?php echo $row['ciest']   ?></td>
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
									<th>Telefono Celular</th>
									<th>Telefono Fijo</th>
								</thead>
							</tr>

							<tr>
								
								<td><?php echo $row['dir']  ?></td>
								<td><?php echo $row['telmest']  ?></td>
								<td><?php echo $row['telfest']  ?></td>
							</tr>

							

							
							

							
							

							

							

							
						</tbody>
					</table>
				</div>

				<!--<div class="text-center" style="margin-bottom: 100px;">
					<button class="red" onclick="window.close()"><i class="fa fa-arrow-left"></i> Cerrar</button>
				
					<button class="blue" onclick="window.print()"><i class="fa fa-print"></i> Imprimir</button>
				</div>-->

			<?php endif; ?>
		</main>
	
	</body>

	<script type="text/javascript">
		//window.print();
	</script>

	</html>

<?php } ?>