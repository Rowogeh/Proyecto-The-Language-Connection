<?php

include ('../root.php');

class usuario{

	private $nomApe,
		    $usu,
		    $pass,
		    $lvl,
		    $email,
		    $ask,
		    $res,
		    $bd,
		    $idaux,
		    $oldpass,
		    $curr,
		    $rpass,
		    $nom,
		    $ape;

    public function __construct($nomApe, 
    	                        $usu, 
    	                        $pass, 
    	                        $lvl, 
    	                        $email, 
    	                        $pre, 
    	                        $res, 
    	                        $bd, 
    	                        $idaux, 
    	                        $oldpass, 
    	                        $curr, 
    	                        $rpass,
    	                    	$nom,
    	                    	$ape){

    	$this->nomApe  = $nomApe;
	    $this->usu     = $usu;
	    $this->pass    = $pass;
	    $this->lvl     = $lvl;
	    $this->email   = $email;
	    $this->pre     = $pre;
	    $this->res     = $res;
	    $this->bd      = $bd;
	    $this->idaux   = $idaux;
	    $this->oldpass = md5($oldpass);
	    $this->curr    = $curr;
	    $this->rpass   = $rpass;
	    $this->nom     = $nom;
	    $this->ape     = $ape;
    }

/*---------------------------------------------------------------------------------------------------------*/ 

public function add(){

	if(strlen($this->pass) < 8 ): ?>
		
	<script type="text/javascript">
		
		alert('La Contraseña debe tener minimo 8 caracteres')
		$('#rpass').val('')
		$('pass').val('').focus()

	</script><?php

	elseif($this->pass != $this->rpass): ?>

		<script type="text/javascript">
			
			alert('La Contraseña no coincide')
			$('#rpass').val('')
        	$('#pass').val('').focus()

		</script>

	<?php else:

		$query = "insert into usuario values(
		'$this->usu',
	     md5('$this->pass'),
	    '$this->nom',
	    '$this->ape',
	    '$this->pre',
	    '$this->res',
	    '$this->lvl')";

	    if($this->bd->query($query)): ?>

	    	<script type="text/javascript">
	    		
	    		alert('¡Registro Exitoso!');

	    	</script>

		<?php else : ?>

			<input type="hidden" id="errno" value="<?php echo $this->bd->errno; ?>">

			<script type="text/javascript">
				
				if(document.getElementById('errno').value === '1062'){

					alert('Ya existe el nombre de usuario, utilize otro');

				}

			</script>
		
		<?php

		endif;

	 endif;
} 


/*---------------------------------------------------------------------------------------------------------*/ 

public function updateus(){

	$query = "update usuario set
		nom   =  '$this->nom',
		ape   =  '$this->ape',
		pre   =  '$this->pre',
		res  =  '$this->res'
		where usu='$this->usu'";

	if($this->bd->query($query)): ?>
					
		 	<script type="text/javascript">
		 		
		 		alert('¡Datos de Administrador Actualizdos!');

		 	</script>

		 	<?php else: ?>

		 		<script type="text/javascript">
		 			
		 			alert("Error al Actualizar <?php echo $this->bd->error; ?>");

		 		</script>

		 	<?php endif;

}


/*---------------------------------------------------------------------------------------------------------*/ 

public function delete(){

}

/*---------------------------------------------------------------------------------------------------------*/  

    public function update(){

    	if(strlen($this->pass) < 8 ): ?>

    		<script type="text/javascript">
    			
				alert('La clave debe de tener minimo 8 caracteres')

				$('#rpass').val('')
        		$('#pass').val('').focus()

    		</script> <?php

    		elseif($this->pass != $this->rpass): ?>

    			<script type="text/javascript">
    				
					alert('La clave no coincide')

			        $('#rpass').val('')
			        $('#pass').val('').focus()

    			</script>

      		<?php elseif($this->curr != $this->oldpass): ?>

      			<script type="text/javascript">
      				
					alert('La clave actual no coincide');

        			$('#oldpass').val('').focus();

      			</script>

      		<?php else :

      			$query = "update usuario set pass = md5('$this->pass') where usu = '$this->idaux'";

      			if($this->bd->query($query)) : ?>

      				<script type="text/javascript">
      					
      					alert('¡Clave actualizada!');

      				</script>

      			<?php else : ?>	

      				<script type="text/javascript">
      					
						alert("Error al Actualizar <?php echo $this->bd->error ?>");

      				</script>
				
				<?php endif;
			endif;
    }

