<nav>
<ul class="header-1">
	<li><a href="../html/main.php"><i class="fa fa-home"></i></a></li>
</ul>
<div class="button">
	<a class="btn-open" href="#" style="color: #fff;"><i class="fa fa-bars"></i>
</div>
</nav>
<div class="overlay">
	<div class="wrap">
		<ul class="wrap-nav">
			<li><a href="#"><i class="fa fa-pencil-alt"></i></a>
			<ul>
				<li><a id="reg_ins" href="#">cursos</a></li>
				<li><a id="reg_rep" href="#">Representantes</a></li>
				<li><a id="reg_es" href="#">Estudiantes</a></li>
				<li><a id="reg_mn" href="#">notas</a></li>
				<li><a id="reg_mo" href="#">pagos</a></li>
				<li><a href="../weeklySchedule/index.html">horario</a></li>
			</ul>
			</li>
			<li><a href="#"><i class="fa fa-book"></i></a>
			<ul>
				<li><a id="" href="../php/listr.php">Representantes</a></li>
				<li><a id="" href="../php/listi.php">Cursos</a></li>
				<li><a id="" href="../php/liste.php">Estudiantes</a></li>
				<li><a id="" href="../php/listn.php">Notas</a></li>
				<li><a id="" href="../php/listo.php">Pagos</a></li>
			</ul>
			</li>
			<li><a href="#"><i class="fa fa-user"></i></a>
			<ul>
				<li><a id="editu" href="#">Editar Datos</a></li>
				<li><a id="cpss" href="#">Cambiar Clave</a></li>
				<li><a id="nusu" href="#">Nuevo Usuario</a></li>
				<li><a id="" href="../php/listu.php">Listado Usuarios</a></li>
				<li><a id="cerrar" href="#">Cerrar Sesion</a></li>
			</ul>
			</li>
			<li><a href="#"><i class="fa fa-database"></i></a>
			<ul>
				<li><a id="create" href="#">Crear</a></li>
				<li><a href="../php/gestor.php">Gestionar</a></li>
			</ul>
			</li>

			<li><a href="#"><i class="fa fa-info-circle"></i></a>
			<ul>
				<li><a href="../doc/Manual de Usuario.pdf">Manual de Usuario</a></li>
				<li><a href="#">Manual de Instalación</a></li>
				<li><a href="#">Soporte Técnico</a></li>
			</ul>
			</li>
			
			
		</ul>
		<div class="social" id="icons-pri">
			<a href="#">
			<div class="social-icon">
				<i class="fab fa-html5"></i><!--HMTL5-->
			</div>
			</a>
			<a href="#">
			<div class="social-icon">
				<i class="fab fa-css3"></i><!--CSS3-->
			</div>
			</a>
			<a href="#">
			<div class="social-icon">
				<i class="fab fa-php"></i><!--PHP7-->
			</div>
			</a>
			
			<p>
				Estudiantes: Contreras Roger, Vega Martin, Pereira Augusto.<br>
				Universidad: UPTM.
			</p>
		</div>
	</div>
</div>

<script src="../js/links.js"></script>

<script type="text/javascript">

	$(document).on('click', '#create', function(){
	  $.getJSON('../php/create.php', function(data){
	    if(data[0].info == 1){
	      alert('Se Creo El Respaldo Exitosamente')
	      //window.location.reload();
	    }else{
	      alert('Error al Crear el Respaldo')
	    }
	  })
	})

</script>