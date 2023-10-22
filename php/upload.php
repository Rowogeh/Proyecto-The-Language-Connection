<?php
	include('root.php');
	
	$arch = $_GET['arch'];

		$C_RUTA_ARCHIVO = "../backup/".$arch;

		$sistema = "show variables where variable_name = 'basedir'";
		$rs_sistema = $bd->query($sistema);
		mysqli_field_seek($rs_sistema, 0);
		$DirBase = $rs_sistema->fetch_row();
		$primero = substr($DirBase[1], 0, 1);
		
		if ($primero == "/"){
			$DirBase[1] = "mysql";
		}else{
			$DirBase[1] = $DirBase[1]."\bin\mysql";
		}
		
		$command = "$DirBase[1] --user=".user." ".bd." --password=".pass." < ".$C_RUTA_ARCHIVO;
		system($command,$valor);

		if ($valor == 0){
			$info = 1;
		}else{
			$info = 0;
		}
		
		$response = null;
		$response[0] = array('info' => $info);
	
	echo json_encode($response);
?>