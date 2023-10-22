<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{


	include ('root.php');


	$x = isset($_POST['val']) ? $_POST['val'] : '';

	$query = "select * from usuario";

	$res = $bd->query($query);

		
	?>

<!----------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html>
<head>
	<?php include '../html/head.html' ?>
</head>
<body>
	
	<?php include '../html/navbar.php' ?>

	<div>
	<?php if($res->num_rows) : ?>

		<table class="table table-bordered table-striped">
			<thead>
				<th colspan="10" class="text-center">Lista de Usuarios</th>
			</thead>

			<tbody>

				<tr>
					<td>Usuario</td>
					<td>Clave (md5)</td>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Pregunta</td>
					<td>Respuesta</td>
					<td>Privilegios</td>
					
				</tr>

			<?php while($row = $res->fetch_assoc()) : ?>
			
			<tr>
			
			<td><?php echo $row['usu']  ?></td>
			<td><?php echo $row['pass']  ?></td>
			<td><?php echo $row['nom']   ?></td>
			<td><?php echo $row['ape']   ?></td>
			<td><?php echo $row['pre']  ?></td>
			<td><?php echo $row['res']  ?></td>
			<td><?php echo $row['lvl']  ?></td>


			<?php 
				endwhile;
			?>


<div>
	
	<?php else : ?> 

		<div>
			
			<p><strong>No Hay Registros</strong></p>

		</div>

	<?php endif; ?>

</div>

</body>
</html>

<?php } ?>