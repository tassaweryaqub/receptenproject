<!DOCTYPE html>
<html>

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
<div>
  <div class="bg-image"></div>
    <div class="bg-text">
      <h4 style="margin-left:42%">Welkom op de contactpagina </h4>
  </div>
</div>
<main>

<div class="container2">
  <form action="index.php">
    <label for="fname">Voornaam</label>
    <input type="varchar(50)" id="fname" name="firstname"  required placeholder="Uw naam"><br><br>

    <label for="lname">Achternaam</label>
    <input type="varchar(50)" id="lname" name="lastname" required placeholder="Uw achternaam"><br><br>
    <p class="vragen">Wat is uw geslacht? </p>
    <input type="radio" name="test" id="test12" value="z" unchecked>
    <label for="test12">Man</label>
    <input type="radio" name="test" id="test12" value="z" unchecked>
    <label for="test14">Vrouw</label> <br>

    <br> <label for="country">Voor welk recept heeft u een opmerking?</label>
    <select id="country" name="country">
    <option value="Nederland">Indische recepten</option>
    <option value="België">Hollandse recepten</option>
    <option value="Duitsland">Mexicaanse recepten</option>
    <option value="Duitsland">Overig</option>
    </select>
    
    <p class="vragen">Welke chef heeft deze recept bereid? </p>
     
    <select name="cars" size="8">
    <option value="Chanella Clement">Chanella Clement</option>
    <option value="Rahel van Luik">Rahel van Luik</option>
    <option value="Eugenie Bruins Slot">Eugenie Bruins Slot</option>
    <option value="Ayaan van der Wouden">Ayaan van der Wouden</option>
    <option value="Alrik van Gog">Alrik van Gog</option>
    <option value="Luce Guijt">Luce Guijt</option>
    <option value="Fatma van Eijk">Fatma van Eijk</option>
    <option value="Hulya Hagemans">Hulya Hagemans</option>
    <option value="Fons Nelissen">Fons Nelissen</option>
    <option value="Lynn Pijnaker">Lynn Pijnaker</option>
    <option value="Celica Mendez Borrego">Celica Mendez Borrego</option>
    <option value="Abra Baeza Nieves">Abra Baeza Nieves</option>
    <option value="Chen Waals">Chen Waals</option>
    <option value="Quincy van Riet">Quincy van Riet</option>
    <option value="Yorben Tuinenburg">Yorben Tuinenburg</option>
    <option value="Marick van Duinen">Marick van Duinen</option>
    <option value="Zina Landa">Zina Landa</option>

    </select>
    <br><br>

    <label for="Verzend">Uw Opmerkingen</label>
    <textarea id="subject" name="subject" required placeholder="Uw opmerking..." style="height:180px"></textarea>
    <input type="submit" value="Submit">

   </form>
</div>

</main>

  <div class="footer">
    <p> ©Recepten AG 2019 ALLE RECHTEN ZIJN ONDER VOORBEHOUD</p>
  </div>

  </body>
</html> 
