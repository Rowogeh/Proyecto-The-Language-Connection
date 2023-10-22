<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{ 

	include ('../php/root.php');

	if($bd->connect_errno){

		echo $bd->connect_error;
		exit();

	}

	$nota = isset($_POST['nota']) ? $_POST['nota'] : '';

	$query = "select * from notas where nota='$nota'";

	if (!$res = $bd->query($query)){

		echo $bd->error;
		exit();
	}

	$row = $res->fetch_assoc();

?>

<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">
		
		<h4 class="text-center">Editar Notas</h4>
		
		<form id="mn1" class="contactform">

			
		
			<div class="row">

	
				<div class="col-md-4">
					<input id="nota" name="nota" type="text" placeholder="Nota" value="<?php echo $row['nota'] ?>" required>
				</div>
	
	
			</div>

			<input type="hidden" name="orden" value="update">
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">		
			

	</form> 
	
		<div class="text-center">
			<button class="red" onclick="location.reload()" type="button"> <i class="fa fa-arrow-left"></i> Regresar</button>
    		<button class="green" type="submit" form="mn1">Actualizar <i class="fa fa-edit"></i> </button>
		</div>

	</div>
</div>	

	<script type="text/javascript">
		
		$('.text-only').keydown(function(v){
		  if ((v.keyCode > 47 && v.keyCode < 58)){
		    v.preventDefault();
		  }
		});

		$('#atras3').click(function(){
			window.location.href = '../php/listn.php';
		})

	</script>


<?php } ?>