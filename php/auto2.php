<?php

include ('root.php');

class autocomplete{

	public function cursos(){

		$bd = new mysqli(host,user,pass,bd);
		$bd->set_charset('utf8');

		if($bd->connect_errno){

			echo $bd->connect_error;

			exit();
		}

		$cod = $_POST['cod1'];

		$consult ="select nom from cursos where cod = '$cod'";

		if(!$res = $bd->query($consult)){

			echo $bd->error;
			
			exit();
		}

		$row = $res->fetch_assoc();
		$nombres = $row['nom'];

		echo $nombres;
	}

}

$var = new autocomplete();
$var->cursos();

?>