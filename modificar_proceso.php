<?php
include("conexion.php");

  $nombre= $_POST['nombre'];
  $apellido= $_POST['apellido'];
  $correo= $_POST['correo'];

  $query="UPDATE usuarios SET nombre='$nombre', apellido='$apellido'";
  $resultado= $conexion->query($query);

  if($resultado){
    header "Location: tabla.php";
  }
  else{
    header "Insercion Fallida";
  }

 ?>
