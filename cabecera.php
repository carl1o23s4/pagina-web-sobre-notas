<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>SISNOTAS</title>
    <link rel="stylesheet" href="jscss/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="jscss/bootstrap/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="jscss/estilos.css" />
    <script src="jscss/jquery.js"></script>
    <script src="jscss/bootstrap/js/bootstrap.min.js"></script>
    <script src="jscss/comun.js"></script>
</head>
<style type="text/css">
    body{
        background-attachment: fixed;
        background-image: url(primer.jpg);
        background-repeat:;
        background-position:;
    }
    a{
        font-size: 150%;
    }
</style>

<body>
  <br>
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SiSNotas</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Inicio <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="mdocente_listado.php">Docentes</a></li>
                            <li><a href="mcurso_listado.php">Cursos</a></li>
                            <li><a href="mestudiante_listado.php">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li><a href="mnota_listado.php">Notas</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="musuario_datos.php">Cambiar Datos</a></li>
                            <li><a href="musuario_salir">Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

