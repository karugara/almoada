<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			include 'conexion.php';
			if(isset($_POST['login'])){
				$usuario = $_POST['correo_admin'];
				$pw = $_POST['pass_admin'];
				$log = mysql_query("SELECT * FROM adminstradores WHERE correo_admin='$usuario' AND pass_admin='$pw'");
				if (mysql_num_rows($log)>0) {
					$row = mysql_fetch_array($log);
					$_SESSION["correo_admin"] = $row['correo_admin'];
				  	echo 'Iniciando sesión para '.$_SESSION['correo'].' <p>';
					echo '<script> window.location="index.php"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="login.php"; </script>';
				}
			}
		?>
</body>
</html>
