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
      try {
        if(isset($_POST['submit'])) {

          $aantal = $_POST['aantal'];
          $datum = date('Y-m-d');
          $g_id = $_POST['g_id'];
          if($aantal <= 0) {
            echo "Voer een minimum getal in";
          } else {

              $bestelling = "INSERT INTO bestelling (user_id, datum)
                             VALUES (:user_id, :datum)";
              $query = $db->prepare($bestelling);
              $query->bindValue(':user_id', $_SESSION['test']);
              $query->bindValue(':datum', $datum);
              $query->execute(); 
              $b_id = $db->lastInsertId();

              $bestelling = "INSERT INTO bestelgegevens (g_id, b_id, aantal, datum)
                             VALUES (:g_id, :b_id, :aantal, :datum)";
                $query = $db->prepare($bestelling);
                $query->bindValue(':g_id', $g_id);
                $query->bindValue(':b_id', $b_id);
                $query->bindValue(':aantal', $aantal);
                $query->bindValue(':datum', $datum);
                $query->execute();
                echo "<script> alert($bestelling) </script>";
                $bestel_id = $db->lastInsertId();
                  echo  "<script> alert('uw bestelling is geplaatst! met bestel-nr $b_id') </script>";
                  echo "<script> alert('bestelgegevens zijn opgeslagen met bestelgeg-id $bestel_id') </script>";
                  header('Refresh: 2; mijnorders.php');

              }
            
            }

          }
        
      catch(PDOException $e) {
      $sMsg = '<p> 
          Line: '.$e->getLine().'<br /> 
          File: '.$e->getFile().'<br /> 
          Errormessage: '.$e->getMessage().' 
        </p>'; 
      trigger_error($sMsg); 
    }
       ?>
        
       <?php
         try {
           include 'dbh.php';

           $query = "SELECT * FROM gerechten";
           $stmt = $db->prepare($query);
           $stmt->execute();

           echo "<table border='1'>";
           echo '<thead>
                   <td>Product naam</td>
                   <td>Prijs</td>
                   <td>Aantal</td>
                   <td>IDproduct</td>
                 </thead>';
           while($rij = $stmt->fetch(PDO::FETCH_ASSOC)) {
             ?>
               <form action="order.php" method="post">
                 <tr>
                   <td><input type="text" name="hg_naam" value="<?php echo($rij['hg_naam'])?>" class="form-control" disabled></td>
                   <td><input type="text" name="hg_prijs" value="<?php echo($rij['hg_prijs'])?>" disabled></td>
                   <td><input type="number" name="aantal" class="form-control"></td>
                   <td><input type="hidden" name="g_id" value="<?php echo($rij['g_id'])?>" class="form-control"></td>
                   <td><button class="btn btn-outline-success mr-sm-2" type="submit" name="submit">Plaats Order</button></td>
                 </tr>
               </form>
             <?php
           }
         } catch (\Exception $e) {
           die("Error!: " . $e->getMessage());
         }

        ?>
 
  </body>
</html>