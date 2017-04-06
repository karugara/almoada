<?php
// codigo para registro de usuarios
//include 'conexion2.php';
//function alert($text,$func){
  //echo"<script type='text/javascript>alert("$text");$func();</script'>";
//}
?>
<?php
// iniciando sesiones
  session_start();
	//include 'conexion.php';
	if(isset($_SESSION['correo_admin'])){
	echo '<script> window.location="index.php"; </script>';
	}
?>
<!DOCTYPE html>

<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Tera Ingenieria login</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
   <style type="text/css">
IMG.imgcenter{
      display: block;
      margin-left: auto;
      margin-right: auto;
      border:none;
      }
</style>
   <img src="img/logo.png" alt="W3C_validator" width="400" height="250" class="imgcenter">

  <form method="post" action="validar.php" class="login">
    <p>
      <label for="login">Email:</label>
      <input type="text" name="correo_admin" id="login"  autocomplete="off" required>
    </p>

    <p>
      <label for="password">Contraseña:</label>
      <input type="password" name="pass_admin" id="password"  autocomplete="off" required>
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button" name="login">Login</button>
    </p>

   <!-- <p class="forgot-password"><a href="index.html">Olvidaste tu contraseña?</a></p>-->
  </form>


</body>
</html>
