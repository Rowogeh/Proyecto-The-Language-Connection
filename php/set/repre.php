<?php

include ('../root.php');

class repre{

	private 
	$id,
	$ci,
	$nom,
	$ape,
	$par,
	$telm,
	$telf,
	$ci_est,
	$bd;

	public function __construct($id,$ci,$nom,$ape,$par,$telm,$telf,$ci_est,$bd){

		$this->id   = $id;
		$this->ci   = $ci;
		$this->nom  = $nom;
		$this->ape  = $ape;
		$this->par  = $par;
		$this->telm = $telm;
		$this->telf = $telf;
		$this->ci_est = $ci_est;
		$this->bd   = $bd;

	}

/*---------------------------------------------------------------------------------------------------------*/  

	public function add(){

		$query = "insert into representante values(
		null,
		'$this->ci',
		'$this->nom',
		'$this->ape',
		'$this->par',
		'$this->telm',
		'$this->telf',
		'$this->ci_est')";

		if($this->bd->query($query)): ?>

			<script type="text/javascript">

				alert('¡Registro Exitoso!');

			</script> <?php 

				else : ?>	

					<input type="hidden" id="errno" value="<?php echo $this->bd->errno; ?>"> 	

					<script type="text/javascript">
							
						if(document.getElementById('errno').value === '1062'){
							
							alert('Ya registro a este Representante');
							

						}else{

							alert("Error al Registrar <?php echo $this->bd->error; ?>");
							

						}

					</script> <?php

		endif;

	}

/*---------------------------------------------------------------------------------------------------------*/ 

	public function update(){

		$query = "update representante set
		ci   =  '$this->ci',
		nom   =  '$this->nom',
		ape   =  '$this->ape',
		par   =  '$this->par',
		telm  =  '$this->telm',
		telf  =  '$this->telf',
		ci_est  =  '$this->ci_est'
		where id='$this->id'";

		$query = str_replace("''", 'null', $query);

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
	
	public function delete(){

		$query = "delete from representante where id = '$this->id'";
		
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

/*---------------------------------------------------------------------------------------------------------*/  

}

$bd->set_charset('utf8');

if($bd->connect_errno){

	echo $bd->connect_error;

	exit();
}

$id    = isset($_POST['id'])   ? $_POST['id']    : '';
$ci    = isset($_POST['ci'])   ? $_POST['ci']    : '';
$nom   = isset($_POST['nom'])  ? $_POST['nom']   : '';
$ape   = isset($_POST['ape'])  ? $_POST['ape']   : '';
$par   = isset($_POST['par'])  ? $_POST['par']   : '';
$telm  = isset($_POST['telm']) ? $_POST['telm']  : '';
$telf  = isset($_POST['telf']) ? $_POST['telf']  : '';
$ci_est  = isset($_POST['ci_est']) ? $_POST['ci_est']  : '';
$orden = isset($_POST['orden'])? $_POST['orden'] : '';

$var = new repre(
				$id,
				$ci, 
				$nom, 
				$ape, 
				$par,
				$telm, 
				$telf, 
				$ci_est,
				$bd);

//$var->add();

switch($orden){

	case 'add':
	$var->add();
	break;

	case 'update':
	$var->update();
	break;

	case 'delete':
	$var->delete();
	break;

}

?>