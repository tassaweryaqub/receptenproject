<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recepten</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body class="container" id="body1">

	<div class="right">
     <a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>


	<?php
		require_once 'dbh.php';
	?>

		<?php
		session_start();
		if (!isset($_SESSION['u_login'])||$_SESSION['u_login'] == false) {
			header("Location:login.php");
			session_destroy();
			exit();
		}
	?>

	<?php 
	include 'navigatie.php'; 
	?>

	<?php

	// Update product
    	if (isset($_POST['new'])) {
	    	$g_id = $_POST['g_id'];
	    	$hg_naam = $_POST['hg_naam'];
	    	$hg_chefnaam = $_POST['hg_chefnaam'];

        	$query = "INSERT INTO usergerechten SET hg_naam = :hg_naam, hg_chefnaam = :hg_chefnaam WHERE g_id = :g_id";

	        $stmt = $db->prepare($query);
	        $stmt->bindValue(':g_id', $g_id);
	        $stmt->bindValue(':hg_naam', $hg_naam);
	        $stmt->bindValue(':hg_chefnaam', $hg_chefnaam);
	        $stmt->execute();

	        echo "<div class='text-success'> Dit product is succesvol geupdate!</div>";
		}


		
	    // Add Product
		if(isset($_POST['new'])) {
	    	$g_id = $_POST['g_id'];
	    	$hg_naam = $_POST['hg_naam'];
	    	$hg_chefnaam = $_POST['hg_chefnaam'];

	        if(empty($hg_naam) || empty($hg_chefnaam)) {
	        	echo "<div class='text-danger'>Alle velden zijn vereist !<div>";
	        } else {
		        $query = "INSERT INTO usergerechten (g_id, hg_naam , hg_chefnaam) VALUES (:g_id, :hg_naam, :hg_chefnaam)";
		        $stmt = $db->prepare($query);
		        $stmt->bindValue(':g_id', $g_id);
		        $stmt->bindValue(':hg_naam', $hg_naam);
		        $stmt->bindValue(':hg_chefnaam', $hg_chefnaam);
		        $stmt->execute();

		        echo "<div class='text-success'> Dit product is succesvol toegevoegd!</div>";
			}
		}

    ?>

	<?php

		echo "<h1> Mijn Producten</h1>";
		try {
			$query = "SELECT * FROM usergerechten";
			$stmt = $db->prepare($query);
			$stmt->execute();

			echo "<div class='container'>";
			echo "<table class='table' border='1'>";
			echo "<thead>
				<td>ID</td>
				<td>Naam</td>
				<td>Chefnamen</td>
				<td colspan='2'>Actie</td>
			</thead>";

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
				<form action="usermuteer.php" method="post">
					<tr>
						<td><?php echo($row['g_id']); ?><input type="hidden" name="g_id" value="<?php echo($row['g_id']); ?>"></td>
						<td><input type="text" name="hg_naam" value="<?php echo($row['hg_naam']); ?>" maxlength="100"></td>
						<td><input type="text" name="hg_chefnaam" value="<?php echo($row['hg_chefnaam']); ?>" maxlength="70"></td>
						<td><input type="submit" name="new" value="add Product"></td>
						
					</tr>
				</form>
			<?php
			}
			?>
				<form action="usermuteer.php" method="post">
					<tr>
						<td><?php echo($row['g_id']); ?><input type="hidden" name="g_id" value=""></td>
						<td><input type="text" name="hg_naam" value="" maxlength="50" required></td>
						<td><input type="text" name="hg_chefnaam" value="" maxlength="50" required></td>
						<td colspan="2"><input type="submit" name="new" value="Add product"></td>
					</tr>
				</form>

		<div class="dropdown show">
		 <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Wijzigen</a>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		<a class="dropdown-item" href="usermuteer.php">Product Wijzigen</a>
		</div>

			<?php
			} catch(PDOException $e) {
				$sMsg = '<p> 
						Line: '.$e->getLine().'<br /> 
						File: '.$e->getFile().'<br /> 
						Errormessage: '.$e->getMessage().' 
					</p>'; 
											 
				trigger_error($sMsg); 
			}
		?>

</body>
</html>
