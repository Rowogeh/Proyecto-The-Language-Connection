<?php

const host='localhost';
const user='root';
const pass='';
const bd='academia';

$bd = new mysqli(host,user,pass,bd);
$bd->set_charset('utf8');

/*if($bd->connect_errno){

	echo $bd->connect_error;
	exit();

}*/

?>