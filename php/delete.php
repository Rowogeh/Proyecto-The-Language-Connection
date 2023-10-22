<?php 
	$arch = $_GET['arch'];
		
	if(unlink('../backup/'.$arch)){
		$info = 1;
	}else{
		$info = mysql_error();
	}
	
	$response = null;
	$response[0] = array('info' => $info);
	
	echo json_encode($response);		
?>