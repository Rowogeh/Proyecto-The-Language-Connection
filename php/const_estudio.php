<?php
include 'root.php';
$data = mysqli_connect(host, user, pass, bd);
$data->set_charset('utf8');
$ci = $_GET['ci'];

$sql = "SELECT * FROM estudiante WHERE ci = '$ci'";
$res = mysqli_query($data, $sql);
$row = mysqli_fetch_array($res);
/*
function prompt($msj){
  echo("<script type='text/javascript'> var resp = prompt('".$msj."'); </script>");
  $resp = "<script type='text/javascript'> document.write(resp); </script>";
  return($resp);
}

$msj = "Grado que cursa el alumno";
$valor = prompt($msj);

function prompt2($msj2){
  echo("<script type='text/javascript'> var resp2 = prompt('".$msj2."'); </script>");
  $resp2 = "<script type='text/javascript'> document.write(resp2); </script>";
  return($resp2);
}

$msj2 = "Sección del alumno";
$valor2 = prompt2($msj2);
*/
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>

<script type="text/javascript">
  window.print()
</script>
<meta charset="utf-8">
<body>

<img src="../img/banner.png" style="width: 40em; height: 6em; margin-left: 50px;">
<hr size="1">

<div id="top">
  <h3><u>CONSTANCIA DE ESTUDIO</u></h3>
  <br>
  <p id="fn-md">
    Quien suscribe:  <b><u></u></b>, titular de la Cédula de Identidad N°
    <b><u></u>. <br><u>Director</u> (E)</b> de la <b><u></u></b>
    , Ubicada en el Sector  Edo. Mérida. Por medio de la presente:
  </p>
  <br>
  <h3 id="h3">HACE CONSTAR</h3>

  <p id="fn-md">
    <span id="edad">Que el (la) alumno (a): <b><u><?php echo $row['nom']. " ". $row['ape'] ?></u></b>, de </span> años de edad natural de <b><u><?php echo $row['lnac'] ?></u></b>, portador de la C.I <b><u><?php echo $ci; ?></u></b>, está inscrito (a) en nuestra institución para cursar el <b><u><?php echo $row['curso']; ?></u></b> Grado <b>"<u><?php echo $row['cod_nom'] ?></u>"</b> durante el año escolar
    <b><u>2017 - 2018</u></b>. PARA FINES: <b>FONTUR</b>.
    <br><br>
    <p id="time">Constancia que se expide en Santa Cruz de Mora a los&nbsp;</p>
  </p>

</div>

<div id="bottom">
  <p>___________________________</p>
  <b></b>
  <p>C.I. N° </p>
  <b>Director</b><br>
</div>

<div id="bottom-sm">
  <p id="fn-sm-k">
    <b>
  
      Dirección: , Tovar Edo Mérida<br>
      Teléfono:   Correo: <br>
    </b>
  </p>
</div>
<input type="hidden" id="fnac" value="<?php echo $row['fnac'] ?>">
<script type="text/javascript">
  var now = new Date();

  var dia = now.getDate();
  var mes = now.getMonth() + 1;
  var ano = now.getFullYear();

  if (mes === 1) {mes = 'enero';}
  else if(mes === 2){mes = 'febrero'}
  else if(mes === 3){mes = 'marzo'}
  else if(mes === 4){mes = 'abril'}
  else if(mes === 5){mes = 'mayo'}
  else if(mes === 6){mes = 'junio'}
  else if(mes === 7){mes = 'julio'}
  else if(mes === 8){mes = 'agosto'}
  else if(mes === 9){mes = 'septiembre'}
  else if(mes === 10){mes = 'octubre'}
  else if(mes === 11){mes = 'noviembre'}
  else if(mes === 12){mes = 'diciembre'}
    
  $('#time').append('<b id="up">'+dia+'</b> <b>días</b> del mes de <b id="up">'+mes+'</b> <b>del '+ano+'</b>');

  var fecha = $('#fnac').val();
  var values = fecha.split('-');

  var ddd = parseInt(values[2]);
  var mmm = parseInt(values[1]);
  var aaa = parseInt(values[0]);

  var now_dia = now.getDate();
  var now_mes = now.getMonth() + 1;
  var now_ano = now.getFullYear();
  
  var total = now_ano - aaa;

  if (now_mes < mmm){
    total--;
  }

  if (now_mes > mmm) {
    total++;
  }

  if (now_mes === mmm){
    if (now_dia < ddd ){
      total--;
    }
    else if (now_dia >= ddd){
      total + 1;
    }
  }
  $('#fnac').append('<b><u>'+total+'</u></b>');
  </script>
</body>