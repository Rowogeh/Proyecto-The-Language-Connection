<!DOCTYPE html>
<html>
<head>
	<!---<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The language Connection</title>
	<link rel="stylesheet" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">--->
	<?php include ('head.html');?>
	
</head>

<body>

	<header>
		<img src="../img/TLCLOGOwhite.png">
		<nav class="navigation">
			<a href="#">Inicio</a>
			<a href="#">Nosotros</a>
			<a href="#">Cursos</a>
			<a href="#">Contacto</a>
			<button class="btnloginpopup">Inicio</button>
		</nav>
	</header>

	<div class="wrapper">
		<span class="icon-close"> <i class="fas fa-arrow-alt-circle-right"></i></span>
		<div class="form-box login">
			<h2>Iniciar Sesión</h2>
				<form action="#"></form>
					
					<div class="input-box">
						<span class="icon"> <i class="fas fa-user"></i></span>
						<input type="username" required>
						<label>Usuario</label>
					</div>

					<div class="input-box">
						<span class="icon"><i class="fas fa-lock"></i></span>
						<input type="password" required>
						<label>Contraseña</label>
					</div>

					<button type="summit" class="btn">Iniciar Sesión</button>

					<div class="login-register">
						<p>
							<a href="#" class="register-link">Recuperar Contraseña</a>
						</p>
					</div>
		</div>

		<div class="form-box register">
			<h2>Recuperar Contraseña</h2>
				<form action="#"></form>
					
					<div class="input-box">
						<span class="icon"> <i class="fas fa-user"></i></span>
						<input type="username" required>
						<label>Nombre de Usuario</label>
					</div>

					<div class="input-box">
						<span class="icon"><i class="fas fa-lock"></i></span>
						<input type="password" required>
						<label>Pregunta Secreta</label>
					</div>

					<div class="input-box">
						<span class="icon"><i class="fas fa-lock"></i></span>
						<input type="password" required>
						<label>Respuesta Secreta</label>
					</div>

					<button type="summit" class="btn">Iniciar Sesión</button>

					<div class="login-register">
						<p>
							<a href="#" class="login-link">Iniciar Sesión</a>
						</p>
					</div>
		</div>


	</div>

	<script src="../js/script.js"></script>
</body>
</html>