@@ -0,0 +1,43 @@
<?php
 $incorrecto = isset($_GET['error']) ? $_GET['error'] : '';
 session_start();
 isset($_SESSION["usuario"]) ? header('Location: php/holaMundo.php') : '';
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="fondo"></div>
<div id="logotipo">
	<img src="imagenes/logo_color.png">
</div>
 <div  id = "login" class=" col-xs-10 col-sm-6 col-md-4 col-lg-3">
 <div id = "color_login">
 <h2 style="color: white; padding-bottom: 3%;">Login</h2>
 <form action="db/conexion.php" method="post">
    <div>
 	<input type="text" name="usuario" size="30" maxlength="12">
 	</div>
 	<br>
 	<div>
 	<input type="password" name="contrasena" size="30" maxlength="12">
 	</div>
 	<br>
 	<button type="submit">ingresar</button>
 	<br><br>
 	<div><p>
 	<?php  
 	 if($incorrecto == true)
     {
       echo 'usuario o contraseña incorrectos';
     }
     ?></p></div>
 </form>
 </div>
 </div>
</body>
</html>
\ No newline at end of file
