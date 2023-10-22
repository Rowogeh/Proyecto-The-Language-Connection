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

	$query = "select * from estudiante where id='$id'";

	if (!$res = $bd->query($query)){

		echo $bd->error;
		exit();
	}

	$row = $res->fetch_assoc();

?>

<div class="container content-section top2">
	 
	<div class="col-md-12 order-md-1">

		<h4 class="text-center">Editar Estudiante Cédula: <?php echo $row['ci']; ?></h4>

		<form id="acte" class="contactform">
			
			<div class="row">

				<div class="col-md-6">
					<input id="curso" name="curso" type="text" placeholder="Codigo de curso" >
				</div>

				<div class="col-md-6">
					<input id="cod_nom" name="cod_nom" placeholder="Nombre del curso" readonly required>
				</div>

			</div>

			<div class="row">

				<div class="col-md-6">
					<input id="nom" name="nom" type="text" class="validate text-only cap" placeholder="Nombres" value="<?php echo $row['nom'] ?>">
				</div>

				<div class="col-md-6">
					<input id="ape" name="ape" type="" class="validate text-only cap" placeholder="Apellidos" value="<?php echo $row['ape'] ?>">
				</div>
			
			</div>

			<div class="row">
				
				<div class="col-md-6">
					<input id="fech" type="datetime" name="insc" value="<?php echo date("Y-m-d");?>">
				</div>
				
				<div class="col-md-6">
					<input id="ci" name="ci" type="text" class="validate ced cap autocomplete" placeholder="Cedula (V/E-00.000.000)" value="<?php echo $row['ci'] ?>">
				</div>

			</div>

			<div class="row">

				<div class="col-md-4 padding">
					<select id="gen" name="gen" class="form-control" required>
						<option>Genero</option>
						<option value="Masculino">Masculino</option>
						<option value="Femenino">Femenino</option>
					</select>

					<script type="text/javascript">
						document.getElementById('gen').value = "<?php echo $row['gen'] ?>"
					</script>
				</div>

				<div class="col-md-4">
					<input id="fnac" name="fnac" type="date" placeholder="Fecha de Nacimiento" value="<?php echo $row['fnac'] ?>">
				</div>

				<div class="col-md-4">
					<input id="lnac" name="lnac" type="" class="text-only" placeholder="Lugar de Nacimiento" value="<?php echo $row['lnac'] ?>">
				</div>

			</div>

			<div class="row">

				<div class="col-md-8">
					<input id="dir" name="dir" type="" placeholder="Dirección" value="<?php echo $row['dir'] ?>">
				</div>

				<div class="col-md-4">
					<input id="telm" name="telm" type="" class="tlf" placeholder="Telefono Célular (0000)-000-0000" value="<?php echo $row['telm'] ?>">
				</div>
				
			</div>

			<div class="row">

				<div class="col-md-4">
					<input id="telf" name="telf" type="" class="tlf" placeholder="Telefono Fijo (0000)-000-0000" value="<?php echo $row['telf'] ?>">
				</div>

				



			</div>

			

			

			

			<input type="hidden" name="orden" value="update">
			<input type="hidden" name="id" value="<?php echo $id ?>">

		</form>

	
		<div class="text-center">
			<button class="red" onclick="location.reload()" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
	   		<button class="green" type="submit" form="acte">Actualizar <i class="fa fa-edit"></i></button>
		</div>

	</div>

</div>

	<script type="text/javascript">

		/*
		$(document).on('submit', '#edite', function(e){
		e.preventDefault();
		var formData = $('#edite').serialize();
			$.ajax({
				type: 'POST',
				url: '../php/set/estu.php',
			    data: formData,
			    dataType: 'html'
				})
			.done(function(html){
				alert('¡Registro Actualizado!');
			    window.location.href = "../php/liste.php";
			})
		});*/
		
		$('.ced').mask('A-00.000.000',{
		  'translation':{
		    A:{pattern: /[VE,ve]/}
		  }
		});

		function mascara(){
			var size = $('#ci').val();
			if(size.length == 0){
				$('.ced').mask('A-00.000.000',{
				  'translation':{
				    A:{pattern: /[VE,ve]/}
				  }
				});
			}
			else if(size.length != 12){
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
		}

		$('.tlf').mask('(0000)-000-0000', {clearIfNotMatch: true});

		$('.text-only').keydown(function(v){
		  if ((v.keyCode > 47 && v.keyCode < 58)){
		    v.preventDefault();
		  }
		});
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

		$('#atras3').click(function(){
			window.location.href = '../php/liste.php';
		})

	</script>


<?php } ?>