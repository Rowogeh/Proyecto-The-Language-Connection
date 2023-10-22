<?php

include ('root.php');

class autocomplete{


	public function representante(){

		$bd = new mysqli(host,user,pass,bd);

		$bd->set_charset('utf8');

		if($bd->connect_errno){

			echo $bd->connect_error;

			exit();
		}

		$ci = $_POST['ced'];

		$consult ="select nom,ape from estudiante where ci = '$ci'";

		if(!$res = $bd->query($consult)){

			echo $bd->error;
			
			exit();
		}

		$row = $res->fetch_assoc();
		$nombres = $row['nom'].' '.$row['ape'];

		echo $nombres;
	}

}

$var = new autocomplete();
$var->representante();

?>