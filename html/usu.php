<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{
	?>

<!DOCTYPE html>
<html lang="es">
<head>

	<?php include('head.html') ?>

</head>
<body>

	<?php include 'navbar.php';?>

<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">

		<h4 class="text-center">Crear Nuevo Usuario Administrador</h4>

		<form id="usua" class="contactform">

			<div class="row">

				<div class="col-md-6">
					<input id="nom" type="text" name="nom" placeholder="Nombres" required>
				</div>

				<div class="col-md-6">
					<input id="ape" type="text" name="ape" placeholder="Apellidos" required>
				</div>

			</div>


		<div class="row">

			<div class="col-md-6">
				<input id="pre" type="text" name="pre" placeholder="Pregunta Secreta" required>
			</div>

			<div class="col-md-6">
				<input id="res" type="text" name="res" placeholder="Respuesta Secreta" required>
			</div>

		</div>

		<div class="row">

			<div class="col-md-4">
				<input id="usu" type="text" name="usu" placeholder="Nombre de Usuario" required>
			</div>

			<div class="col-md-4">
				<input id="pass" type="text" name="pass" placeholder="Clave" required>
			</div>

			<div class="col-md-4">
				<input id="rpass" type="text" name="rpass" placeholder="Confirmar Clave" required>
			</div>

		</div>

		<input type="hidden" name="shibuya" value="add">
		<input type="hidden" name="lvl" value="1">

		</form>

		<div class="text-center">
			<button class="red" id="atras" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
		    <button class="green" type="submit" form="usua"><i class="fa fa-pen"></i> Registrar</button>
	    </div>

	</div>
</div>

	

    <div id="here"></div>

    <script src="../js/btn.js"></script>
	
</body>
</html>



<?php } ?>