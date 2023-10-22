<?php

include ('../root.php');

class mobin{

	private
	$curso,
	$nom_cur,
	$rep,
	$nom_est,
	$nota,
	$bd,
	$id;

	public function __construct($curso,$nom_cur,$rep,$nom_est,$nota,$bd,$id){

		$this->curso = $curso;
		$this->nom_cur = $nom_cur;
		$this->rep = $rep;
		$this->nom_est = $nom_est;
		$this->nota = $nota;
		$this->bd  = $bd;
		$this->id  = $id;
	}

/*---------------------------------------------------------------------------------------------------------*/ 

	public function add(){

		$query = "insert into notas values(
		null,
		'$this->curso',
		'$this->nom_cur',
		'$this->rep',
		'$this->nom_est',
		'$this->nota')";

		if($this->bd->query($query)): ?>

			<script type="text/javascript">

				alert('¡Registro Exitoso!');

			</script> <?php 

				else : ?>	

					<input type="hidden" id="errno" value="<?php echo $this->bd->errno; ?>"> 	

					<script type="text/javascript">
							
						if(document.getElementById('errno').value === '1062'){
							
							alert('Ya registro esta nota');

						}else{

							alert("Error al Registrar <?php echo $this->bd->error; ?>");

						}

					</script> <?php

		endif;

	}

/*---------------------------------------------------------------------------------------------------------*/ 

	public function update(){

		$query = "update notas set
		curso   =  '$this->curso',
		nom_cur   =  '$this->nom_cur',
		rep   =  '$this->rep',
		nom_est   =  '$this->nom_est',
		nota   =  '$this->nota'
		where id='$this->id'";

		//$query = str_replace("''", 'null', $query);

		 if($this->bd->query($query)): ?>
					
		 	<script type="text/javascript">
		 		
		 		alert('¡Registro Actualizado!');

		 	</script>

		 	<?php else: ?>

		 		<script type="text/javascript">
		 			
		 			alert("Error al Actualizar <?php echo $this->bd->error; ?>");

		 		</script>

		 	<?php endif;

	}

/*---------------------------------------------------------------------------------------------------------*/ 

		public function delete(){

		$query = "delete from notas where id = '$this->id'";
		//$query = "delete from estudiante where id = '12'";

		if ($this->bd->query($query)) : ?>

			<script type="text/javascript">
				
				alert('Registro Borrado');
				window.location.reload(true);

			</script>

		<?php else: ?>

			<script type="text/javascript">

				//Problema si no muestra el mensaje
				
				alert("Error al Borrar <?php echo $this->bd->error; ?>");

			</script>

		<?php endif; 

		}
}

/*---------------------------------------------------------------------------------------------------------*/ 

$bd->set_charset('utf8');

if($bd->connect_errno){

	echo $bd->connect_error;

	exit();
}

$curso  = isset($_POST['curso'])   	 ? $_POST['curso']    : '';
$nom_cur  = isset($_POST['nom_cur'])   	 ? $_POST['nom_cur']    : '';
$rep  = isset($_POST['rep'])   	 ? $_POST['rep']    : '';
$nom_est  = isset($_POST['nom_est'])   	 ? $_POST['nom_est']    : '';
$nota  = isset($_POST['nota'])   	 ? $_POST['nota']    : '';
$id   = isset($_POST['id'])      ? $_POST['id']     : '';
$orden  = isset($_POST['orden']) ? $_POST['orden']  : '';

$var = new mobin($curso, $nom_cur, $rep, $nom_est, $nota, $bd, $id);

switch($orden){

	case 'add':
	$var->add();
	break;

	case 'delete':
	$var->delete();
	break;

	case 'update':
	$var->update();
	break;
}

?>