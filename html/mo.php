<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{
	?>

<!DOCTYPE html>
<html lang="es">
<head>

	<?php include('head.html')  ?>
	
</head>
<body>
	<?php include('navbar.php') ?>

<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">

		<h4 class="text-center">Registrar Mobiliario Oficina</h4>

		<form id="mo" class="contactform">

			<div class="row">

				<div class="col-md-4">
					<input id="nom" name="nom" type="text" class="validate text-only cap" placeholder="Mobiliario">
				</div>

				<div class="col-md-4">
					<input id="mar" name="mar" type="text" class="validate text-only cap" placeholder="Marca">
				</div>

				<div class="col-md-4">
					<input id="mdl" name="mdl" type="text" placeholder="Modelo">
				</div>

			</div>

			<div class="row">

				<div class="col-md-4">
					<input id="ser" name="ser" type="text" placeholder="Serial">
				</div>

				<div class="col-md-4">
					<input id="cod" name="cod" type="text" placeholder="Código">
				</div>

				<div class="col-md-4">
					<input id="des" name="des" type="text" placeholder="Descripción">
				</div>

			</div>

		<input type="hidden" name="orden" value="add">

	</form>
	
		<div class="text-center">
			<button class="red" id="atras" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="blue" onclick="location.reload()"><i class="fa fa-brush"></i> Limpiar</button>
			<button class="list" id="list5"><i class="fa fa-eye"></i> Ver Lista</button>
		    <button class="green" type="submit" form="mo"><i class="fa fa-pen"></i> Registrar</button>
	    </div>

	</div>
</div>


	



    <div id="here"></div>

	<script type="text/javascript">
		
		$('.text-only').keydown(function(v){
		  if ((v.keyCode > 47 && v.keyCode < 58)){
		    v.preventDefault();
		  }
		});

	</script>

	<script src="../js/btn.js"></script>
</body>
</html>



<?php } ?>