/*---------------------------------------------------------------------------------------------------------*/    

	public function restore(){ 

		/*Función para validar los datos del usuario,
		pregunta y respuesta secreta mediante una consulta SQL*/

		$query = "select * from usuario where usu = '$this->usu' and pre = '$this->pre' and res = '$this->res'";

		if($res = $this->bd->query($query)):

			if($res->num_rows):

				$row = $res->fetch_assoc();
				$array = array(
					'valida' => 1,
					'usu'    => $row['usu'],
					'pass'   => $row['pass']
				);

				echo json_encode($array);

			else:

				$array = array('valida' => 0);

				echo json_encode($array);

			endif;
		endif;
	}

/*---------------------------------------------------------------------------------------------------------*/  

	public function restorepass(){

		if(strlen($this->pass) < 8): ?>

			<script type="text/javascript">

				alert('La clave debe de tener minimo 8 caracteres')

				$('#rpass').val('')
				$('#pass').val('').focus()

			</script><?php

			elseif($this->pass != $this->rpass): ?>

				<script type="text/javascript">
					
					alert('La clave no coincide')

					$('#rpass').val('')
					$('#pass').val('').focus()

				</script>
	
			<?php else:

				$query = "update usuario set pass = md5('$this->pass') where usu = '$this->usu' and pass = '$this->curr'";

				if ($this->bd->query($query)): ?>

					<script type="text/javascript">
						
						alert('¡Clave actualizada!');
						location.href='../html/loger.php';

					</script>

				<?php else: ?>

					<script type="text/javascript">

			          	alert("Error al actualizar <?php echo $this->bd->error ?>");

			        </script>

			    <?php endif;

		endif;
	}

/*---------------------------------------------------------------------------------------------------------*/  

}


$bd->set_charset('utf8');

if($bd->connect_errno){

	echo $bd->connect_error;
	
	exit();
}

$nomApe   = isset($_POST['nomApe'])  ? $_POST['nomApe']  : array('' => '');
$usu      = isset($_POST['usu'])     ? $_POST['usu']     : '';
$pass     = isset($_POST['pass'])    ? $_POST['pass']    : '';
$lvl      = isset($_POST['lvl'])     ? $_POST['lvl']     : '';
$email    = isset($_POST['email'])   ? $_POST['email']   : '';
$pre      = isset($_POST['pre'])     ? $_POST['pre']     : '';
$res      = isset($_POST['res'])     ? $_POST['res']     : '';
$idaux    = isset($_POST['idaux'])   ? $_POST['idaux']   : '';
$shibuya  = isset($_POST['shibuya']) ? $_POST['shibuya'] : '';
$oldpass  = isset($_POST['oldpass']) ? $_POST['oldpass'] : '';
$curr     = isset($_POST['curr'])    ? $_POST['curr']    : '';
$rpass    = isset($_POST['rpass'])   ? $_POST['rpass']   : '';
$nom      = isset($_POST['nom'])     ? $_POST['nom']     : '';
$ape      = isset($_POST['ape'])     ? $_POST['ape']     : '';

$var = new usuario($nomApe, 
				   $usu, 
				   $pass, 
				   $lvl, 
				   $email, 
				   $pre, 
				   $res, 
				   $bd, 
				   $idaux, 
			       $oldpass, 
				   $curr, 
				   $rpass,
				   $nom,
				   $ape);


switch($shibuya){
	
	case 'add':
	$var->add();
	break;

	case 'updateus':
	$var->updateus();
	break;

	/*
	case 'delete':
	$var->delete();
	break;*/
	
	case 'restore':
	$var->restore();
	break;

	case 'restorepass':
	$var->restorepass();
	break;

	case 'edit':
	$var->update();
	break;
}

?>