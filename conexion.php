<?php
$mysqli = '';
define('DB_HOST','localhost');
define('DB_USER','omar');
define('DB_PASS','omar2016');
$user = isset($_POST['usuario']) ? $_POST['usuario'] : '' ;
$password = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
define('DB_DATABASE' , 'holamundo');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);
$result = 'SELECT * FROM usuarios_login WHERE usuario = "' . $user.'"';
$result2 = $mysqli->query($result);



if( $mysqli->connect_errno )
{
	header('Location:../index.php?error=true');
	echo 'Error en la conexión , usuario o contraseña incorrectos';
	echo "<br/><a href = '../index.php'>regresar a login<a/>";
	exit;	
}else{
	if($row = mysqli_fetch_array($result2))
	{
		if($row["password"] == $password)
		{
		  echo "funciona";
          session_start();
	      $_SESSION["usuario"] = $user;
	      header('Location:../php/holaMundo.php');
		}
	}else
	{
	    header('Location:../index.php?error=true');
		
	}
}

?>