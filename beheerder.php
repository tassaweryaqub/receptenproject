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
<body class="container" id="body1">
<div class="right">
  <label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
</div>
 <?php
	require_once 'dbh.php';
 ?>

	<?php
		session_start();
		if (!isset($_SESSION['admin_login'])||$_SESSION['admin_login'] == false) {
			header("Location:login.php");
			session_destroy();
			exit();
		}
	?>
		<?php
			if (isset($_SESSION['username'])) {
			  echo "<br> <p> Welkom </p>". $_SESSION['username'];
			       		
			}
		?>
	<?php 
	 include 'navigatieb.php'; 
	 ?>

	<?php

		// Update user
    	if (isset($_POST['update'])) {
	    	$voornaam = $_POST['voornaam'];
	    	$achternaam = $_POST['achternaam'];
	    	$username = $_POST['username'];
	    	$email = $_POST['email'];
			$user_id = $_POST['user_id'];



        	$query = "UPDATE users SET voornaam = :voornaam, achternaam = :achternaam, email = :email, username = :username WHERE user_id = :user_id";

	        $stmt = $db->prepare($query);
	        $stmt->bindValue(':user_id', $user_id);
	        $stmt->bindValue(':voornaam', $voornaam);
	        $stmt->bindValue(':achternaam', $achternaam);
	        $stmt->bindValue(':email', $email);
	        $stmt->bindValue(':username', $username);
	        $stmt->execute();

	        echo "<div class='text-success'>Deze gebruiker is geupdate!</div>";
	        if ($_SESSION['user_id']==$user_id) {
	        	$_SESSION['username'] = $username;
	        }
		}

		// Delete user
		if (isset($_POST['delete'])) {
			$user_id = $_POST['user_id'];
	    	$voornaam = $_POST['voornaam'];
	    	$achternaam = $_POST['achternaam'];
	    	$email = $_POST['email'];
	    	$username = $_POST['username'];
 
	        $query = "DELETE FROM users WHERE user_id = :user_id";
	        $stmt = $db->prepare($query);
	        $stmt->bindValue(':user_id', $user_id);
	        $stmt->execute();

	        echo "<div class='text-success'>Deze gebruiker is verwijderd!</div>";
	    }

    ?>

	<?php

		echo "<h1>Wijzig Gegevens</h1>";
		try {
			$query = "SELECT * FROM users";
			$stmt = $db->prepare($query);
			$stmt->execute();

			echo "<div class='container'>";
			echo "<table class='table' border='1'>";
			echo "<thead>
				<td>ID</td>
				<td>Voornaam</td>
				<td>Achternaam</td>
				<td>E-mail adres</td>
				<td>Gebruikersnaam</td>
				<td colspan='2'>Opties</td>
			</thead>";

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
				<form action="beheerder.php" method="post">
					<tr>
						<td><?php echo($row['user_id']); ?><input type="hidden" name="user_id" value="<?php echo($row['user_id']); ?>"></td>
						<td><input type="text" name="voornaam" value="<?php echo($row['voornaam']); ?>" maxlength="50"></td>
						<td><input type="text" name="achternaam" value="<?php echo($row['achternaam']); ?>" maxlength="50"></td>
						<td><input type="text" name="email" value="<?php echo($row['email']); ?>" maxlength="50"></td>
						<td><input type="text" name="username" value="<?php echo($row['username']); ?>" maxlength="20"></td>
						<td><input type="submit" name="update" value="Update user"></td>
						
					</tr>
				</form>

			<?php
			}
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
