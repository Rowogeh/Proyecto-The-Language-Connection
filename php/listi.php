<!-------------------------------------------------------------------------------------------------->

<!--Cookies-->

<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{
	?>

<!----------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
	
	<?php include ('../html/head.html'); ?>

</head>
<body>

	<?php include ('../html/navbar.php'); ?>

<main> 

<?php include ('root.php');

/*------------------------------------------------------------------------------------------------*/

//Paginación

if (isset($_GET['page_no']) && $_GET['page_no']!="") {

    $page_no = $_GET['page_no'];

    } else {

        $page_no = 1;

        }

	$total_records_per_page = 15;

	$offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2";

	$result_count = mysqli_query($bd,"SELECT COUNT(*) As total_records FROM `cursos`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
	$total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total pages minus 1


/*------------------------------------------------------------------------------------------------*/

	$query = "select * from cursos limit $offset, $total_records_per_page";

	if (!$res = $bd->query($query)){

		echo $bd->error;
		exit();
	}

	?>

<!----------------------------------------------------------------------------------------------->

	<div>

	<?php if($res->num_rows) : ?>

		<div class="container content-section top2">
			
			<div class="col-md-12 order-md-1">

				<form id="button" method="POST" action="search_i.php" onSubmit="return validarForm(this)" class="contactform">
					
					<div class="row">
						
						<div class="col-md-4"></div>

						<div class="col-md-4">
						    <input type="text" placeholder="Buscar cursos" name="var">
						</div>

					</div>
					
					<input type="hidden" name="search" value="Buscar">
	
			
				</form>

				<div class="text-center">
					<button form="button" class="blue"><i class="fa fa-search"></i> Buscar</button>

					<button id="form2" class="green"><i class="fa fa-paper-plane"></i> Formulario</button>
				</div>


			</div>
		</div>

		<table class="table table-bordered table-striped">
			<thead>
				<th colspan="9" class="text-center">Listado de cursos</th>
			</thead>

			<tbody>

				<tr>
					<td>Cursos    </td>
					<td>Código         </td>
					<td>Estudiante     </td>
					<td>Opciones     </td>
				</tr> 

			<?php while($row = $res->fetch_assoc()) : ?>
			
			<tr>
			
			<td><?php echo $row['nom'] ?></td>
			
			<td><?php echo $row['cod'] ?></td>
			

        	<td>
		        <a target="_blank" href="hrefi.php?cod=<?php echo $row['cod'] ?>" style="color: #000;">
		        <button class="violet"><i class="fa fa-eye"></i></button>
		     	</a>	       
        	</td>

			<td>
				<button class="green" id="editi" type="submit" value="<?php echo $row['id'] ?>"><i class="fa fa-pen"></i></button>				
		
				<button  class="red" id="dtli" type="submit" value="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
			</td>

			<?php 
				endwhile;
			?>

<!----------------------------------------------------------------------------------------------->

<!--Buscador-->

	
			

		</tr>
	</tbody>
</table>

<!----------------------------------------------------------------------------------------------->

<!--Pagination-->
<div class="text-center">

	<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
		<strong>
			Página <?php echo $page_no." de ".$total_no_of_pages; ?>
		</strong>
	</div>

	<ul class="pagination">

		<!--First Page-->

		<?php if($page_no > 1){

		echo "<li><a href='?page_no=1'>Primera Página</a></li>";} 

		?>

		<!--Previous-->
	    
		<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>

			<a <?php if($page_no > 1){

			echo "href='?page_no=$previous_page'";

			}?>>Anterior</a>

		</li>
	    
		<li <?php if($page_no >= $total_no_of_pages){

			echo "class='disabled'";

		} ?>>

		<!--Next-->

		<a <?php if($page_no < $total_no_of_pages) {

			echo "href='?page_no=$next_page'";

		} ?>>Siguiente</a>

		</li>

		<!--Last-->
	 
		<?php if($page_no < $total_no_of_pages){

			echo "<li><a href='?page_no=$total_no_of_pages'>Última Página</a></li>";

		} ?>
	</ul>

<!----------------------------------------------------------------------------------------------->

	<div>
		
		<?php else : ?> 

			<div>
				
				<p><strong>No Hay Registros</strong></p>

			</div>

		<?php endif; ?>

	</div>

</div>

<!----------------------------------------------------------------------------------------------->

</main>
	
<div id="here"></div>

<!----------------------------------------------------------------------------------------------->

<!--Script-->

	<script src="../js/search.js"></script>

	<script type="text/javascript">
		$(document).on('click', '#dtli', function(){
			var id = this.value;
			var conf = confirm('¿Desea borrar este registro?');
			if(conf){
				$.ajax({
					type: 'POST',
					url: '../php/set/inst.php',
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

<!----------------------------------------------------------------------------------------------->
	
</body>
</html>

<?php } ?>