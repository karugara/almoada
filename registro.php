<?php
session_start();
require 'conexion.php';

if(!isset($_SESSION['id_usuario'])) {
  header("Location: login.php");
}
$sql = "SELECT id, tipo FROM tipo_usuario";
$result=$mysqli->query($sql);

$bandera = false;

if(!empty($_POST))
{
  $nombre = mysqli_real_escape_string($mysqli,$_POST['nombre']);
  $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
  $password = mysqli_real_escape_string($mysqli,$_POST['password']);
  $tipo_usuario = $_POST['tipo_usuario'];
  $sha1_pass = sha1($password);

  $error = '';

  $sqlUser = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
  $resultUser=$mysqli->query($sqlUser);
  $rows = $resultUser->num_rows;

  if($rows > 0) {
    $error = "El usuario ya existe";
    } else {

    $sqlPerson = "INSERT INTO personal (nombre) VALUES('$nombre')";
    $resultPerson=$mysqli->query($sqlPerson);
    $idPersona = $mysqli->insert_id;

    $sqlUsuario = "INSERT INTO usuarios (usuario, password, id_personal, id_tipo) VALUES('$usuario','$sha1_pass','$idPersona','$tipo_usuario')";
    $resultUsuario = $mysqli->query($sqlUsuario);

    if($resultUsuario>0)
    $bandera = true;
    else
    $error = "Error al Registrar";

  }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tera Ingenieria</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script>
			function validarNombre()
			{
				valor = document.getElementById("nombre").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Nombre');
					return false;
				} else { return true;}
			}

			function validarUsuario()
			{
				valor = document.getElementById("usuario").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Usuario');
					return false;
				} else { return true;}
			}

			function validarPassword()
			{
				valor = document.getElementById("password").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Password');
					return false;
					} else {
					valor2 = document.getElementById("con_password").value;

					if(valor == valor2) { return true; }
					else { alert('Las contraseña no coinciden'); return false;}
				}
			}

			function validarTipoUsuario()
			{
				indice = document.getElementById("tipo_usuario").selectedIndex;
				if( indice == null || indice==0 ) {
					alert('Seleccione tipo de usuario');
					return false;
				} else { return true;}
			}

			function validar()
			{
				if(validarNombre() && validarUsuario() && validarPassword() && validarTipoUsuario())
				{
					document.registro.submit();
				}
			}

		</script>

    <style>

      div {
          padding-bottom:20px;
      }

  </style>
</head>
<body>
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Volver al Inicio</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul id="active" class="nav navbar-nav side-nav">
                  <li class="selected"><a href="index.php"><i class="fa fa-bullseye"></i> Panel</a></li>
                  <li><a href="pedidomat.php"><i class="fa fa-tasks"></i> Pedido Materiales</a></li>
                  <li><a href="informesobra.php"><i class="fa fa-list-ol"></i> Informes de Obra</a></li>
                  <li><a href="notasremision.php"><i class="fa fa-list-ul"></i> Notas de Remision</a></li>
                  <li><a href="archivosubir.php"><i class="fa fa-table"></i> Archivos</a></li>
              </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>.<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>

                        </ul>
                    </li>
                    <li class="divider-vertical"></li>

                </ul>
            </div>
        </nav>

        <form id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
         <div class="row text-center">
             <h2>Nuevo Registro</h2>
         </div>
         <div>
             <label for="firstname" class="col-md-2">
                 Nombre y Apellido:
             </label>
             <div class="col-md-9">
                 <input class="form-control" id="nombre"name="nombre" type="text" placeholder="nombre que se muestra al inicio de sesion">
             </div>
             <div class="col-md-1">
                 <i class="fa fa-lock fa-2x"></i>
             </div>
         </div>
         <!-- <div>
             <label for="lastname" class="col-md-2">
                 Apellidos:
             </label>
             <div class="col-md-9">
                 <input type="text" class="form-control" id="lastname" placeholder="apellido">
             </div>
              <div class="col-md-1">
                 <i class="fa fa-lock fa-2x"></i>
             </div>
         </div> -->
         <div>
             <label for="emailaddress" class="col-md-2">
                 Correo Corporativo:
             </label>
             <div class="col-md-9">
                 <input type="email" class="form-control" id="usuario" name="usuario" placeholder="este sera su nombre de usuario">
                 <p class="help-block">
                     Ejemplo: sunombredeusuario@teraingenieria.com
                 </p>
             </div>
              <div class="col-md-1">
                 <i class="fa fa-lock fa-2x"></i>
             </div>
         </div>

         <div>
             <label for="password" class="col-md-2">
                 Contraseña:
             </label>
             <div class="col-md-9">
                 <input type="password" class="form-control" id="password" name="password" placeholder="contraseña">
                 <p class="help-block">
                     Min: 6 caracteres (Solo Alphanumericos)
                 </p>
             </div>
              <div class="col-md-1">
                 <i class="fa fa-lock fa-2x"></i>
             </div>
         </div>
         <div>
             <label for="password" class="col-md-2">
                 Confirmar Contraseña:
             </label>
             <div class="col-md-9">
                 <input type="password" class="form-control" id="con_password" name="con_password" placeholder="confirmar contraseña">
                 <p class="help-block">
                     Asegurese que sea una contraseña facil de recordar (Puede utilizar Solo mayusculas minusculas y numeros)
                 </p>
             </div>
              <div class="col-md-1">
                 <i class="fa fa-lock fa-2x"></i>
             </div>
         </div>
         <!-- <div>
             <label for="sex" class="col-md-2">
                 Genero:
             </label>
             <div class="col-md-10">
                 <label class="radio">
                     <input type="radio" name="sex" id="sex" value="male" checked>
                     Masculino
                 </label>
                 <label class="radio">
                     <input type="radio" name="sex" id="Radio1" value="female">
                     Femenino
                 </label>
             </div>
         </div> -->
         <div>
             <label for="country" class="col-md-2">
                 Tipo de Usuario:
             </label>
             <div class="col-md-9">
                 <select id="tipo_usuario" name="tipo_usuario" class="form-control">
                     <option value="0">--Por favor Seleccione--</option>
                     <?php while($row = $result->fetch_assoc()){ ?>
           						<option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
           					<?php }?>
                     <!-- <option>Administrador</option>
                     <option>Gerente</option>
                     <option>Jefe de Obra</option> -->
                 </select>
             </div>
         </div>
         <!-- <div>
             <label for="uploadimage" class="col-md-2">
                 Subir Imagen:
             </label>
             <div class="col-md-10">
                 <input type="file" name="uploadimage" id="uploadimage">
                 <p class="help-block">
                     Formatos permitidos: jpeg, jpg, gif, png
                 </p>
             </div>
         </div> -->
         <div>
             <div class="col-md-2">
             </div>
             <div class="col-md-10">
                 <label>
                     <input type="checkbox">Acepto que los datos proporcionados son fidedignos y correctos</label>
             </div>
         </div>
         <div class="row">
             <div class="col-md-2">
             </div>
             <div class="col-md-10">
                 <button type="submit" name="registar" value="Registrar" onClick="validar();" class="btn btn-info center-block">
                     Registrar
                 </button>
             </div>
         </div>
     </div>
   </form>
   <?php if($bandera) { ?>
     <h1>Registro exito..Registro exitoso</h1>
     <a href="welcome.php">Regresar</a>

     <?php }else{ ?>
     <br />
     <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>

   <?php } ?>
</body>
</html>
