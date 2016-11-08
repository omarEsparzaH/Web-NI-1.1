<?php
session_start();
if ( empty($_SESSION["usuario"])) 
  {
  	header('Location: ../index.php');
    die('usuario o contrasena incorrectos');
  }
 $incorrecto = isset($_GET['error']) ? $_GET['error'] : '';
 $correcto = isset($_GET['correcto']) ? $_GET['correcto'] : '';
 //isset($_SESSION["usuario"]) ? header('Location: paginas/Mercadotecnia.php') : '';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="../css/Administrador.css">
</head>
<body>
<div id="fondo"></div>
  <nav class="navbar ">
      <div class="container">
    	<div class="navbar-header">
    	 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand linklogotipo" href="index.php" ><img id="logotipo" src="../imagenes/tecmilenio.png"></a>
    	</div>
    	<div >
    	  <a id="sesionUsuario" href="cerrarSesion.php"><img id="imgUsuario" src="../imagenes/usuario.png">
          <p id="nombreUsuario"><?php $_SESSION['usuario'];?><br>CerrarSesion</p>
          </a>
    	</div>

     </div>
    </nav>
  <div id="formulario_admin">
    <div class="col-md-3">
    <form method="post" action="insert.php" id="agergar_usuario" >
  	<h2 align="center" id="titulo_An">Agregar nuevo usuario</h2>
  	<div align="center">
  	<p>Nombre de usuario</p>
  	<input type="text" name="user">
  	<p id="lblcontraseña">Contraseña</p>
  	<input type="password" name="password">
  	<br>
  	<p id="lblcontraseña">Area</p>
  	<select class="tamaño-input" name="opcion">
			<option value="mercadotecnia">mercadotecnia</option>
			<option value="serviciosescolares">serviciosescolares</option>
			<option value="finansas">finansas</option>
			<option value="becas">becas</option>
			<option value="ti">ti</option>
			<option value="academico">academico</option>
	</select> 
  	<br><br>
  	<button type="submit" form="agergar_usuario">Ingresar usuario</button>
  	<div><p>
 	<?php  
 	 if($incorrecto == true)
     {
       echo 'Error : datos incorrectos';
     }
     if($correcto == true)
     {
       echo 'nuevo usuario creado con exito';
     }
     ?></p></div>
  	</form>
  	</div>
  	</div>
  </div>
</body>
</html>