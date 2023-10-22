//Iniciar Sesión

$(document).on('submit', '#iniciar', function(e){
	e.preventDefault()
	$.ajax({cache:false})
	$.getJSON('../php/login.php', {usuario:$('#usuario').val(), clave:$('#clave').val()}, function(data){
		if (data[0].info == 1){
			Cookies.set('nom', data[1].nom, {path:'/'})	
			Cookies.set('ape', data[2].ape, {path:'/'})	
			Cookies.set('usu', data[3].usu, {path:'/'})	
			location.href = '../html/main.php';
		}
		else{
			alert('Usuario y/o Clave Invalidos');
			$('#usuario').val('').focus()
			$('#clave').val('')
		}
	});
});

//Cerrar Sesión

$(document).on('click', '#cerrar', function(){
	Cookies.remove('nom', {path:'/'})
	Cookies.remove('ape', {path:'/'})
	Cookies.remove('usu', {path:'/'})
	location.href = '../';
});

/*---------------------------------------------------------------------------------------------------------*/ 

//Recuperar

//Recuperar Clave de Acceso

$(document).on('submit','#reclave', function(e){
	e.preventDefault();
	var formData = $('#reclave').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/usuario.php',
		data: formData,
		dataType: 'json'
	})
	.done(function(datos){
		if(datos['valida'] === 1){
			alert('Datos Aprovados')
			$('main').load('../html/restore2.php' , {usu:datos['usu'], pass:datos['pass']})
		}else{
			alert('Datos Incorrectos')
			$('#pre').val('')
			$('#res').val('')
			$('#usu').val('').focus()
		}
	});
});

//Insertar Nueva Clave de Acceso

$(document).on('submit','#nuclave',function(e){
	e.preventDefault();
	var formData = $('#nuclave').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/usuario.php',
		data: formData,
		dataType: 'html'

	}).done(function(html){
		$('#here').html(html);
	});
}); 


/*---------------------------------------------------------------------------------------------------------*/ 

//Usuario

//Ingresar Nuevo Usuario

$(document).on('submit', '#usua', function(e){
	e.preventDefault();
	var formData = $('#usua').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/usuario.php',
		data: formData,
		dataType: 'html'
		})
		.done(function(html){
		$('#here').html(html);
	})
});

//Cambiar Clave del Usuario

$(document).on('submit', '#nclave', function(e){
	e.preventDefault();
	var formData = $('#nclave').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/usuario.php',
		data: formData,
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});

//Editar Datos del Usuario
/*
$(document).on('submit', '.editu', function(e){
	e.preventDefault();
	var formData = $('.editu').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/usuario.php',
		data: formData,
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	})
});*/

/*---------------------------------------------------------------------------------------------------------*/ 

//Inserta Nuevo Representante

$(document).on('submit', '#repre_n', function(e){
	e.preventDefault();
	var formData = $('#repre_n').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/repre.php',
	    data: formData,
	    dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
}); 

//Editar Representante

//Carga el Formulario para Editar (editr.php)

$(document).on('click', '#editr', function(){
	var id = this.value;
	$.ajax({
		type: 'POST',
		url: '../html/editr.php',
		data: {id: id},
		dataType: 'html'
	})
	.done(function(html){
		$('main').html(html);
	});
});

//Procesa la Información para Editar

$(document).on('submit', '#actr', function(e){
	e.preventDefault();
	var formData = $('#actr').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/repre.php',
		data: formData,
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});

//Borrar Representante Falto!

//Cargar Ventana Para ver al Estudiante que Representa
/*
$(document).on('click', '#alum_rep', function(){
	var ci = this.value;
	$.ajax({
		type: 'POST',
		url: '../php/hrefe.php',
		data: {ci: ci},
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});*/

/*---------------------------------------------------------------------------------------------------------*/ 

//Inserta Nuevo Instrumento

$(document).on('submit', '#inst', function(e){
	e.preventDefault();
	var formData = $('#inst').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/inst.php',
	    data: formData,
	    dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	})
}); 

//Editar Instrumento

//Carga el Formulario para Editar (editi.php)

$(document).on('click', '#editi', function(){
	var id = this.value;
	$.ajax({
		type: 'POST',
		url: '../html/editi.php',
		data: {id: id},
		dataType: 'html'
	})
	.done(function(html){
		$('main').html(html);
	});
});

//Procesa la Información para Editar

$(document).on('submit', '#acti', function(e){
	e.preventDefault();
	var formData = $('#acti').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/inst.php',
		data: formData,
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});

//Borrar Instrumento

//Cargar Ventana Para ver a quien Pertenece el Instrumento
/*
$(document).on('click', '#vere', function(){
	var cod = this.value;
	$.ajax({
		type: 'POST',
		url: '../php/hrefi.php',
		data: {cod: cod},
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});*/

