<html>
 <head>
 	<title>Exercici SQL COUNTRIES</title>
 	<style>
 		body{
 		}
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 	</style>
 </head>
 
 <body>

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
 
    <form action="" method="POST">
 	<label for="codi_pais">País:</label>
 	<select name="codi_pais" id="codi_pais">

 	<?php
 		
 		while( $registre = mysqli_fetch_assoc($resultat) )
 		{
            echo "<option value=".$registre["Code"].">".$registre["Name"]."</option>";
 		}
 	?>

    </select><br><br>
    <label for="nom_ciutat">Nom ciutat:</label>
    <input id="nom_ciutat" type="text" name="nom_ciutat"><br><br>
    <label for="poblacio">Població:</label>
    <input type="number" name="poblacio" id="poblacio"><br><br>
    <input type="submit" name="submit" id="submit">
    </form>

    <?php

        if(isset($_POST["submit"])){
            $existeix = "select * from city where name= '".$_POST["nom_ciutat"]."' and CountryCode= '".$_POST["codi_pais"]."';";
            $resultatExisteix = mysqli_query($conn, $existeix);
            $fileresExisteix = mysqli_num_rows($resultatExisteix);
        if($fileresExisteix > 0){
            echo "<div class='missatge'>Aquesta ciutat ja existeix en aquest país</div>";
        }
        else{
            $insertarBDD = "INSERT INTO city (Name,CountryCode,Population) values('".$_POST["nom_ciutat"]."','".$_POST["codi_pais"]."',".$_POST["poblacio"].");";
            $resultatInsertarBDD = mysqli_query($conn, $insertarBDD);
            if($resultatInsertarBDD){
                echo "<div class='missatge'>Ciutat afegida correctament</div>";
            }
        }
        }
    ?>

    <a href="index.php">Tornar a l'inici</a>

 </body>
</html>