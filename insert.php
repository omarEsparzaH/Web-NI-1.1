<?php
require_once("../db/bd.php");
$user = isset($_POST['user']) ? $_POST['user'] : header('Location:Administrador.php?error=true');
$password = isset($_POST['password']) ? $_POST['password'] : header('Location:Administrador.php?error=true');
$area = isset($_POST['opcion']) ? $_POST['opcion'] : header('Location:Administrador.php?error=true');
switch ($area) {
	case 'mercadotecnia':
		$areanum = 1;
		break;
	case 'serviciosescolares':
		$areanum = 2;
		break;
	case 'finansas':
		$areanum = 3;
		break;
	case 'becas':
		$areanum = 4;
		break;
	case ' 	ti':
		$areanum = 5;
		break;
	case 'academico':
		$areanum = 6;
		break;
	
	
}
$passwordcript = password_hash($password , PASSWORD_DEFAULT , ['cost' => 15 ] );
$sql = "INSERT INTO usuarios (id , usuario, password, area) VALUES (NULL, '".$user."', '".$passwordcript."' , '".$areanum."')";
$mysqli->query($sql);
header('Location:Administrador.php?correcto=true');
?>