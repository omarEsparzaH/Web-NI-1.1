<?php 
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "gustavo_test";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	} else {
		//echo "Connected successfully";

		$nombre = $_POST['nombre'];
		$curp = $_POST['curp'];
		$curp_valida = $_POST['curp_valida'];
		$fecha_nac = $_POST['fecha_nac'];
		$mail = $_POST['mail'];
		$nivel = $_POST['nivel'];

		$sql = "SELECT * FROM aspirante WHERE curp = '$curp'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			echo "Aspirante ya inscrito...";
		} else { 
			if ($curp != $curp_valida) {
				echo "La CURP de validación no es igual";
			} else {
				$sql = "INSERT INTO aspirante (nombre, fecha_nac, curp, curp_valida, nivel, email)
				VALUES ('$nombre', '$fecha_nac','$curp', '$curp_valida', '$nivel', '$mail')";

				if (mysqli_query($conn, $sql)) {
				    echo "Aspirante capturado correctamente!";
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}

		mysqli_close($conn);
	}
	
	echo "<br><br><a href='index.php'>Regresar<a/>";


 ?>