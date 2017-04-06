<?php
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli=new mysqli('localhost','root','','terainge');
	if(mysqli_connect_errno()){
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
	}

//otro codigo de conexion a la base de datos
//$conect = @mysql_connect("localhost","root","") or die("No se encontró el servidor");
	//mysql_select_db("terainge",$conect)or die("No se encontró la base de datos");
?>
