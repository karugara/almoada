<?php
 session_start();
 require 'conexion.php';

 if(!isset($_SESSION["id_usuario"])) {
   header("Location: login.php");
   }
   $idUsuario = $_SESSION["id_usuario"];
   $sql = "SELECT u.id, p.nombre FROM usuarios AS u INNER JOIN personal AS p ON u.id_personal=p.id WHERE u.id = '$idUsuario'";
   $result=$mysqli->query($sql);
   $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tera Ingenieria</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    <link rel="stylesheet" type="text/css" href="css/estilachos.css" />
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    <script type="text/javascript" src="js/dropzone.js"></script>
    <!-- <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css"> -->
    <link rel="stylesheet" type="text/css" href="css/dropzone.css" />

</head>
<body>
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1><?php echo 'Bienvenid@ '.utf8_decode($row ['nombre']); ?></h1>
      </div>
    </div>
  </div>

    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Tera Intranet</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li class="selected"><a href="index.php"><i class="fa fa-bullseye"></i> Panel</a></li>

                    <!-- <li><a href="register.php"><i class="fa fa-users"></i> Registro Nuevos</a></li> -->
                    <li><a href="pedidomat.php"><i class="fa fa-tasks"></i> Pedido Materiales</a></li>
                    <li><a href="informesobra.php"><i class="fa fa-list-ol"></i> Informes de Obra</a></li>
                    <li><a href="notasremision.php"><i class="fa fa-list-ul"></i> Notas de Remision</a></li>
                    <li><a href="archivosubir.php"><i class="fa fa-table"></i> Archivos</a></li>
                </ul>
                <?php if($_SESSION['tipo_usuario']==1) { ?>
    							<ul class='nav navbar-nav'>
    								<li><a href='#'>Administrar Usuarios</a></li>
    							</ul>
    						<?php } ?>
                <?php if($_SESSION['tipo_usuario']==1) { ?>
    							<ul class='nav navbar-nav'>
    								<li><a href='registro.php'>Registrar Usuarios</a></li>
    							</ul>
    						<?php } ?>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>

                        </ul>
                    </li>
                    <li class="divider-vertical"></li>

                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Intranet Tera <small>Control de Obras</small></h1>

                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">

                    </div>
                    <div class="bs-example">
                      <div class="jumbotron">
                        <h1>Obra Chuquiaguillo</h1>
                        <p>Esta es la informacion acerca de la obra de chuquiaguillo la cual consta de las siguientes fases.</p>
                        <p><a class="btn btn-primary btn-lg">Leer mas</a></p>
                      </div>
                    </div>
                    <div class="bs-example">
                      <div class="jumbotron">
                        <h1>Obra Hugo Chavez</h1>
                        <p>Esta es la informacion acerca de la obra de Hugo Chavez la cual consta de las siguientes fases.</p>
                        <p><a class="btn btn-primary btn-lg">Leer mas</a></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">

                </div>
                <div class="col-md-4">

                </div>
            </div>

            <div class="row">
              <div class="col-lg-12">

              </div>
            </div>

            <div class="row">


    <!-- <script type="text/javascript">
        jQuery(function ($) {
            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                visits = [123, 323, 443, 32],
                traffic = [
                {
                    Source: "Direct", Amount: 323, Change: 53, Percent: 23, Target: 600
                },
                {
                    Source: "Refer", Amount: 345, Change: 34, Percent: 45, Target: 567
                },
                {
                    Source: "Social", Amount: 567, Change: 67, Percent: 23, Target: 456
                },
                {
                    Source: "Search", Amount: 234, Change: 23, Percent: 56, Target: 890
                },
                {
                    Source: "Internal", Amount: 111, Change: 78, Percent: 12, Target: 345
                }];


            $("#shieldui-chart1").shieldChart({
                theme: "dark",

                primaryHeader: {
                    text: "Visitors"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "area",
                    collectionAlias: "Q Data",
                    data: performance
                }]
            });

            $("#shieldui-chart2").shieldChart({
                theme: "dark",
                primaryHeader: {
                    text: "Traffic Per week"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "pie",
                    collectionAlias: "traffic",
                    data: visits
                }]
            });

            $("#shieldui-grid1").shieldGrid({
                dataSource: {
                    data: traffic
                },
                sorting: {
                    multiple: true
                },
                rowHover: false,
                paging: false,
                columns: [
                { field: "Source", width: "170px", title: "Source" },
                { field: "Amount", title: "Amount" },
                { field: "Percent", title: "Percent", format: "{0} %" },
                { field: "Target", title: "Target" },
                ]
            });
        });
    </script> -->
</body>
</html>
