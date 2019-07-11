<!DOCTYPE html> 
<html>
    
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Database Recepten </title>
    <meta charset="UTF-8">
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
 include 'navigatie.php'; 
 ?>



<?php
   try {
   require ('dbh.php');
    $query = $db->prepare("SELECT * FROM gerechten " );
    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
       echo '<table class="table table-striped" border="1">';
       echo "<thead>";
       echo "<tr>";
       echo "<th>Id</th>";
       echo "<th>Naam</th>";
       echo "<th>Bereidingswijze</th>";
       echo "<th>Chefnaam</th>";
       echo "<th>Tijd</th>";
       echo "<th>Prijs</th>";
       echo "<th>Type</th>";
       echo "</tr>";
       echo "</thead>";
       echo "<tbody>";
    foreach ($result as &$data) {
       echo "<tr>";
       echo "<td>" . $data["g_id"] . "</td>";
       echo "<td>" . $data["hg_naam"] . "</td>";
       echo "<td>" . $data["hg_bereidingswijze"] . "</td>";
       echo "<td>" . $data["hg_chefnaam"] . "</td>";
       echo "<td>" . $data["hg_tijd"] . "</td>";
       echo "<td>" . $data["hg_prijs"] . "</td>";
       echo "<td>" . $data["typenummer"] . "</td>";
       echo "</tr>"; }
       echo "</tbody>";
       echo "</table>";
                     }
    catch(PDOExeption $e) {
    die("Error!: " . $e->getMessage());
                     }
?>
 
</body>
</html>