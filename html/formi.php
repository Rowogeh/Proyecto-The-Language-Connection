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
		
		<h4 class="text-center">Registrar curso</h4>

		<form id="inst" class="contactform">

		<div class="row">
			<div class="col-md-6">

				<input id="nom" name="nom" type="text" placeholder="nombre">

			</div>

			

		

			

			

		</div>

		<div class="row">

			<div class="col-md-6">

				<input id="cod" name="cod" type="" class="" onkeypress="return numeros(event)" placeholder="Código">

			</div>

			

			<input type="hidden" name="orden" value="add">

		</div>

	</form>
	
	<div class="text-center">
		<button class="red" id="atras" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
		<button class="blue" onclick="location.reload()"><i class="fa fa-brush"></i> Limpiar</button>
		<button class="list" id="list2"><i class="fa fa-eye"></i> Ver Lista</button>
	    <button class="green" type="submit" form="inst"><i class="fa fa-pen"></i> Registrar</button>
    </div>

	</div>

</div>


    <div id="here"></div>

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
			window.location.href = '../html/main.php';
		})
			
    </script>

    <script src="../js/btn.js"></script>
	
</body>
</html>

<?php } ?>