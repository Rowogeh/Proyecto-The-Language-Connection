<footer>

	<?php include '../php/root.php';

	$usu = $_COOKIE['usu'];

	$query = "select * from usuario where usu = '$usu'"; 

	$var = $bd->query($query);

	$row = $var->fetch_assoc();
	?>

	<button class="info"><i class="fa fa-user"></i> <?php echo $row['nom']." ".$row['ape'] ?></button> 

	<style type="text/css">
		
		.info{
			background-color:transparent;
			padding:10px 0px;
			width:auto;
			border:1px solid #5D3CD9;
			padding:4px 10px;
			display:inline-block;
		}

		.info:hover{
			background-color: #5D3CD9;
			color:#fff;
			border:1px solid #5D3CD9;
		}

	</style>
</footer>