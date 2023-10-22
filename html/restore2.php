<?php
	$usu     = $_POST['usu'];
	$current = $_POST['pass'];
?>


<div class="container content-section top1">
	
	<div class="col-lg-8 col-lg-offset-2">

		<h4>Cambio de Clave de Acceso para <?php echo $usu ?></h4>

		<form id="nuclave" class="contactform" autocomplete="off">
			<div class="form">
				<input id="pass" name="pass" type="password" placeholder="Contraseña Nueva" required>			
				<input id="rpass" name="rpass" type="password" placeholder="Confirmar Contraseña" required>	
				
				<input type="hidden" name="shibuya" value="restorepass">
				<input type="hidden" name="usu"     value="<?php echo $usu ?>">
				<input type="hidden" name="curr"    value="<?php echo $current ?>">
				
			</div>

		</form>

		<div class="text-center">
			<button class="red" type="button" id="atras2"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="green" type="submit" form="nuclave">Procesar <i class="fa fa-arrow-right"></i></button>
		</div>
		
	</div>
</div>
	
	<script type="text/javascript">
		
		$('#atras2').click(function(){
			window.location.href = '../html/restore.php';
		})

	</script>
