<?php
if(($_COOKIE['usu'] == null) || ($_COOKIE['nom']) == null || ($_COOKIE['ape']) == null){
  header('location: ../');
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>

  <?php include '../html/files.html'; ?>
</head>
<body>
  <header>
    <?php include '../html/navbar_menu.php'; ?>
  </header>

  <main>
  </main>
  <div id="modal"></div>
  <script>
    $(document).ready(function(){
      $('main').load('data_cursos.php')
    })
    $(document).on('click', '#go', function(){
      let val = $('#val').val()
      $('main').load('data_cursos.php', {val:val})
    })
  </script>
</body>
</html>
<?php } ?>