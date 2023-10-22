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

				<form id="button" method="POST" action="search_mo.php" onSubmit="return validarForm(this)" class="contactform">
					
					<div class="row">
						
						<div class="col-md-4"></div>

						<div class="col-md-4">
						    <input type="text" placeholder="Buscar Mobiliario Oficina" name="var">
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
				<th colspan="9" class="text-center">Resultados de la Busqueda (Mobiliario Oficina)</th>
			</thead>
			
			<tr>
			    <td>Nombre</td>
				<td>Marca</td>
				<td>Modelo o Medida</td>
				<td>Serial</td>
				<td>Código</td>
				<td>Descripción</td>
				<td>Opciones</td>
			</tr>

		<?php 

		$search = $_POST['var'];

		$query = mysqli_query($bd, "select * from oficina where 
		nom like '%$search%' or mar like '%$search%' or mdl like '%$search%' or ser like '%$search%' or cod like '%$search%'");

		while($row = mysqli_fetch_assoc($query))
		{
		?>

		<tr>
			<td><?php echo $row['nom']  ?></td>
			<td><?php echo $row['mar']  ?></td>
			<td><?php echo $row['mdl']   ?></td>
			<td><?php echo $row['ser']   ?></td>
			<td><?php echo $row['cod']  ?></td>
			<td><?php echo $row['des']  ?></td>

			<td>
				<button class="green" id="edito" type="submit" value="<?php echo $row['cod']; ?>"><i class="fa fa-pen"></i></button>				
			
				<button class="red" id="dtlo" type="submit" value="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
			</td>

			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		</tr>


		<?php } //End While ?>

		</table>
		
		<?php } //End If ?>	

		<div class="text-center">
			<button class="red" type="button" id="atraso"><i class="fa fa-arrow-left"></i> Regresar</button>
		</div>

	</main>

	<div id="here"></div>

	<script src="../js/search.js"></script>

	<script type="text/javascript">
		$(document).on('click', '#dtlo', function(){
			var id = this.value;
			var conf = confirm('¿Desea borrar este registro?');
			if(conf){
				$.ajax({
					type: 'POST',
					url: '../php/set/mobio.php',
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