/*---------------------------------------------------------------------------------------------------------*/



$(document).on('submit', '#curs_nue', function(e){
	e.preventDefault();
	var formData = $('#curs_nue').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/cursos.php',
	    data: formData,
	    dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	})
}); 

//Editar Instrumento

//Carga el Formulario para Editar (editi.php)

$(document).on('click', '#editi', function(){
	var id = this.value;
	$.ajax({
		type: 'POST',
		url: '../html/editi.php',
		data: {id: id},
		dataType: 'html'
	})
	.done(function(html){
		$('main').html(html);
	});
});

//Procesa la Información para Editar

$(document).on('submit', '#acti', function(e){
	e.preventDefault();
	var formData = $('#acti').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/inst.php',
		data: formData,
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});

//Inserta Nuevo Estudiante

$(document).on('submit', '#estu', function(e){
	e.preventDefault();
	var formData = $('#estu').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/estu.php',
	    data: formData,
	    dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
}); 

//Editar Estudiante

//Carga el Formulario para Editar (edite.php)

$(document).on('click', '#edite', function(){
	var id = this.value;
	$.ajax({
		type: 'POST',
		url: '../html/edite.php',
		data: {id: id},
		dataType: 'html'
	})
	.done(function(html){
		$('main').html(html);
	});
});

//Procesa la Información para Editar

$(document).on('submit', '#acte', function(e){
	e.preventDefault();
	var formData = $('#acte').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/estu.php',
		data: formData,
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});

/*Borrar Estudiante

$(document).on('click', '#dtle', function(){
	var id = this.value;
	var conf = confirm('¿Desea borrar este registro?');
	if(conf){
		$.ajax({
			type: 'POST',
			url: '../php/set/estu.php',
			data: {id: id, orden: 'delete'},
			dataType: 'html'
		})
		.done(function(html){
		$('#here').html(html);
		});
	}
});*/

/*---------------------------------------------------------------------------------------------------------*/ 

//Insertar Nuevo Mobiliario Nucleo

$(document).on('submit', '#mn', function(e){
	e.preventDefault();
	var formData = $('#mn').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/mobin.php',
	    data: formData,
	    dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	})
}); 

//Editar Mobiliario Nucleo

//Carga el Formulario para Editar (editn.php)

$(document).on('click', '#editn', function(){
	var cod = this.value;
	$.ajax({
		type: 'POST',
		url: '../html/editn.php',
		data: {cod: cod},
		dataType: 'html'
	})
	.done(function(html){
		$('main').html(html);
	});
});

//Procesa la Información para Editar

$(document).on('submit', '#mn1', function(e){
	e.preventDefault();
	var formData = $('#mn1').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/mobin.php',
		data: formData,
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});

/*Borrar Mobiliario Nucleo

$(document).on('click', '#dtln', function(){
	var id = this.value;
	var conf = confirm('¿Desea borrar este registro?');
	if(conf){
		$.ajax({
			type: 'POST',
			url: '../php/set/mobin.php',
			data: {id: id, orden: 'delete'},
			dataType: 'html'
		})
		.done(function(html){
		$('#here').html(html);
		});
	}
});*/


/*---------------------------------------------------------------------------------------------------------*/ 

//Inserta Nuevo Mobiliario Oficina

$(document).on('submit', '#mo', function(e){
	e.preventDefault();
	var formData = $('#mo').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/mobio.php',
	    data: formData,
	    dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	})
}); 

//Editar Mobiliario Oficina

//Carga el Formulario para Editar (edito.php)

$(document).on('click', '#edito', function(){
	var cod = this.value;
	$.ajax({
		type: 'POST',
		url: '../html/edito.php',
		data: {cod: cod},
		dataType: 'html'
	})
	.done(function(html){
		$('main').html(html);
	});
});

//Procesa la Información para Editar

$(document).on('submit', '#mo1', function(e){
	e.preventDefault();
	var formData = $('#mo1').serialize();
	$.ajax({
		type: 'POST',
		url: '../php/set/mobio.php',
		data: formData,
		dataType: 'html'
	})
	.done(function(html){
		$('#here').html(html);
	});
});

/*Borrar Mobiliario Oficina

$(document).on('click', '#dtlo', function(){
	var id = this.value;
	var conf = confirm('¿Desea borrar este registro?');
	if(conf){
		$.ajax({
			type: 'POST',
			url: '../php/set/mobio.php',
			data: {id: id, orden: 'delete'},
			dataType: 'html'
		})
		.done(function(html){
		$('#here').html(html);
		});
	}
});*/

/*---------------------------------------------------------------------------------------------------------*/ 
