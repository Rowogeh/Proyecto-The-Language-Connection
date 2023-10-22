<?php
include ('root.php');

if ($bd->connect_errno){
	echo $bd->connect_error;
  exit();
}

$bd->set_charset('utf8');
date_default_timezone_set('America/Caracas');

$C_RESPALDO = 'RES_'.date("d_m_Y_h_i_s").'.sql';
$C_RUTA_ARCHIVO =/*$_SERVER['DOCUMENT_ROOT'].*/'../backup/'.$C_RESPALDO; 

$sistema = "SHOW variables WHERE variable_name = 'basedir'";
$rs_sistema = $bd->query($sistema);
mysqli_field_seek($rs_sistema, 0);
$DirBase = $rs_sistema->fetch_row();
$primero = substr($DirBase[1], 0, 1);

if ($primero == "/"){
	$DirBase[1] = "mysqldump";
}
else{
	$DirBase[1] = $DirBase[1]."\bin\mysqldump";
}
$command = "$DirBase[1] --user=".user." ".bd." --password=".pass." > ".$C_RUTA_ARCHIVO;
system($command,$valor);
	
if ($valor == 0){
	$info = 1;
}
else{
	$info = 0;
}
	
$response = null;
$response[0] = array('info' => $info);
	
echo json_encode($response); 
?>