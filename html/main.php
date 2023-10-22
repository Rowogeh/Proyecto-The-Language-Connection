<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{
	?>

<!DOCTYPE html>
<html>
<head>
	<?php include('head.html'); ?>
</head>
<body class="background">
	
	<?php include('navbar.php'); 

	include 'footer2.php';
	?>

	
	

</body>
</html>

<?php } ?>

