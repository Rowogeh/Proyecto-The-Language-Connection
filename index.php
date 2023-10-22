<?php ob_start();

error_reporting(E_ERROR);

include ('php/root.php');

if($bd->connect_error){

	echo "Error al conectarse con la base de datos,    <br>
	     consulte con los desarrolladores del sistema  <br>".

	     "Error: ".           $bd->connect_error.     '<br>'.
		 "Codigo de error: ". $bd->connect_errno;

}else{

	header('location: html');
	
}

/*Sistema de Información para la Fundación Orquesta Sinfonica Juvenil e Infantil
Tovar Estado Mérida, realizado por los estudiantes Elis Peña y César Sosa para el
Trimestre número III en la Universidad Politecnica Territorial del Estado Mérida
"Kleber ramirez".*/

?>