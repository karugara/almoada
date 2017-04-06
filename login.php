<?php
  require('conexion.php');
  session_start();

  if(isset($_SESSION["id_usuario"])) {
    header("location:index.php");
    
  }

  if (!empty($_POST))
  {
    $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $error = '';
    $sha1_pass = sha1($password);
    $sql = "SELECT id, id_tipo FROM usuarios WHERE usuario = '$usuario' AND password = '$sha1_pass'";
    $result=$mysqli->query($sql);
    $rows = $result->num_rows;
    if ($rows > 0)
    {
        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id'];
        $_SESSION['tipo_usuario'] = $row['id_tipo'];
        header ("location: index.php");
        } else{
      $error = "El nombre o la clave son incorrectos";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tera Ingenieria login</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="Tera login" charset="utf-8">
  <script src="js/jquery-1.10.2.min.js" charset="utf-8"></script>
  <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form method="post">
        <br><br>
        <h1><p class="text-center">Login Intranet</p></h1>
        <img src = "img/2015.jpg" class = "img-thumbnail">
        <br><br>
        <div class="form-group">
          <label for="usuario">Email Corporativo</label>
          <input type="text" name="usuario" id="usuario" class="form-control" autocomplete="on" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" name="password" id="password"  class="form-control" autocomplete="on" required>
        </div>
        <br><br>
      <div class="form-group">
        <input type="submit" name="login" id="login" value="Login" class="btn btn-success center-block">
      </div>
      </form>
      <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert">&times;</a>
           <?php echo isset($error) ? utf8_decode ($error) : '' ; ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>
