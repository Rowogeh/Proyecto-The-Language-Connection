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

	$query = "select * from representante where ci = '$ci'";

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
					<table width="100%" >
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
									<th>Telefono Movil</th>
									<th>Telefono Fijo</th>
								</thead>
							</tr>

							<tr>
								<td><?php echo $row['telm']  ?></td>
								<td><?php echo $row['telf']  ?></td>
								
							</tr>
					</table>
				</div>

				<div>
					<button onclick="window.close()"><i>close</i></button>
				</div>

				<div>
					<button onclick="window.print()"><i>Imprimir</i></button>
				</div>

			<?php endif; ?>
		</main>
	
	</body>
	</html>

<?php } ?>