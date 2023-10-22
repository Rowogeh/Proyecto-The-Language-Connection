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

				<form id="button" method="POST" action="search_r.php" onSubmit="return validarForm(this)" class="contactform">
					
					<div class="row">
						
						<div class="col-md-4"></div>

						<div class="col-md-4">
						    <input type="text" class="ced" placeholder="Cedula (V/E-00000000)" name="var">
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
				<th colspan="9" class="text-center">Resultados de la Busqueda (Representante)</th>
			</thead>
			
			<tr>
			    <td> Nombres        </td>
			    <td> Apellidos      </td>
			    <td> Cedula         </td>
			    <td> Telefono Movil </td>
			    <td> Telefono Fijo  </td>
			    <td> Estudiante     </td>
			    <td> Opciones     </td>
			</tr>

		<?php 

		$search = $_POST['var'];

		$query = mysqli_query($bd, "select * from representante where ci like '%$search%'");

		while($row = mysqli_fetch_assoc($query))
		{
		?>

		<tr>
			<td><?=$row['nom']?></td>
			<td><?=$row['ape']?></td>
			<td><?=$row['ci']?></td>
			<td><?=$row['telm']?></td>
			<td><?=$row['telf']?></td>
		
			

			<td>
		        <a target="_blank" href="hrefe.php?ci=<?php echo $row['ci'] ?>" style="color: #000;">
		        <button class="violet"><i class="fa fa-eye"></i></button>
		     	</a>	       
        	</td>

			<td>
				<button class="green" id="editr" type="submit" value="<?php echo $row['id']; ?>"><i class="fa fa-pen"></i></button>				
			
				<button class="red" id="dtlr" type="submit" value="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
			</td>
		</tr>


		<?php } //End While ?>

		</table>
		
		<?php } //End If ?>	
		
		<div class="text-center">
			<button class="red" type="button" id="atrasr"><i class="fa fa-arrow-left"></i> Regresar</button>
		</div>	

	</main>

	

	<div id="here"></div>

	<script src="../js/search.js"></script>

	<script type="text/javascript">

		$('.ced').mask('A-00000000',{
		  'translation':{
		    A:{pattern: /[VE,ve]/}
		  }
		})

		$(document).on('click', '#dtlr', function(){
			var id = this.value;
			var conf = confirm('¿Desea borrar este registro?');
			if(conf){
				$.ajax({
					type: 'POST',
					url: '../php/set/repre.php',
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