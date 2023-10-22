<?php

if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
	header('location: ../');
}else{
	?>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="shortcut icon" href="">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/style2.css">
	

	

	<title>Academia</title>
	
</head>
<body>

<div class="container content-section top2">
	
	<div class="col-md-12 order-md-1">

		<form id="hor" class="contactform">
			
			<div class="container">

        

        

        <h1>Horarios</h1>

        <div class="schedule__container">
            <div class="days__container">
                <span class="corner"></span>
                <div class="day">Monday</div>
                <div class="day">Tuesday</div>
                <div class="day">Wednesday</div>
                <div class="day">Thursday</div>
                <div class="day">Friday</div>
                <div class="day">Saturday</div>
            </div>
            <div class="part__day">
                <span class="time">8am <br> - <br> 12pm</span>
              <div class="col-md-4">
					<input id="curso1" name="curso1" type="text" class="validate text-only cap" placeholder="">
				</div>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
            </div>
            
            <div class="part__day">
                <span class="time">2pm <br> - <br> 6pm</span>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
            </div>
            <div class="part__day">
                <span class="time">6pm <br> - <br> 8pm</span>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
               <input type="text" id="usu" name="usu" required><br><br>
                
  
            </div>
        </div>

			<div class="row">

				<div class="col-md-4">
					<input id="nom" name="nom" type="text" class="validate text-only cap" placeholder="Mobiliario">
				</div>

				<div class="col-md-4">
					<input id="mar" name="mar" type="text" class="validate text-only cap" placeholder="Marca">
				</div>

				<div class="col-md-4">
					<input id="mdl" name="mdl" type="text" placeholder="Modelo">
				</div>

			</div>

			<div class="row">

				<div class="col-md-4">
					<input id="ser" name="ser" type="text" placeholder="Serial">
				</div>

				<div class="col-md-4">
					<input id="cod" name="cod" type="text" placeholder="Código">
				</div>

				<div class="col-md-4">
					<input id="des" name="des" type="text" placeholder="Descripción">
				</div>

			</div>

		<input type="hidden" name="orden" value="add">

	</form>
	
		<div class="text-center">
			<button class="red" id="atras" type="button"><i class="fa fa-arrow-left"></i> Regresar</button>
			<button class="blue" onclick="location.reload()"><i class="fa fa-brush"></i> Limpiar</button>
			<button class="list" id="list5"><i class="fa fa-eye"></i> Ver Lista</button>
		    <button class="green" type="submit" form="mo"><i class="fa fa-pen"></i> Registrar</button>
	    </div>

	</div>
</div>


	




	<script src="../js/btn.js"></script>
</body>
</html>



<?php } ?>