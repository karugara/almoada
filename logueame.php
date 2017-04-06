<?php
	session_start();
  $varconecbd = mysqli_connect("localhost","root","","terainge");
  if(isset($_POST['correo_admin']) && (isset($_POST)['pass_admin'])){
    $varuser = mysqli_real_escape_string($varconecbd, $_POST['correo_admin']);
    $varpass = mysqli_real_escape_string($varconecbd, $_POST['pass_admin']);
    $varalmaconsul = "SELECT correo_admin FROM adminstradores WHERE (correo_admin='$varuser' OR nombre='$varuser') AND pass_admin='$varpass'";
    $result = mysqli_query($varconecbd,$varalmaconsul);
    $num_row = mysqli_num_rows($result);
    if ($num_row == "1"){
      $data = mysqli_fetch_array($result);
      $_SESSION["correo_admin"] = $data["correo_admin"];
      echo "1";
    } else {
      echo "error 404";
    }
  } else {
    echo "error 405";
  }

?>
