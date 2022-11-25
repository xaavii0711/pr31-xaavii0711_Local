<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici de filtratge amb WORLD</title>
</head>
<body>
<?php
 		$conn = mysqli_connect('127.0.0.1','admin','admin123');
 
 		mysqli_select_db($conn, 'world');
 
		$consulta = "SELECT c.Name as NameCity, co.Name as NamePais FROM city c inner join country co on c.CountryCode = co.Code where co.Code ='".$_POST["codi_pais"]."';"; 
 		$resultat = mysqli_query($conn, $consulta);
 
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 	?>
	<table border="1">
	<thead><td colspan="4" align="center" bgcolor="green">Llistat de ciutats</td></thead>
 	<?php

 		while( $registre = mysqli_fetch_assoc($resultat) )
 		{
 			echo "\t<tr>\n";
 			echo "\t\t<td>".$registre["NameCity"]."</td>\n";
 			echo "\t\t<td>".$registre['NamePais']."</td>\n";
 			echo "\t</tr>\n";
 		}
 	?>
	</table>
</body>
</html>