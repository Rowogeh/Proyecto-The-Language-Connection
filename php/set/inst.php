<?php

include ('../root.php');

class inst{

	private
	$id,
	$cod,
	$nom,
	$bd;

	public function __construct($id,$cod,$nom,$bd){

		$this->id  = $id;
		$this->cod = $cod;
		$this->nom = $nom;
		$this->bd  = $bd;

	}

/*---------------------------------------------------------------------------------------------------------*/  

	public function add(){

		$query = "insert into cursos values(
		null,
		'$this->cod',
		'$this->nom')";

		if($this->bd->query($query)): ?>

			<script type="text/javascript">
				
				alert('¡Registro Exitoso!');

			</script> <?php

				else : ?>

					<input type="hidden" id="errno" value="<?php echo $this->bd->errno; ?>">

					<script type="text/javascript">	

					if(document.getElementById('errno').value === '1062'){
							
							alert('Ya registro este curso');

						}else{

							alert("Error al Registrar <?php echo $this->bd->error; ?>");

						}

					</script> <?php

		endif;

	}

/*---------------------------------------------------------------------------------------------------------*/ 

	public function update(){

		$query = "update cursos set
		cod   =  '$this->cod',
		nom   =  '$this->nom'
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

		$query = "delete from cursos where id = '$this->id'";
		
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

$id    = isset($_POST['id'])    ? $_POST['id']   : '';
$cod   = isset($_POST['cod'])   ? $_POST['cod']   : '';
$nom   = isset($_POST['nom'])   ? $_POST['nom']   : '';
$orden = isset($_POST['orden']) ? $_POST['orden'] : '';
  
$var = new inst(
				$id,
				$cod,
				$nom,	
				$bd);

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