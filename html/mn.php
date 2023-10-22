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
		
		<h4 class="text-center">Registrar Nota</h4>
		
		<form id="mn" class="contactform">

			<div class="row">

				<div class="row">

				<div class="col-md-6">
					<input id="curso" name="curso" type="text" placeholder="Codigo de curso" >
				</div>

				<div class="col-md-6">
					<input id="nom_cur" name="nom_cur" placeholder="Nombre del curso" >
				</div>

			</div>
				
				<div class="row">
		
				<div class="col-md-6">
					<input id="rep" name="rep" type="text" class="ced" placeholder="Cedula del Representante (V/E-00.000.000)" >
				</div>

				<div class="col-md-6">
					<input id="nom_est" name="nom_est" placeholder="Nombre del Representante" readonly required>
				</div>

			</div>

				<div class="col-md-4">
					<input id="nota" name="nota" type="text" class="validate text-only cap" placeholder="Nota" required>
				</div>

			</div>

		

		<input type="hidden" name="orden" value="add">

	</form> 
	
		<div class="text-center">
			<button class="red" id="atras" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="blue" onclick="location.reload()"><i class="fa fa-brush"></i> Limpiar</button>
			<button class="list" id="list4"><i class="fa fa-eye"></i> Ver Lista</button>
		    <button class="green" type="submit" form="mn"><i class="fa fa-pen"></i> Registrar</button>
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
		$('.ced').mask('A-00.000.000',{
		  'translation':{
		    A:{pattern: /[VE,ve]/}
		  }
	})

		/*function mascara(){
			
			var size = $('#ci').val();
			//alert(size.length);

			console.log(size.length);

			if(size.length != 0){
				$('.ced').mask('A-00.000.000',{
				  'translation':{
				    A:{pattern: /[VE,ve]/}
				  }
				});
			}
			
			else if(size.length != 13){
				$('#ci').mask('A-0.000.000',{
				  'translation':{
				    A:{pattern: /[VE,ve]/}
				  }
				});
			}else{
				$('#ci').mask('A-00.000.000',{
				  'translation':{
				    A:{pattern: /[VE,ve]/}
				  }
				});
			}
		}*/

		$('.tlf').mask('(0000)-000-0000', {clearIfNotMatch: true});

		$('.text-only').keydown(function(v){
		  if ((v.keyCode > 47 && v.keyCode < 58)){
		    v.preventDefault();
		  }
		});
/*Autocompletar Representante*/

	$(document).ready(function(){
		$('#rep').change(function(e){
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
				$('#nom_est').val(datos).addClass('valid');
				$('#nom_est').next('#1rep').addClass('active');
			})
		})
	})

	/*Autocompletar Instrumento*/

	$(document).ready(function(){
		$('#curso').change(function(e){
			var cod1 = this.value;
			if(cod1 === ''){
				return false;
			}
			$.ajax({
				type: 'post',
				data: {cod1: cod1},
				url: '../php/auto2.php'
			})
			.done(function(datos1){
				$('#nom_cur').val(datos1).addClass('valid');
				$('#nom_cur').next('#1cod').addClass('active');
			})
		})
	})
	
	$(document).ready(function(){
		$('#curso').change(function(e){
			var cod1 = this.value;
			if(cod1 === ''){
				return false;
			}
			$.ajax({
				type: 'post',
				data: {cod1: cod1},
				url: '../php/auto2.php'
			})
			.done(function(datos1){
				$('#nom_cur').val(datos1).addClass('valid');
				$('#nom_cur').next('#1cod').addClass('active');
			})
		})
	})

	</script>

	<script src="../js/btn.js"></script>
</body>
</html>



<?php } ?>