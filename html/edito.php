<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{ 

	include ('../php/root.php');

	if($bd->connect_errno){

		echo $bd->connect_error;
		exit();

	}

	$cod = isset($_POST['cod']) ? $_POST['cod'] : '';

	$query = "select * from oficina where cod='$cod'";

	if (!$res = $bd->query($query)){

		echo $bd->error;
		exit();
	}

	$row = $res->fetch_assoc();

?>

<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">

		<h4 class="text-center">Editar Mobiliario Oficina</h4>

		<form id="mo1" class="contactform">

			<div class="row">

				<div class="col-md-4">
					<input id="nom" name="nom" type="text" class="validate text-only cap" placeholder="Mobiliario" value="<?php echo $row['nom']?>">
				</div>

				<div class="col-md-4">
					<input id="mar" name="mar" type="text" class="validate text-only cap" placeholder="Marca" value="<?php echo $row['mar']?>">
				</div>

				<div class="col-md-4">
					<input id="mdl" name="mdl" type="text" placeholder="Modelo" value="<?php echo $row['mdl']?>">
				</div>

			</div>

			<div class="row">

				<div class="col-md-4">
					<input id="ser" name="ser" type="text" placeholder="Serial" value="<?php echo $row['ser']?>">
				</div>

				<div class="col-md-4">
					<input id="cod" name="cod" type="text" placeholder="Código" value="<?php echo $row['cod']?>">
				</div>

				<div class="col-md-4">
					<input id="des" name="des" type="text" placeholder="Descripción" value="<?php echo $row['des']?>">
				</div>

			</div>

		<input type="hidden" name="orden" value="update">
		<input type="hidden" name="id" value="<?php echo $row['id']?>">

	</form>
	
		<div class="text-center">
			<button class="red" onclick="location.reload()" type="button"> <i class="fa fa-arrow-left"></i> Regresar</button>
    		<button class="green" type="submit" form="mo1">Actualizar <i class="fa fa-edit"></i> </button>
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
			window.location.href = '../php/listo.php';
		})

	</script>

<?php } ?>