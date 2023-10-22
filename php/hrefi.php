<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{

	include '../html/head.html';
	include ('root.php');

	$bd->set_charset('utf8');

	if($bd->connect_errno){

		echo $bd->connect_error;
		exit();

	}

	$cod = $_GET['cod'];

	//$ced = 'e-12.312.312';

	$query = "select * from estudiante where curso = '$cod'";

	if(!$res = $bd->query($query)){

		echo $bd->error;
		exit();
	}
?>
		<?php if($res->num_rows): ?>

			<table class="table table-bordered table-striped">
			
			<thead>
				<th colspan="10" class="text-center">curso Asignado a</th>
			</thead>

			<tbody>

				<tr>
					<td>Todo</td>
					<td>Nombres</td>
					<td>Apellidos</td>
					<td>Cedula</td>
				</tr>

				<?php while($rows = $res->fetch_assoc()): ?>

				<tr>
					<td>
						<a href="alldata.php?ci=<?php echo $rows['ci'] ?>" target="_blank" style="color: #000;">
						<button class="paperclip"><i class="fa fa-paperclip"></i></button>
						</a>
					</td>
					
					<td><?php echo $rows['nom']; ?></td>
					<td><?php echo $rows['ape']; ?></td>
					<td><?php echo $rows['ci'] ?></td>
						
				<?php endwhile; ?>

				</tr>
			</tbody>
		</table>

		<div class="text-center">
			<button class="red" onclick="window.close()"><i class="fa fa-arrow-left"></i> Cerrar</button>
		</div>

		<?php else: ?>
			
			<div class="text-center">
				
				<h4>El Instrumento no se encuentra asignado</h4>

				<button class="red" onclick="window.close()"><i class="fa fa-arrow-left"></i> Cerrar</button>

			</div>

		<?php endif; ?>

	</div>
</div>

<?php } ?>