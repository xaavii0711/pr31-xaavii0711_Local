<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici de filtratge amb WORLD</title>
</head>
<body>
	<h1>Filtre de ciutats per país</h1>
<?php
 		$conn = mysqli_connect('127.0.0.1','admin','admin123');
 
 		mysqli_select_db($conn, 'world');
 
 		$consulta = "SELECT * FROM country;";
 
 		$resultat = mysqli_query($conn, $consulta);
 
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 	?>

    <form action= "results.php" method="post">
    	<select name="codi_pais">
 	<?php
 		while( $registre = mysqli_fetch_assoc($resultat) )
 		{
 			echo "<option value='".$registre['Code']."'>".$registre['Name'].'</option>';
 		}
 	?>
    </select>
    <input type="submit"> 
    </form>
</body>
</html>