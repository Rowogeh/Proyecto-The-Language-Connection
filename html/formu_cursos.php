<?php
if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
  header('location: ../');
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>

	
</head>
<body>
	<header>
		
	</header>

	<main>
		<div class="container">
			<div class="section">
				<div class="row">
					<div class="col s12 center">
						<h3><i class="mdi-content-send brown-text"></i></h3>
						<h4>Datos del curso</h4>
						<div class="section">
							<div class="row">
						    <form id="reg_curs" class="col s12" autocomplete="off">
						     
						      <div class="row">
						         <div class="col s6">
						          <div class="input-field ">
						            <input id="nom" name="nom" type="text" class="validate text cap" required>
						            <label for="nom" data-error="Error" data-success="Correcto">Nombre </label>
						          </div>
						        </div>
						        <div class="col s6">
						          <div class="input-field ">
						            <input id="cod" name="cod" type="text" class="validate text cap" required>
						            <label for="cod" data-error="Error" data-success="Correcto">Apellido (Solo Texto)</label>
						          </div>
						        </div>
						      </div>

						      

						     

						     

						      

						     

						      

						      

						      <input type="hidden" name="orden" value="agregar">
						    </form>
						    <div class="col s12">
						    	<button id="atras" type="button" class="btn red waves-effect waves-light">
						    		<i class="material-icons left">arrow_back</i>Regresar
						    	</button>
						    	<button type="submit" form="cursos_nuevo" class="btn waves-effect waves-light">
						    		<i class="material-icons right">send</i>Registrar
						    	</button>
									<button type="submit" form="add1">Guardar</button>
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div id="modal"></div>



	</script>
	
</body>
</html>
<?php } ?>