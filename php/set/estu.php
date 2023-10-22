<?php

include ('../root.php');

class estu{

	private
	$curso,
	$insc,
	$nom,
	$ape,
	$ci,
	$gen,
	$fnac,
	$lanc,
	$dir,
	$telm,
	$telf,
	$cod_nom,
	$bd,
	$id;	

	public function __construct($curso,$insc,$nom,$ape,$ci,$gen,$fnac,$lnac,
							 	$dir,$telm,$telf,$cod_nom,$bd,$id){

		$this->curso  = $curso;
		$this->insc  = $insc;
		$this->nom   = $nom;
		$this->ape   = $ape;
		$this->ci    = $ci;
		$this->gen   = $gen;
		$this->fnac  = $fnac;
		$this->lnac  = $lnac;
		$this->dir   = $dir;
		$this->telm  = $telm;
		$this->telf  = $telf;
		$this->cod_nom  = $cod_nom;
		$this->bd    = $bd;
		$this->id    = $id;

	}

/*---------------------------------------------------------------------------------------------------------*/ 

	public function add(){
		
		$query = "insert into estudiante values(
		null,
		'$this->curso',
		'$this->insc',
		'$this->nom',
		'$this->ape',
		'$this->ci',
		'$this->gen',
		'$this->fnac',
		'$this->lnac',
		'$this->dir',
		'$this->telm',
		'$this->telf',
		'$this->cod_nom')";

		if($this->bd->query($query)): ?>

			<!--AJAX no esta mostrando los mensajes-->

			<script type="text/javascript">
				
				alert('¡Registro Exitoso!');
	        	
			</script> <?php

				else : ?>

					<input type="hidden" id="errno" value="<?php echo $this->bd->errno; ?>">

					<script type="text/javascript">
							
						if(document.getElementById('errno').value === '1062'){
							
							alert('Ya registro a este Estudiante');
						
						}else{
							
							alert("Error al Registrar <?php echo $this->bd->error; ?>");
						
						}

					</script> <?php

		endif;
	}

/*---------------------------------------------------------------------------------------------------------*/ 

	public function delete(){

		$query = "delete from estudiante where id = '$this->id'";
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

/*---------------------------------------------------------------------------------------------------------*/ 

	public function update(){

		$query = "update estudiante set
		curso  = '$this->curso',
		nom   = '$this->nom',
		ape   = '$this->ape',
		gen   = '$this->gen',
		ci    = '$this->ci',
		fnac  = '$this->fnac',
		lnac  = '$this->lnac',
		dir   = '$this->dir',
		telm  = '$this->telm',
		telf  = '$this->telf',
		cod_nom  = '$this->cod_nom'
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

/*---------------------------------------------------------------------------------------------------------*/ 


}

$bd->set_charset('utf8');

if($bd->connect_errno){

	echo $bd->connect_error;

	exit();
}

$curso  = isset($_POST['curso'])     ? $_POST['curso']   : '';
$insc  = isset($_POST['insc'])     ? $_POST['insc']   : '';
$nom   = isset($_POST['nom'])      ? $_POST['nom']    : '';
$ape   = isset($_POST['ape'])      ? $_POST['ape']    : '';
$ci    = isset($_POST['ci'])       ? $_POST['ci']     : '';
$gen   = isset($_POST['gen'])      ? $_POST['gen']    : '';
$fnac  = isset($_POST['fnac'])     ? $_POST['fnac']   : '';
$lnac  = isset($_POST['lnac'])     ? $_POST['lnac']   : '';
$dir   = isset($_POST['dir'])      ? $_POST['dir']    : '';
$telm  = isset($_POST['telm'])     ? $_POST['telm']   : '';
$telf  = isset($_POST['telf'])     ? $_POST['telf']   : '';
$cod_nom  = isset($_POST['cod_nom'])     ? $_POST['cod_nom']   : '';
$id    = isset($_POST['id'])       ? $_POST['id']     : '';
$orden = isset($_POST['orden'])    ? $_POST['orden']  : '';

$var = new estu($curso, 
				$insc, 
				$nom, 
				$ape, 
				$ci, 
				$gen, 
				$fnac, 
				$lnac, 
				$dir, 
				$telm, 
				$telf,
				$cod_nom, 
				$bd,
			    $id);

//$var->delete();

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