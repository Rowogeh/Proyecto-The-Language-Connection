<!DOCTYPE html>
<html>
<head>
	<?php include('head.html');?>
</head>
<body>

	<?php include 'nav.php' ?>

<div class="container content-section top">
	
	<div class="col-lg-8 col-lg-offset-2">

		<form id="iniciar" class="contactform" autocomplete="off">

			<div class="form">
				
				<input id="usuario" type="text" name="name" placeholder="Usuario" required>	

				<input id="clave" type="password" placeholder="Contraseña" required>
				
			</div>

		</form>

	<div class="text-center">
		<button class="green" type="submit" form="iniciar"><i class="fa fa-music"></i> Entrar</button>
	</div>
		
	</div>

	
</div>

</div>
</div>

	<?php include 'footer.php' ?>
	
</body>
</html>

