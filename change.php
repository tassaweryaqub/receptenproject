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
		// Change password
		try{

		if (isset($_POST['update'])) {

			$query = "SELECT * FROM users WHERE user_id = :user_id";
			$stmt = $db->prepare($query);
			$stmt->bindValue(':user_id', $_SESSION['test']);
			$stmt->execute();

			if ($stmt->rowCount() == 1) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
				if (password_verify($_POST['oud_wachtwoord'], $row['c_password'])) {
					if ($_POST['c_password'] == $_POST['c_password2']) {
						$hash_pw = password_hash($_POST['c_password2'], PASSWORD_DEFAULT);

						$query = "UPDATE users SET c_password = :c_password WHERE user_id = :user_id";

						$stmt = $db->prepare($query);
						$stmt->bindValue(':c_password', $hash_pw);
						$stmt->bindValue(':user_id', $_SESSION['test']);
						$stmt->execute();

						echo "<div class='text-success'> Je wachtwoord is succesvol ge-update! </div>";
						header("Refresh: 3; profiel.php");  

					} else {
						echo "<div class='text-danger'> Wachtwoorden komen niet overeen! </div>";
					}
				} else {
					echo "<div class='text-danger'> De wachtwoorden komen niet overeen! </div>";
				}
			}        	
		}

	?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Verander Wachtwoord</h2>
		</div>

		<div class="dropdown show">
		 <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Mijn Gegevens</a>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		<a class="dropdown-item" href="change.php">Verander Wachtwoord</a>
		</div>

		<div class="panel-body container">
			<div>
				<form action="change.php" method="POST">
					<div class="form-group">
						<label for="">Oude Wachtwoord</label>
						<input type="password" name="oud_wachtwoord" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Nieuwe wachtwoord</label>
						<input type="password" name="c_password" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Herhaal nieuwe wachtwoord</label>
						<input type="password" name="c_password2" class="form-control" required>
					</div>
					<button type="submit" name="update" class="btn btn-primary">Wijzig Wachtwoord</button>
				</form>

			</div>
		</div>
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