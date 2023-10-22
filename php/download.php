<?php
	$arch = $_GET['arch'];	
	$url = $_SERVER['DOCUMENT_ROOT'].'../../backup/'.$arch;
	header("Content-type: sql");
	header("Content-Disposition: attachment; filename = $arch");
	$fp = fopen("$url", "r");
	fpassthru($fp);
?>