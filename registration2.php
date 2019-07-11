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

		require_once 'dbh.php';
		include 'navigatie.php';

		// Registration system
		if (isset($_POST['submit'])) {
			$error = '';
			$voornaam = trim($_POST['voornaam']);
			$achternaam = trim($_POST['achternaam']);
			$email = trim($_POST['email']);
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			$c_password = trim($_POST['c_password']);
			$hash_pw = password_hash($password, PASSWORD_DEFAULT);

			if (empty($voornaam) || empty($achternaam) || empty($email) || empty($username) || empty($password) || empty($c_password)) {
				$error = "<div class='text-danger'>Vul alle velden in aub ! </div>";
			} else {
				$pattern = "/^[a-zA-Z ]+$/";
				if (preg_match($pattern, $voornaam)) {
					if (preg_match($pattern, $achternaam)) {
						if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
							if (strlen($password) > 4 && strlen($c_password) > 4) {
								if ($password == $c_password) {
									$check_email = $db->prepare("SELECT email FROM users WHERE email = ?");
									$check_email->execute([$email]);

									if ($check_email->rowCount() == 1) {
										$error = "<div class='text-danger'>Dit emailadres wordt al gebruikt, kies aub een ander emailadres.</div>";
				
									}
									$check_username = $db->prepare("SELECT username FROM users WHERE username = ?");
									$check_username->execute([$username]);
									if ($check_username->rowCount() == 1) {
										$error = "<div class='text-danger'>Deze username wordt al gebruikt, kies aub een ander username.</div>";
				
									}

									 else {
										$user_type = 0;
										try {
										$Insert_Query = "INSERT INTO users(voornaam,achternaam,email,username,c_password,user_type) VALUES (:voornaam,:achternaam,:email,:username,:c_password,:user_type)";
										$stmt = $db->prepare($Insert_Query);
										$stmt->bindValue(':voornaam', $voornaam);
										$stmt->bindValue(':achternaam', $achternaam);
										$stmt->bindValue(':email', $email);
										$stmt->bindValue(':username', $username);
										$stmt->bindValue(':c_password', $hash_pw);
										$stmt->bindValue(':user_type', $user_type);

										$stmt->execute();
										}
										catch(PDOException $e) {
											$sMsg = '<p> 
													Line: '.$e->getLine().'<br /> 
													File: '.$e->getFile().'<br /> 
													Errormessage: '.$e->getMessage().' 
												</p>'; 
											 
											trigger_error($sMsg); 
										}
										$db = null;
										$error = "<div class='text-success'>Uw gegevens zijn succesvol opgeslagen</div>";
									}
								} else {
									$error = "<div class='text-danger'>Wachtwoorden komen niet overeen</div>";
								}
							} else {
								$error = "<div class='text-danger'>Zwak wachtwoord gebruik een andere !</div>";
							}
						} else {
							$error = "<div class='text-danger'>Geen geldig email adres !</div>";
						}
					} else {
						$error = "<div class='text-danger'> Achternaam moet letters bevatten!</div>";
					}
				} else {
					$error = "<div class='text-danger'>Voornaam mag alleen letters bevatten!</div>";
				}
			}
		}
	

	?>

              

	 
	<div class="container">
     <div class="form-container">
		<h2>Registeer hier</h2>
		<form action="registration2.php" method="post" id="register">
			<?php if(isset($error)): echo $error; endif; ?>
			<div class="input-group">
			<label><span class="text-danger">* </span>Voornaam</label><br>
			<input type="text" name="voornaam" maxlength="50" value="<?php if(isset($voornaam)): echo $voornaam; endif; ?>"><br></div>
			<div class="input-group">
			<label><span class="text-danger">* </span>Achternaam</label><br>
			<input type="text" name="achternaam" maxlength="50" value="<?php if(isset($achternaam)): echo $achternaam; endif; ?>"><br></div>
			<div class="input-group">
			<label><span class="text-danger">* </span>Email:</label><br>
			<input type="email" name="email" maxlength="50" value="<?php if(isset($email)): echo $email; endif; ?>"><br></div>
			<div class="input-group">
			<label><span class="text-danger">* </span>Gebruikersnaam</label><br>
			<input type="text" name="username" maxlength="20" value="<?php if(isset($username)): echo $username; endif; ?>"><br></div>
			<div class="input-group">
			<label><span class="text-danger">* </span>Wachtwoord</label><br>
			<input type="password" name="password" maxlength="256" value="<?php if(isset($password)): echo $password; endif; ?>"><br></div>
			<div class="input-group">
			<label><span class="text-danger">* </span>Herhaal wachtwoord</label><br>
			<input type="password" name="c_password" maxlength="256" value="<?php if(isset($c_password)): echo $c_password; endif; ?>"><br><br></div>
			<center><input type="submit" name="submit" value="Register" class="submit"></center><br>
			<label>have an account ! <a href="login.php">Sign In</a></label>

		</form>
	</div>

	<hr>

	<center>
		<footer>
			
		</footer>
	</center>

</body>
</html>