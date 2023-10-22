<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{ 

	include ('../php/root.php');

	if($bd->connect_errno){

		echo $bd->connect_error;
		exit();

	}

	$id = isset($_POST['id']) ? $_POST['id'] : '';

	$query = "select * from cursos where id='$id'";

	if (!$res = $bd->query($query)){

		echo $bd->error;
		exit();
	}

	$row = $res->fetch_assoc();

?>

<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">
		
		<h4 class="text-center">Editar Instrumento Codigo: <?php echo $row['cod'];?></h4>

		<form id="acti" class="contactform">

			<div class="row">
				<div class="col-md-4">

					<input id="nom" name="nom" type="text" placeholder="nombre" value="<?php echo $row['nom'] ?>">

				</div>
				

				
				

				

				<div class="col-md-4">
					<input id="cod" name="cod" onkeypress="return numeros(event)" placeholder="Código" value="<?php echo $row['cod'] ?>">
				</div>

			</div>

			<div class="row">

				


				<input type="hidden" name="orden" value="update">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">

			</div>

		</form>
	
		<div class="text-center">
			<button class="red" onclick="location.reload()" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
	   		<button class="green" type="submit" form="acti">Actualizar <i class="fa fa-edit"></i></button>
	    </div>

	</div>

</div>

    <script type="text/javascript">

    	function numeros(e){
			key = e.keyCode || e.which;
			tecla = String.fromCharCode(key).toLowerCase();
			letras = "0123456789";
			especiales = [8,37,39,46];
		 
			tecla_especial = false
			for(var i in especiales){
		 		if(key == especiales[i]){
			 	tecla_especial = true;
			 	break;
				} 
			}
		 
			if(letras.indexOf(tecla)==-1 && !tecla_especial)
				return false;
		}

		$('#atras3').click(function(){
			window.location.href = '../php/listi.php';
		})

    </script>



<?php } ?>