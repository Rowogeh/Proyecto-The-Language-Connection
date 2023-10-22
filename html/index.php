<!DOCTYPE html>
<html>
<head>
	<?php include 'head.html' ?>
</head>

<body>

	<?php include 'alternative-index.html' ?>

	<?php //include 'footer.php'; ?>  

	<script src="../js/links.js"></script>
  <script src="../js/script.js"></script>

</body>
</html>

<!--------------------------------------------------------------------------------------------------------->

<?php

error_reporting(E_ERROR);

if(($_COOKIE['nom'] != null) || ($_COOKIE['usu'] != null) || ($_COOKIE['lvl'] != null) || ($_COOKIE['ape'] != null)): ?>

  <script type="text/javascript">

    Cookies.remove('nom', {path:'/'});
    Cookies.remove('ape', {path:'/'});
    Cookies.remove('usu', {path:'/'});
    Cookies.remove('lvl', {path:'/'});
    
  </script>

<?php endif; ?>

