 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recepten</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	include ('navigatie.php');
	require ('dbh.php');
?>

<div class="container">
	<div class="row">
	<p><h2 class="kop">Gevonden Resultaten </h2></p>
	
		<?php 

    	$zoek = $_POST['zoeker'];

		try 
		{ 
			$sQuery = ("SELECT *
				FROM gerechten
				WHERE g_id LIKE :zoek 
				OR hg_naam LIKE :zoek 
				OR hg_chefnaam LIKE :zoek 
				OR hg_bereidingswijze LIKE :zoek 
				OR hg_tijd LIKE :zoek    
				OR hg_prijs LIKE :zoek 
				OR typenummer LIKE :zoek");    
			$oStmt = $db->prepare($sQuery); 
			$oStmt->bindValue(':zoek', "%$zoek%"); 
			$oStmt->execute();	

			if($oStmt->rowCount()>0) 
			{
					echo '<table class="table table-bordered table-hover tkop">';
					echo '<thead>';
					echo '<td>gerechtid</td>';
					echo '<td>gerechtnaam</td>';
				    echo '<td>chefnaam</td>';
				    echo '<td>bereidingswijze</td>';
				    echo '<td>tijd</td>';
				    echo '<td>prijs</td>';
				    echo '<td>type</td>';
 
					echo '</thead>';	
				while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC)) 
				{ 
					echo '<tr>';
					echo '<td>'.$aRow['g_id'].'</td>'; 
					echo '<td>'.$aRow['hg_naam'].'</td>'; 
				    echo '<td>'.$aRow['hg_chefnaam'].'</td>'; 
				    echo '<td>'.$aRow['hg_bereidingswijze'].'</td>'; 
				    echo '<td>'.$aRow['hg_tijd'].'</td>'; 
				    echo '<td>'.$aRow['hg_prijs'].'</td>'; 
				    echo '<td>'.$aRow['typenummer'].'</td>'; 
					echo '</tr>';	
				} 
				echo '</table>';
			}
			else 
			{
				echo '<br>Helaas, geen gegevens bekend';
			}
		} 
		catch(PDOException $e) 
		{ 
			$sMsg = '<p> 
					Regelnummer: '.$e->getLine().'<br /> 
					Bestand: '.$e->getFile().'<br /> 
					Foutmelding: '.$e->getMessage().' 
				</p>'; 
			 
			trigger_error($sMsg); 
		} 
		$db = null;
	?>
	
	</div>

</div>


</body>
</html> 