<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{
	?>

<!DOCTYPE html>
<html lang="es">
<head>
	
	<?php include('head.html');  ?>
	
</head>
<body>

	<?php include('navbar.php'); ?>

<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">

		<h4 class="text-center">Registrar Representante</h4>

		<form id="repre_n" autocomplete="off" class="contactform">
			
			
			
			<div class="row">

				<div class="col-md-4">
					<input id="nom" name="nom" type="text" class="validate text-only cap" placeholder="Nombres" required>
				</div>

				<div class="col-md-4 mb-3">
					<input id="ape" name="ape" type="text" class="validate text-only cap" placeholder="Apellidos" required>
				</div>

				<div class="col-md-4 mb-3">
					<input id="ci" name="ci" type="text" class="ced" placeholder="Cedula (V/E-00.000.000)" required>
				</div>

			</div>

			<div class="row">

				<div class="col-md-4 mb-3">
					<input type="text" name="par" placeholder="Parentesco" required>
				</div>
				

				<div class="col-md-4 mb-3">
					<input id="telm" name="telm" type="text" class="validate tlf" placeholder="Telefono Movil (0000)-000-0000" required>
				</div>

			</div>

			<div class="row">

				<div class="col-md-4 mb-3">
					<input id="telf" name="telf" type="text" class="validate tlf" placeholder="Telefono Fijo (0000)-000-0000" required>
				</div>

				

			</div>
			<div class="row">
		
				<div class="col-md-6">
					<input id="ci_est" name="ci_est" type="text" class="ced" placeholder="Cedula del estudiante (V/E-00.000.000)" >
				</div>

				<div class="col-md-6">
					<input id="rep_nom" name="rep_nom" placeholder="Nombre del estudiante" readonly required>
				</div>

			</div>
			
			<input type="hidden" name="orden" value="add">
			
		</form>
		
		<div class="text-center">
			<button class="red" id="atras" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="blue" onclick="location.reload()"><i class="fa fa-brush"></i> Limpiar</button>
			<button class="list" id="list1"><i class="fa fa-eye"></i> Ver Lista</button>
	    	<button class="green" type="submit" form="repre_n"><i class="fa fa-pen"></i> Registrar</button>
	    	
    	</div>
	</div>
</div>
	
	<div id="here"></div>

	<script type="text/javascript">

		$('.ced').mask('A-00.000.000',{
		  'translation':{
		    A:{pattern: /[VE,ve]/}
		  }
		})

		$('.tlf').mask('(0000)-000-0000', {clearIfNotMatch: true});

		$('.text-only').keydown(function(v){
		  if ((v.keyCode > 47 && v.keyCode < 58)){
		    v.preventDefault();
		  }
		});
		$(document).ready(function(){
		$('#ci_est').change(function(e){
			var ced = this.value;
			if(ced === ''){
				return false;
			}
			$.ajax({
				type: 'post',
				data: {ced: ced},
				url: '../php/auto1.php'
			})
			.done(function(datos){
				$('#rep_nom').val(datos).addClass('valid');
				$('#rep_nom').next('#1ci_est').addClass('active');
			})
		})
	})

	</script>

	<script src="../js/btn.js"></script>
</body>


</html>


<?php } ?>