
<!DOCTYPE html>
<html lang="en">
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
<body>
<?php 
include 'navigatieu.php'; 
?>

  <center><h1>Een overzicht van alle Aankopen gewaardeerd met 6.0 of meer </h1></center>
<?php
                
                 require ('dbh.php');
 
                try {
                    $query = $db->prepare("SELECT k_voornaam ,k_achternaam, b_waardering, hg_naam, b_aanmaakdatum, bestelling.k_id, typenummer, bestelling.g_id FROM bestelling INNER JOIN klanten ON bestelling.k_id=klanten.k_id INNER JOIN gerechten ON bestelling.g_id=gerechten.g_id WHERE b_waardering >= 6.0");

                    $query->execute();
                    $result = $query->fetchALL(PDO::FETCH_ASSOC);

                    echo '<table class="table table-striped" border="1">';
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>KlantId </th>";
                    echo "<th>Voornaam </th>";
                    echo "<th>Achternaam </th>";
                    echo "<th>Waardering </th>";
                    echo "<th>Receptnamen </th>";
                    echo "<th>Aanmaakdatum</th>";
                    echo "<th>Type</th>";


                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    foreach ($result as &$data) {
                    echo "<tr>";
        
                    echo "<td>" . $data["k_id"] . "</td>";
                    echo "<td>" . $data["k_voornaam"] . "</td>";
                    echo "<td>" . $data["k_achternaam"] . "</td>";
                    echo "<td>" . $data["b_waardering"] . "</td>";
                    echo "<td>" . $data["hg_naam"] . "</td>";
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