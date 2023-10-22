<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../img/nota.ico">
	
	<script src="../js/jquery-3.3.1.js"></script>
	<script src="../js/TweenMax.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/app1.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	
	<title>Maestro</title>
</head>
<body>
	
	<div class="slide active">
		<div class="card">
			<div class="card-img" id="img1"></div>
			<div class="card-content">
				<p class="card-theme">José Antonio Abreu Anselmi</p>
				<h2 class="card-header">Biografia </h2>

				<p class="card-para">José Antonio Abreu Anselmi (Valera, 7 de mayo de 1939 - Caracas, 24 de marzo de 2018), fue un músico, economista, político, activista y educador venezolano. Fundó la Orquesta Nacional Juvenil de Venezuela y el Sistema Nacional de Orquestas Sinfónicas Juveniles, Infantiles y Pre-Infantiles de Venezuela. Muere el 24 de marzo de 2018 y el 7 de abril se hace un homenaje a Abreu y participan más de 10.000 musicos de distintos nucleos a nivel nacional como Caracas, Vargas, Guarenas, Guatire.</p>
				
			</div>
		</div>
	</div>

	<div class="slide">
		<div class="card">
			<div class="card-img" id="img2"></div>
			<div class="card-content">
				<p class="card-theme">José Antonio Abreu Anselmi</p>
				<h2 class="card-header">Biografia</h2>

				<p class="card-para">Vivió en Monte Carmelo, Edo, Trujillo en sus primeros años de vida. Abreu comenzó a estudiar música con Doralisa Jiménez de Medina, en Barquisimeto. Más tarde, asistió a la Academia de Declamación Musical de Caracas en 1957, donde estudió piano con Moisés Moleiro, el órgano y clavecín con Evencio Castellanos y composición con Vicente Emilio Sojo, en la Escuela Superior de Música José Angel Lamas. Se graduó como economista en la Universidad Católica Andres Bello.</p>
				
			</div>
		</div>
	</div>

	<div class="slide">
		<div class="card">
			<div class="card-img" id="img3"></div>
			<div class="card-content">
				<p class="card-theme">José Antonio Abreu Anselmi</p>
				<h2 class="card-header">Biografia</h2>

				<p class="card-para">En 1967 recibió el Premio Nacional de Música Sinfónica por su habilidad como compositor. Durante las décadas de 1960 y 1970 impartió la cátedra de economía en distintas universidades de Venezuela. Entre 1989 y 1995 se desempeñó en los cargos de ministro de la Cultura, vicepresidente y director del Consejo Nacional de la Cultura (CONAC).</p>
				
			</div>
		</div>
	</div>

	<div class="prevnext">
		<button class="pn-btn" id="prev"></button>
		<button class="pn-btn" id="next"></button>
	</div>

	<script type="text/javascript">
		
		var $activeSlide = $('.active'),
		$homeSlide = $(".slide"),
		$slideNavPrev = $("#prev"),
		$slideNavNext = $("#next");

		function init(){

			TweenMax.set($homeSlide.not($activeSlide), {autoAlpha: 0});
			TweenMax.set($slideNavPrev,{autoAlpha: 0.2});

		}

		init();

		function goToNextSlide(slideOut, slideIn, slideInAll) {

			var t1 = new TimelineLite(),
			slideOutContent = slideOut.find('.card-content'),
			slideInContent = slideIn.find('.card-content'),
			slideOutImg = slideOut.find('.card-img'),
			slideInImg = slideIn.find('.card-img'),
			index = slideIn.index(),
			size = $homeSlide.length;
			console.log(index);

			if (slideIn.length !== 0) {

			t1

			.set(slideIn, {autoAlpha: 1, className: '+=active'})
			.set(slideOut, {className: '-=active'})

			.to(slideOutContent, 0.65, {y: "+=40px", ease: Power3.easeInOut},0)
			.to(slideOutImg, 0.65, {backgroundPosition :'bottom', ease: Power3.easeInOut}, 0)
			.to(slideInAll, 1, {y: "-=100%",ease: Power3.easeInOut},0)
			.fromTo(slideInContent, 0.65, {y: '-=40px'}, {y : 0, ease: Power3.easeInOut}, "-=0.7")
			.fromTo(slideInImg, 0.65, {backgroundPosition: 'Top'}, {backgroundPosition: 'bottom', ease: Power3.easeInOut}, '-=0.7')

			}

			TweenMax.set($slideNavPrev, {autoAlpha: 1});

			if (index === size - 1){

				TweenMax.to($slideNavNext, 0.3, {autoAlpha: 0.2, ease:Linear.easeNone});
			}
			
		};

		$slideNavNext.click(function(e){

			e.preventDefault();

			var slideOut = $('.slide.active'),
			slideIn = $('.slide.active').next('.slide'),
			slideInAll = $('.slide');

			goToNextSlide(slideOut, slideIn, slideInAll);
		})

		function goToPrevSlide(slideOut, slideIn, slideInAll) {

			var t1 = new TimelineLite(),
			slideOutContent = slideOut.find('.card-content'),
			slideInContent = slideIn.find('.card-content'),
			slideOutImg = slideOut.find('.card-img'),
			slideInImg = slideIn.find('.card-img'),
			index = slideIn.index(),
			size = $homeSlide.length;

			if (slideIn.length !== 0) {

			t1

			.set(slideIn, {autoAlpha: 1, className: '+=active'})
			.set(slideOut, {className: '-=active'})

			.to(slideOutContent, 0.65, {y: "-=40px", ease: Power3.easeInOut},0)
			.to(slideOutImg, 0.65, {backgroundPosition :'top', ease: Power3.easeInOut}, 0)
			.to(slideInAll, 1, {y: "+=100%",ease: Power3.easeInOut},0)
			.fromTo(slideInContent, 0.65, {y: '+=40px'}, {y : 0, ease: Power3.easeInOut}, "-=0.7")
			.fromTo(slideInImg, 0.65, {backgroundPosition: 'bottom'}, {backgroundPosition: 'top', ease: Power3.easeInOut}, '-=0.7')

			}

			TweenMax.set($slideNavPrev, {autoAlpha: 1});

			if (index === 0){

				TweenMax.to($slideNavPrev, 0.3, {autoAlpha: 0.2, ease:Linear.easeNone});
			}
			
		};

		$slideNavPrev.click(function(e){

			e.preventDefault();

			var slideOut = $('.slide.active'),
			slideIn = $('.slide.active').prev('.slide'),
			slideInAll = $('.slide');

			goToPrevSlide(slideOut, slideIn, slideInAll);
		})


	</script>


	
</body>
</html>