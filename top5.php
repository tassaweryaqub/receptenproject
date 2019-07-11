
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

  <center><h1>Onze top 3 gewaardeerde aankopen</h1></center>
<?php
                
 require ('dbh.php');
  try {
     $query = $db->prepare("SELECT k_voornaam, k_achternaam, bestelling.k_id, hg_naam, b_waardering, b_aanmaakdatum, typenummer
      FROM bestelling
      INNER JOIN klanten ON bestelling.k_id=klanten.k_id
      INNER JOIN gerechten ON bestelling.g_id=gerechten.g_id
     WHERE b_waardering >=7.5 ");

    $query->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
                    echo '<table class="table table-striped" border="1">';
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>voornaam</th>";
                    echo "<th>achternaam</th>";
                    echo "<th>klantid</th>";
                    echo "<th>receptnaam</th>";
                    echo "<th>waardering</th>";
                    echo "<th>aankoopdatum</th>";
                    echo "<th>Type</th>";




                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    foreach ($result as &$data) {
                    echo "<tr>";
                    echo "<td>" . $data["k_voornaam"] . "</td>";
                    echo "<td>" . $data["k_achternaam"] . "</td>";
                    echo "<td>" . $data["k_id"] . "</td>";
                    echo "<td>" . $data["hg_naam"] . "</td>";
                    echo "<td>" . $data["b_waardering"] . "</td>";
                    echo "<td>" . $data["b_aanmaakdatum"] . "</td>";
                    echo "<td>" . $data["typenummer"] . "</td>";




                    echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                }
                catch(PDOExeption $e) {
                  die("Error!: " . $e->getMessage());
                }


               ?>
 
             </body>
             
             </html>