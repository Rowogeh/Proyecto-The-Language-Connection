<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include('head.html');?>

</head>
<body>
	
	<?php include 'nav.php' ?>

<main>
<div class="container content-section top1">
	
	<div class="col-lg-8 col-lg-offset-2">

		<h4>Recuperar Clave de Acceso</h4>

		<form id="reclave" class="contactform" autocomplete="off">
			<div class="form">
				<input id="usu" name="usu" type="text" placeholder="Nombre de Usuario" required>			
				<input id="pre" name="pre" type="text" placeholder="Pregunta Secreta" required>		
				<input id="res" name="res" type="text" placeholder="Respuesta Secreta" required>
				<input type="hidden" name="shibuya" value="restore">
				
			</div>

			
		</form>

		<div class="text-center">
			<button class="red" type="button" id="atras"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="green" type="submit" id="submit" form="reclave">Procesar <i class="fa fa-arrow-right"></i></button>
		</div>
		
	</div>
</div>
</main>

<div id="here"></div>

<?php include 'footer.php' ?>

	<script type="text/javascript">
		
		$('#atras').click(function(){
			window.location.href = '../html/';
		})


	</script>
</body>
</html>