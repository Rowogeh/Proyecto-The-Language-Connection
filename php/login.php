<?php

include('root.php'); 	

if($bd->connect_errno){
         
	echo $bd->connect_errno; 
	    
	exit();                     
}

$bd->set_charset('utf8');      

$usuario =     $_GET['usuario'];    
$clave   = md5($_GET['clave']); 

$query = "select * from usuario where usu = '$usuario' and pass = '$clave'";

if (!$var = $bd->query($query)){

	echo $bd->error;
	exit();
	
}

if ($var->num_rows == 1){

	$info = 1;
	$row = $var->fetch_assoc();

}else{

	$info = 0;
}

if ($info == 1){

	$res = null;
	$res[0] = array('info' => $info); 
	$res[1] = array('nom' => $row['nom']); 
	$res[2] = array('ape' => $row['ape']); 
	$res[3] = array('usu' => $row['usu']); 
	
	echo json_encode($res);
}else{

	$res[0] = array('info' => $info);

	echo json_encode($res);
}
?>