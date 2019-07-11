
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
include 'navigatie.php'; 
?>

<center><h1>Alle Hollandse gerechten die in september 2018 zijn besteld.  </h1></center>

  <?php                           
    try {
    require ('dbh.php');
    $query = $db->prepare(" SELECT * FROM bestelling 
                INNER JOIN klanten ON bestelling.k_id=klanten.k_id 
                INNER JOIN gerechten ON bestelling.g_id=gerechten.g_id
                WHERE b_aankoopdatum LIKE '%18-09%'AND typenummer LIKE '%hollands%'" );
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
      echo "<th>Aankoopdatum</th>";
      echo "<th>Waardering</th>";
      echo "<th>Voornaam</th>";
      echo "<th>Achternaam</th>";



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
      echo "<td>" . $data["b_aankoopdatum"] . "</td>";
      echo "<td>" . $data["b_waardering"] . "</td>";  
      echo "<td>" . $data["k_voornaam"] . "</td>";                      
      echo "<td>" . $data["k_achternaam"] . "</td>";                      
                    
                      
                   
      echo "</tr>";               }
      echo "</tbody>";
      echo "</table>";             }
                
      catch(PDOExeption $e) {
      die("Error!: " . $e->getMessage());
                            }


  ?>

  </body>
</html>