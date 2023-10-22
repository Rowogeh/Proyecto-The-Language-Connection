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

$query = "select pass from usuario where usu = '$usu'";

if(!$var = $bd->query($query)){
  echo $bd->error;
  exit();
}

$row = $var->fetch_assoc();

$current = $row['pass'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<?php include('head.html') ?>
	
</head>
<body>

	<?php include 'navbar.php'; ?>

<div class="container content-section top2">
	
	<div class="col-lg-8 col-lg-offset-2">

		<h4 class="text-center">Cambiar Contraseña de Usuario</h4>

		<form id="nclave" class="contactform">
		
		<div class="form">

			<input id="oldpass" name="oldpass" type="password" class="validate" required placeholder="Clave Actual">

			<input id="pass" name="pass" type="password" class="validate" required placeholder="Clave Nueva">

			<input id="rpass" name="rpass" type="password" class="validate" required placeholder="Confirmar Clave">
		
			<input type="hidden" name="shibuya" value="edit">
	        <input type="hidden" name="idaux" value="<?php echo $usu ?>">
	        <input type="hidden" name="curr" value="<?php echo $current ?>">

    	</div>

	</form>

		<div class="text-center">
			<button class="red" type="button" id="atras"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="green" type="submit" form="nclave">Procesar <i class="fa fa-arrow-right"></i></button>
		</div>

	</div>

</div>

	

	<div id="here"></div>

	

	<script src="../js/btn.js"></script>
</body>
</html>

<?php } ?>