<?php
if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
  header('location: ../');
}else{

include '../php/config/config.php';

$datab = new mysqli (host, usr, pssw, db);
$datab->set_charset('utf8');
if($datab->connect_errno){
  echo $datab->connect_error;
  exit();
}

$nom = $_POST['nom'];

$consulta = "SELECT * FROM cursos WHERE nom = '$nom'";

if(!$res = $datab->query($consulta)){
	echo $datab->error;
	exit();
}

$row = $res->fetch_assoc();
?>

<div class="container">
	<div class="section">
		<div class="row">
			<div class="col s12 center">
				<h3><i class="mdi-content-send brown-text"></i></h3>
				<h4>Datos del Curso</h4>
				<div class="section">
					<div class="row">
				    <form id="editcursos" class="col s12" autocomplete="off">
				     
				      <div class="row">
				         <div class="col s6">
				          <div class="input-field ">
				            <input id="nom" name="nom" type="text" class="validate text-only cap" required value="<?php echo $row['nom'] ?>">
				            <label class="active" for="nom" data-error="Error" data-success="Correcto">Nombre</label>
				          </div>
				        </div>
				        <div class="col s6">
				          <div class="input-field ">
				            <input id="cod" name="cod" type="text" class="validate text-only cap" required value="<?php echo $row['cod'] ?>">
				            <label class="active" for="cod" data-error="Error" data-success="Correcto">cod</label>
				          </div>
				        </div>
				      </div>



				      
				        

				     
							
				      

				    

				      

				      

				      
				      <input type="hidden" name="orden" value="editar">
				      <input type="hidden" name="idaux" value="<?php echo $nom; ?>">
				    </form>
				    <div class="col s12">
				    	<button type="button" class="btn red waves-effect waves-light" onclick="location.reload()">
				    		<i class="material-icons left">arrow_back</i>Regresar
				    	</button>
				    	<button type="submit" form="editR" class="btn waves-effect waves-light">
				    		<i class="material-icons right">send</i>Editar
				    	</button>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modal"></div>

<script type="text/javascript">
	$('select').material_select();
  $("select[required]").css({position: 'absolute', display: 'inline', height: 0, padding: 0, width: 0, opacity: 0});
	$('.material-tooltip').remove();
	
	$('.ced').mask('A-00.000.000',{
		  'translation':{
		    A:{pattern: /[VE,ve]/}
		  }
		});

	

	$('.text-only').keydown(function(v){
	  if ((v.keyCode > 47 && v.keyCode < 58)){
	    v.preventDefault();
	  }
	});
</script>
<?php } ?>