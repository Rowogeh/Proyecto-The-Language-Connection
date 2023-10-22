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

	$query = "select * from representante where id='$id'";

	if (!$res = $bd->query($query)){

		echo $bd->error;
		exit();
	}

	$row = $res->fetch_assoc();

?>
<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">

		<h4 class="text-center">Editar Representante Cedula: <?php echo $row['ci']?></h4>

		<form id="actr" autocomplete="off" class="contactform">
			
			
			<div class="row">

				<div class="col-md-3">
					<input id="nom" name="nom" type="text" placeholder="Nombres" value="<?php echo $row['nom'] ?>" required>
				</div>

				<div class="col-md-3">
					<input id="ape" name="ape" type="text" class="validate text-only cap" placeholder="Apellidos" value="<?php echo $row['ape'] ?>" required>
				</div>

				<div class="col-md-3">
					<input id="ci" name="ci" type="text" class="validate ced cap" placeholder="Cedula (V/E-00000000)" value="<?php echo $row['ci'] ?>" required>
				</div>

				<div class="col-md-3">
					<input type="text" name="par" placeholder="Parentesco" required>
				</div>
				
				
			</div>

			<div class="row">

				
				<div class="col-md-3">
					<input id="telm" name="telm" type="text" class="validate tlf" placeholder="Telefono Celular (0000)-000-0000" value="<?php echo $row['telm'] ?>" required>
				</div>
				
				<div class="col-md-3">
					<input id="telf" name="telf" type="text" class="validate tlf" placeholder="Telefono Fijo (0000)-000-0000" value="<?php echo $row['telf'] ?>" required>
				</div>

			</div>
			<div class="row">
				<div class="col-md-3">
					<input id="ci_est" name="ci_est" type="text" class="ced" placeholder="Cedula del estudiante (V/E-00.000.000)" value="<?php echo $row['ci_est'] ?>" required>
				</div>
				<div class="col-md-6">
					<input id="rep_nom" name="rep_nom" placeholder="Nombre del estudiante" readonly required>
				</div>
		

			</div>
			
			<input type="hidden" name="orden" value="update">
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
			
		</form>
		
		<div class="text-center">
	    	<button class="red" onclick="location.reload()" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
   			<button class="green" type="submit" form="actr">Actualizar <i class="fa fa-edit"></i></button>
    	</div>
	</div>
</div>
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
		$('#atras3').click(function(){
			window.location.href = '../php/listr.php';
		})

	</script>
	

	


<?php } ?>