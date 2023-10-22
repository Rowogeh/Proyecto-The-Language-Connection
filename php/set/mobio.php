<?php

include ('../root.php');

class mobio{

	private
	$nom,
	$mar,
	$mdl,
	$ser,
	$cod,
	$des,
	$bd,
	$id;
	

	public function __construct($nom,$mar,$mdl,$ser,$cod,$des,$bd,$id){

		$this->nom = $nom;
		$this->mar = $mar;
		$this->mdl = $mdl;
		$this->ser = $ser;
		$this->cod = $cod;
		$this->des = $des;
		$this->bd = $bd;
		$this->id = $id;

	}

/*---------------------------------------------------------------------------------------------------------*/  

	public function add(){

		$query = "insert into oficina values(
		null,
		'$this->nom', 
		'$this->mar', 
		'$this->mdl', 
		'$this->ser', 
		'$this->cod', 
		'$this->des')";

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

	public function update(){

		$query = "update oficina set
		nom   =  '$this->nom',
		mar   =  '$this->mar',
		mdl   =  '$this->mdl',
		ser   =  '$this->ser',
		cod   =  '$this->cod',
		des   =  '$this->des'
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

	public function delete(){

		$query = "delete from oficina where id = '$this->id'";
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

}

$bd->set_charset('utf8');

if($bd->connect_errno){

	echo $bd->connect_error;

	exit();
}

$nom  = isset($_POST['nom'])   	 ? $_POST['nom']    : '';
$mar  = isset($_POST['mar'])   	 ? $_POST['mar']    : '';
$mdl  = isset($_POST['mdl'])   	 ? $_POST['mdl']    : '';
$ser  = isset($_POST['ser'])   	 ? $_POST['ser']    : '';
$cod  = isset($_POST['cod'])   	 ? $_POST['cod']    : '';
$des  = isset($_POST['des'])   	 ? $_POST['des']    : '';
$id   = isset($_POST['id'])      ? $_POST['id']     : '';
$orden  = isset($_POST['orden']) ? $_POST['orden']  : '';

$var = new mobio($nom, $mar, $mdl, $ser, $cod, $des, $bd, $id);

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