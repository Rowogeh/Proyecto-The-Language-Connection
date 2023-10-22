<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{
	?>

<!DOCTYPE html>
<html>
<head>
	<?php include '../html/head.html'; ?>
</head>
<body>

	<?php include '../html/navbar.php'; ?>

	<main>

		<?php

		include ('root.php');
		
		if($_POST['search'])
		{
			
		?>

		<div class="container content-section top2">
			
			<div class="col-md-12 order-md-1">

				<form id="button" method="POST" action="search_mn.php" onSubmit="return validarForm(this)" class="contactform">
					
					<div class="row">
						
						<div class="col-md-4"></div>

						<div class="col-md-4">
						    <input type="text" placeholder="Buscar notas" name="var">
						</div>

					</div>
					
					<input type="hidden" name="search" value="Buscar">

				</form>

				<div class="text-center">
					<button form="button" class="blue"><i class="fa fa-search"></i> Buscar</button>
				</div>

			</div>
		</div>

		<table class="table table-bordered table-striped">
			<thead>
				<th colspan="9" class="text-center">Resultados de la Busqueda (Notas)</th>
			</thead>
			
			<tr>
			    <td>Codigo del curso</td>
				<td>Nombre del curso</td>
				<td>CI estudiante</td>
				<td>Nombre estudiante</td>
				<td>nota</td>
				<td>Opciones</td>
			</tr>

		<?php 

		$search = $_POST['var'];

		$query = mysqli_query($bd, "select * from nota where 
		curso like '%$search%' or nom_cur like '%$search%' or rep like '%$search%' or nom_est like '%$search%' or nota like '%$search%'");

		while($row = mysqli_fetch_assoc($query))
		{
		?>

		<tr>
			<td><?php echo $row['curso']  ?></td>
			<td><?php echo $row['nom_cur']  ?></td>
			<td><?php echo $row['rep']   ?></td>
			<td><?php echo $row['nom_est']   ?></td>
			<td><?php echo $row['nota']  ?></td>

			<td>
				<button class="green" id="editn" type="submit" value="<?php echo $row['cod']; ?>"><i class="fa fa-pen"></i></button>				
			
				<button class="red" id="dtln" type="submit" value="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
			</td>

			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		</tr>


		<?php } //End While ?>

		</table>
		
		<?php } //End If ?>	

		<div class="text-center">
			<button class="red" type="button" id="atrasn"><i class="fa fa-arrow-left"></i> Regresar</button>
		</div>

	</main>

	<div id="here"></div>

	<script src="../js/search.js"></script>

	<script type="text/javascript">
		$(document).on('click', '#dtln', function(){
			var id = this.value;
			var conf = confirm('¿Desea borrar este registro?');
			if(conf){
				$.ajax({
					type: 'POST',
					url: '../php/set/mobin.php',
					data: {id: id, orden: 'delete'},
					dataType: 'html'
				})
				.done(function(html){
				$('#here').html(html);
				});
			}
		});
	</script>

	<script src="../js/btn.js"></script>

</body>
</html>

<?php } ?>