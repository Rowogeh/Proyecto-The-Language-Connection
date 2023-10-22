<?php

include ('../root.php');

class horario{

	private
	$curso1,
	$bd,
	$id;
	

	public function __construct($curso1,$bd,$id){

		$this->curso1 = $curso1;
		$this->bd = $bd;
		$this->id = $id;

	}

/*---------------------------------------------------------------------------------------------------------*/  

	public function add(){

		$query = "insert into horarios values(
		null,
		'$this->curso1')";

		if($this->bd->query($query)): ?>

			<script type="text/javascript">

				alert('¡Registro Exitoso!');

			</script> <?php 

				else : ?>	

					<input type="hidden" id="errno" value="<?php echo $this->bd->errno; ?>"> 	

					<script type="text/javascript">
							
						if(document.getElementById('errno').value === '1062'){
							
							alert('Ya registro a este curso');

						}else{

							alert("Error al Registrar <?php echo $this->bd->error; ?>");

						}

					</script> <?php

		endif;

	}

	public function update(){

		$query = "update horarios set
		curso1   =  '$this->curso1'
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

		$query = "delete from horarios where id = '$this->id'";
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

$curso1  = isset($_POST['curso1'])   	 ? $_POST['curso1']    : '';
$id   = isset($_POST['id'])      ? $_POST['id']     : '';
$orden  = isset($_POST['orden']) ? $_POST['orden']  : '';

$var = new mobio($curso1,$id);

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