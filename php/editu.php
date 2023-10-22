<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{

include ('../php/root.php');

if($bd->connect_errno){         
	echo $bd->connect_errno;    
	exit();                    
}

$usu = $_COOKIE['usu'];

$query = "select * from usuario where usu = '$usu'";

if(!$var = $bd->query($query)){
  echo $bd->error;
  exit();
}

$row = $var->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<?php include('../html/head.html') ?>
	
</head>
<body>

	<?php include '../html/navbar.php' ?>

<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">

	<h4 class="text-center">Editar Datos de Usuario</h4>

		<form id="editar" class="contactform">

			<div class="row">

				<div class="col-md-6">
					<input id="nom" type="text" name="nom" required placeholder="Nombres" value="<?php echo $row['nom'] ?>">
				</div>
			
				<div class="col-md-6">
					<input id="ape" type="text" name="ape" required placeholder="Apellidos" value="<?php echo $row['ape'] ?>">
				</div>

			</div>

			<div class="row">
			
				<div class="col-md-6">
					<input id="pre" type="text" name="pre" required placeholder="Pregunta Secreta" value="<?php echo $row['pre'] ?>">
				</div>

				<div class="col-md-6">
					<input id="res" type="text" name="res" required placeholder="Respuesta Secreta" value="<?php echo $row['res'] ?>">
				</div>

			</div>

			<input type="hidden" name="shibuya" value="updateus">
			<input type="hidden" name="usu" value="<?php echo $row['usu'] ?>">

			<!--<input type="submit" name="" value="enviar">-->

		</form>

		<div class="text-center">
			<button class="red" type="button" id="atras"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="green" type="submit" form="editar">Procesar <i class="fa fa-arrow-right"></i></button>
		</div>

	</div>

</div>

	<div id="here"></div>

	<script type="text/javascript">

		$(document).on('submit', '#editar', function(e){
			e.preventDefault();
			var formData = $('#editar').serialize();
			$.ajax({
				type: 'POST',
				url: 'set/usuario.php',
				data: formData,
				dataType: 'html'
			})
			.done(function(html){
				$('#here').html(html);
			})
		});
		
	</script>

	<script src="../js/btn.js"></script>
</body>
</html>

<?php } ?>