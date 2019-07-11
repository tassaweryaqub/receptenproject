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
		include 'navigatieu.php'; 
	?>

	<?php

		// Update data
    	if (isset($_POST['update'])) {
	    	$user_id = $_POST['user_id'];
	    	$voornaam = $_POST['voornaam'];
	    	$achternaam = $_POST['achternaam'];
	    	$email = $_POST['email'];
	    	$username = $_POST['username'];
	    	$user_type = $_POST['user_type'];


        	$query = "UPDATE users SET voornaam = :voornaam, achternaam = :achternaam, email = :email, username = :username, user_type = :user_type WHERE user_id = :user_id";

	        $stmt = $db->prepare($query);
	        $stmt->bindValue(':user_id', $user_id);
	        $stmt->bindValue(':voornaam', $voornaam);
	        $stmt->bindValue(':achternaam', $achternaam);
	        $stmt->bindValue(':email', $email);
	        $stmt->bindValue(':username', $username);
	        $stmt->bindValue(':user_type', $user_type);
			$stmt->execute();

	        $_SESSION['username'] = $username;

	        echo "<div class='text-success'>Your data has been successfully updated!</div>";
		}

    ?>


	<?php
	echo "<br> <p> Welkom </p>". $_SESSION['username'];

		echo "<h1>Wijzig pagina</h1>";
		try {
			$query = "SELECT * FROM users WHERE username = :username";
			$stmt = $db->prepare($query);
			$stmt->bindValue(':username', $_SESSION['username']);
			$stmt->execute();

			echo "<div class='container'>";
			echo "<table class='table' border='1'>";
			echo "<thead>
				<td>ID</td>
				<td>Voornaam</td>
				<td>Achternaam</td>
				<td>Email</td>
				<td>Gebruikersnaam</td>
				<td>Gebruikerssoort</td>
				<td>Bewerkstatus</td>
			</thead>";

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				?>
				<form action="profiel.php" method="post">
					<tr>
						<td><?php echo($row['user_id']); ?><input type="hidden" name="user_id" value="<?php echo($row['user_id']); ?>"></td>
						<td><input type="text" name="voornaam" value="<?php echo($row['voornaam']); ?>" maxlength="50"></td>
						<td><input type="text" name="achternaam" value="<?php echo($row['achternaam']); ?>" maxlength="50"></td>
						<td><input type="text" name="email" value="<?php echo($row['email']); ?>" maxlength="50"></td>
						
						<td><input type="text" name="username" value="<?php echo($row['username']); ?>" maxlength="20"></td>
						<td><?php echo($row['user_type']); ?><input type="hidden" name="user_type" value="<?php echo($row['user_type']); ?>"></td>
						<td><input type="submit" name="update" value="Update"></td>
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