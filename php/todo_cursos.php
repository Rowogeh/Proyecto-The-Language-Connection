<?php
include '../php/config/config.php';

$datab = new mysqli (host, usr, pssw, db);
$datab->set_charset('utf8');
if($datab->connect_errno){
  echo $datab->connect_error;
  exit();
}

$nom = $_GET['nom'];

$consulta = "SELECT * FROM cursos WHERE nom = '$nom'";

if(!$res = $datab->query($consulta)){
	echo $datab->error;
	exit();
}

$fila = $res->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Datos Completos del curso</title>

  <?php include '../html/files.html'; ?>
</head>
<body>
  <main>
	<?php if($res->num_rows): ?>
		<div class="container">
			<table class="centered bordered">
				<tr>
					<thead>
						<th>Nombre</th>
						<th>Codigo</th>
					</thead>
				</tr>
				<tbody>
					<tr>
						<td class="cap"><?php echo $fila['nom'] ?></td>
						<td class="cap"><?php echo $fila['cod'] ?></td>
					</tr>
					
					
					
					
					
					
					
					
					
				</tbody>
			</table>
			<div class="fixed-action-btn">
    		<button class="btn-floating btn-large waves-effect waves-light red" onclick="window.close()">
      		<i class="large material-icons">close</i>
    		</button>
		  </div>
		</div>
  <?php endif; ?>
  </main>
</body>
</html>