<!DOCTYPE html>
<html>
<head>
	<?php include '../html/head.html'; ?>
</head>
<body>

	<?php include '../html/navbar.php'; ?>

	<script type="text/javascript">
			function eliminar(arch){
				if(confirm('Desea eliminar este respaldo')){
					$.ajaxSetup({cache:false});
					$.getJSON('delete.php', {arch: arch}, function(data){
						if(data[0].info == 1){
							alert('Respaldo eliminado');
							$.ajaxSetup({cache: false});
							$.getJSON('table.php', function(data) {
								$('#datosdb').html(data[0].tabla);
							});							
						}else{
							alert('Error al eliminar el respaldo');
							$.ajaxSetup({cache: false});
							$.getJSON('table.php', function(data) {
								$('#datosdb').html(data[0].tabla);
							});
						}
					});
				}		
			}
			
			function cargar(arch){		
				if(confirm('¿Desea modificar la base de datos actual este respaldo?')){
					$.ajaxSetup({cache:false});
					$.getJSON('upload.php', {arch: arch}, function(data){
						if(data[0].info == 1){
							alert('Se modifico la base de datos');
		          window.location.reload(true);
						}else{
							alert('Error al cargar el respaldo');					
						}
					});
				}				
			}

	</script>

	<main>
		<div class="container">
		  <div id="datosdb">
		    <script type="text/javascript">
		      $(document).ready(function (){
		        $.ajaxSetup({cache: false});
		        $.getJSON('table.php', function(data) {
		          $('#datosdb').html(data[0].tabla);
		        });	
		      });
		    </script>
		  </div>
		</div>
	</main>

</body>
</html>