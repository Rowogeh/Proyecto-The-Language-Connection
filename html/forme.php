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

		<h4 class="text-center">Registrar Estudiante</h4>

		<form id="estu" class="contactform">

			

			<div class="row">

				<div class="col-md-6">
					<input id="curso" name="curso" type="text" placeholder="Codigo de curso" >
				</div>

				<div class="col-md-6">
					<input id="cod_nom" name="cod_nom" placeholder="Nombre del curso" >
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<input id="fech" type="datetime" name="insc" value="<?php echo date("Y-m-d");?>">
				</div>

				<div class="col-md-6">
					<input id="nom" name="nom" type="text" class="validate text-only cap" placeholder="Nombres">
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<input id="ape" name="ape" type="" class="validate text-only cap" placeholder="Apellidos">
				</div>

				<div class="col-md-6">
					<input id="ci" name="ci" type="" class="ced" placeholder="Cedula (V/E-00.000.000)" required>
				</div>
				
			</div>

			<div class="row">

				<div class="col-md-4 padding">
					<select id="gen" name="gen" class="form-control" required>
						<option>Genero</option>
						<option value="Masculino">Masculino</option>
						<option value="Femenino">Femenino</option>
					</select>
				</div>

				<div class="col-md-4">
					<input id="fnac" name="fnac" type="date" placeholder="Fecha de Nacimiento">
				</div>

				<div class="col-md-4">
					<input id="lnac" name="lnac" type="" class="text-only" placeholder="Lugar de Nacimiento">
				</div>

			</div>

			<div class="row">

				<div class="col-md-8">
					<input id="dir" name="dir" type="" placeholder="Dirección">
				</div>

				<div class="col-md-4">
					<input id="telm" name="telm" type="" class="tlf" placeholder="Telefono Celular (0000)-000-0000">
				</div>
				
			</div>

			<div class="row">

				<div class="col-md-4">
					<input id="telf" name="telf" type="" class="tlf" placeholder="Telefono Fijo (0000)-000-0000">
				</div>

				



			</div>
			

			

			

			<input type="hidden" name="orden" value="add">

		</form>

	
		<div class="text-center">
			<button class="red" id="atras" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="blue" onclick="location.reload()"><i class="fa fa-brush"></i> Limpiar</button>
			<button class="list" id="list3"><i class="fa fa-eye"></i> Ver Lista</button>
		    <button class="green" type="submit" form="estu"><i class="fa fa-pen"></i> Registrar</button>
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
				$('#rep_nom').val(datos).addClass('valid');
				$('#rep_nom').next('#1rep').addClass('active');
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
				$('#cod_nom').val(datos1).addClass('valid');
				$('#cod_nom').next('#1cod').addClass('active');
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
				$('#cod_nom').val(datos1).addClass('valid');
				$('#cod_nom').next('#1cod').addClass('active');
			})
		})
	})

</script>

<script src="../js/btn.js"></script>
	
</body>
</html>


<?php } ?>