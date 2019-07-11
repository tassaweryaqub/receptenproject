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
<div class="right">
  <label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
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
try {

        $query = $db->prepare("SELECT users.user_id, bestelling.b_id, bestel_id, bestelgegevens.datum, hg_prijs, aantal, bestelgegevens.g_id, hg_naam, username 
                  FROM users 
                  INNER JOIN bestelling 
                  ON users.user_id = bestelling.user_id
                  INNER JOIN bestelgegevens 
                  ON bestelling.b_id = bestelgegevens.b_id
                  INNER JOIN gerechten
                  ON bestelgegevens.g_id = gerechten.g_id
                  WHERE users.user_id = :user_id ");
     

        $query->bindValue(':user_id', $_SESSION['test']);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_ASSOC);

        echo '<table class="table table-striped" border="1">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Gerechtnaam:</th>";
        echo "<th>Aantal:</th>";
        echo "<th>Totale prijs:</th>";
        echo "<th>Besteldatum:</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
         foreach ($result as &$data) {
        $prijs = $data["aantal"] * $data["hg_prijs"];
        echo "<tr>";
        echo "<td>" . $data["hg_naam"] . "</td>";
        echo "<td>" . $data["aantal"] . "</td>";
        echo "<td>€" . $prijs . "</td>";
        echo "<td>" . $data["datum"] . "</td>";
        echo "</tr>";}                
        echo "</tbody>";
        echo "</table>";  }
        
    
    catch(PDOExeption $e) {
      die("Error!: " . $e->getMessage());
    }
     ?>
  
  </body>
</html>
