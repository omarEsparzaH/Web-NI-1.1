<!-- verificamos con php si hay una sesion activa o no -->
<?php
session_start();
if ( empty($_SESSION["usuario"])) 
  {
  	header('Location: ../index.php');
    die('usuario o contrasena incorrectos');
  }
  if ( $_SESSION["usuario"][1] != 'mercadotecnia') 
  {
  	header('Location: cerrarSesion.php');
    die('usuario no permitido');
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/moment.min.js"></script>
	<script type="text/javascript" src="../js/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../css/mercadotecnia.css">
	<link rel="stylesheet" type="text/css" href="../css/daterangepicker.css">
	
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
          <p id="nombreUsuario"><?php echo $_SESSION['usuario'][0]; ?><br> CerrarSesion</p>
          </a>
    	</div>

     </div>
    </nav>
    <div class="contenido-formulario container col-md-4 col-md-offset-4">
    <div class ="icono-formulario ">
    </div>
    <div id="registro">
    <div class=" col-md-offset-3">
	<h2>Registro aspirante</h2>
	<form method="post" action="registro.php" id="formulario">
		<label>Nombre</label>
		<br>
		<input class="tamaño-input" type="text" name="nombre" value="" disabled="true"> *<br>

		<label>CURP: </label>
		<br>
		<input class="tamaño-input" type="text" name="curp" value=""> *<br>
		<span id="mensaje"></span>

		<label>CURP (verificar): </label>
		<br>
		<input class="tamaño-input" type="text" name="curp_valida" value="" disabled="true"> *<br>

		<label>Fecha de Nacimiento: </label>
		<br>
		<input class="tamaño-input" type="date" name="fecha_nac" value="" disabled="true"> *<br>
		<script type="text/javascript">
         $(function() {
         $('input[name="fecha_nac"]').daterangepicker({
         singleDatePicker: true,
         showDropdowns: true,
         opens: 'left'
         }, 
         function(start, end, label) {
         
         });
         });
         </script>       
		<label>E-mail: </label>
		<br>
		<input class="tamaño-input" type="mail" name="mail" value="" disabled="true"> *<br>

		<label>Nivel académico</label>
        <br>
		<select class="tamaño-input" name="nivel">
			<option value="preparatoria">Preparatoria</option>
			<option value="profesional">Profesional</option>
			<option value="postgrado">Postgrado</option>
			<option value="ejecutivo">Ejecutivo</option>
		</select> *

		<br><br><input id = "tamaño-boton" type="submit" name="submit" class="btn btn-success" value="Enviar">
	</form>
	</div>
	</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#formulario').submit(function(e){
				e.preventDefault();
				var data = $(this).serializeArray();
				data.push({name: 'tag', value: 'login'});

				$.ajax({
					url: 'registro.php',
					type: 'post',
					dataType: 'json',
					data: data,
					.done(function(){ //true
						$('#mensaje').text('Correcto');
						$
					})
					.fail(function(){ //false
						$('#mensaje').text('Falso');
					})
					.always(function(){

					});
				});
			});
		});
	</script>
</body>
</html>