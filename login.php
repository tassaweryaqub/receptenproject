<!DOCTYPE html>
<html lang="en">
<body>

<?php
require_once 'dbh.php';
session_start();
?>

<div class="container">
	<div class="d-flex justify-content-center mt-5 mb-2">
		<h2>Login Here</h2>
	</div>
		<div class="d-flex justify-content-center">
		<form action="" method="post">
			<?php
				//Login System
				$error = "";
				if (isset($_POST['submit'])) {
					$username = $_POST['username'];
					$c_password = $_POST['c_password'];
					if (empty($username) || empty($c_password)) {
						$error = "Alle velden zijn vereist !<br>";
					} else {
						try {
							$stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
							$stmt->bindValue(':username', $username);
							$stmt->execute();
							$result = $stmt->fetch(PDO::FETCH_ASSOC);
							if($stmt->rowCount() == 1) {
								if (!password_verify($c_password, $result['c_password'])) {
									$error = "Password and username do not match!<br>";
								} else {
									$_SESSION['username'] = $username;
									$_SESSION['user_id'] = $result['user_id'];

									if ($result['user_type'] == 1) {
										$_SESSION['admin_login'] = true;
										header("Refresh: 3; beheerder.php");
									} else {
										$_SESSION['u_login'] = true;
										$_SESSION ['test'] = $result['user_id'];
										header("Refresh: 2; profiel.php");  
									}
								}
							} else {
								$error = "No accounts were found!<br>";
							}
						} catch(PDOException $e) {
							$sMsg = '<p> 
									Line: '.$e->getLine().'<br /> 
									File: '.$e->getFile().'<br /> 
									Errormessage: '.$e->getMessage().' 
								</p>'; 
							trigger_error($sMsg);
						}
					}
				}
				if ($error != "") {
					echo "<div class='text-danger'>";
					echo $error."<br>";
					echo "</div>";
				}

			?>
			<label>Username:</label><br>
			<input type="text" name="username" maxlength="20"><br>
			<label>Password:</label><br>
			<input type="password" name="c_password" maxlength="256"><br><br>
			<center>
				<input type="submit" name="submit" value="Login" class="submit-btn"></center><br><br>
		</form>
	</div>
</div>

	<hr>
	<center>
		<footer>
			
		</footer>
	</center>
</body>
</html>