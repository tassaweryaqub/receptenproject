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
include 'navigatieu.php'; 
?>

<center><h1>Wat is de eerste aanmaakdatum van het gerecht en wie kocht dit in ?</h1></center>

<?php
 require ('dbh.php');
 try {
  $query = $db->prepare("SELECT b_aanmaakdatum,b_waardering, hg_naam, bestelling.k_id, k_voornaam, k_achternaam, typenummer 
        from bestelling
        INNER JOIN klanten ON bestelling.k_id=klanten.k_id 
        INNER JOIN gerechten ON bestelling.g_id=gerechten.g_id
        WHERE b_aanmaakdatum = '2016-09-01'");
  $query->execute();
  $result = $query->fetchALL(PDO::FETCH_ASSOC);
    echo '<table class="table table-striped" border="1">';
    echo "<thead>";
    echo "<tr>";
    echo "<th>receptnaam</th>";
    echo "<th>type</th>";
    echo "<th>aanmaakdatum</th>";
    echo "<th>waardering</th>";
    echo "<th>klantid</th>";
    echo "<th>voornaam</th>";
    echo "<th>achternaam</th>";

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
  foreach ($result as &$data) {
    echo "<tr>";
    echo "<td>" . $data["hg_naam"] . "</td>";
    echo "<td>" . $data["typenummer"] . "</td>";
    echo "<td>" . $data["b_aanmaakdatum"] . "</td>";
    echo "<td>" . $data["b_waardering"] . "</td>";
    echo "<td>" . $data["k_id"] . "</td>";
    echo "<td>" . $data["k_voornaam"] . "</td>";
    echo "<td>" . $data["k_achternaam"] . "</td>";



    echo "</tr>";            }
    echo "</tbody>";
    echo "</table>";         }
  catch(PDOExeption $e) {
  die("Error!: " . $e->getMessage());}


 ?>
 
</body>
             
</html>