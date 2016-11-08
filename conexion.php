<?php
require_once("bd.php");
$user = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$password = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

//el caso contrario de que el usuario o contraseña sean erroeneos , mysql devuelve un error
if( $mysqli->connect_errno )
{
	//redireccionamos a la pagina principan con un valor booleano que activa el mensaje de error en la pagina principal
	//header('Location:../index.php?error=true');
	echo 'Error en la conexión , usuario o contraseña incorrectos';
	echo "<br/><a href = '../index.php'>regresar a login<a/>";
	exit;	
}else{
	      
	      $consulta = 'SELECT usuarios.id ,usuarios.usuario ,usuarios.password,rol.area_nombre FROM rol INNER JOIN usuarios WHERE usuarios.area = rol.id_rol AND usuario = "'.$user.'"';
          $resultado = $mysqli->query($consulta);
          $reg = mysqli_fetch_row($resultado);
	      if( $reg[1] == $user)
          {
          	
          	if( password_verify($password,"{$reg[2]}"))
          	{
          		echo 'la contraseña fue correcta';
          		 //Si la conexion con la base de datos es exitosa se inicia sesion 
          session_start();
	      $_SESSION["usuario"] = array($user,$reg[3]);
	      //se redirecciona a la pagina que le corresponde , dependiendo de el area donde se encuentre
	      switch ($reg[3]) {
	      	case 'mercadotecnia':
	      		header('Location:../paginas/Mercadotecnia.php');
	      		break;
	      	
	      	case 'serviciosescolares':
	      		header('Location:../php/holaMundo.php');
	      		break;

	      	case 'administrador':
	      		header('Location:../paginas/Administrador.php');
	      		break;
	      }

          	}else{
          		$mysqli->close();
          		//header('Location:../index.php?error=true');
          		exit;
          	}	       
	          
          }else{
          	$mysqli->close();
          	//header('Location:../index.php?error=true');
          	exit;
          }
          
	     
	   		
}

?>