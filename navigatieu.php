<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recepten</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles2.css">

  
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
     </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav">
           <li class="nav-item active">
             <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
           </li>
      <li class="nav-item">
         <a class="nav-link" href="hollandse-gerechten.php">Hollandse Gerechten</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mexicaanse-gerechten.php">Mexicaanse Gerechten</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indische-gerechten.php">Indische Gerechten</a>
      </li>
       <li class="nav-item">
      <a class="nav-link" href="overons.php">Over ons</a>
      </li>
       <li class="nav-item">
  <a class="nav-link" href="contact.php">Contactpagina</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info</a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="index.php">Een overzicht van alle Gerechten & Chefs</a>
        <a class="dropdown-item" href="meerdere-chefs.php">Een overzicht van alle Hollandse gerechten die door chefs zijn gemaakt</a>          
        <a class="dropdown-item" href="klanten.php">Een overzicht van alle Klantgegevens</a>
        <a class="dropdown-item" href="duurste.php">Welke recept kost het duurst ?</a>
        <a class="dropdown-item" href="goedkoopste.php">Welke recept is het goedkoopst? </a>
        <a class="dropdown-item" href="hoger.php">Welke recepten zijn met een 6.0 of hoger beoordeeld & wie heeft ze gekocht ? </a>
        <a class="dropdown-item" href="gemiddelde.php">Wat is de gemiddelde waardering van hoger beoordeelde gerechten? </a>
        <a class="dropdown-item" href="top5.php">Onze top 3 gewaardeerde aankopen </a>
        <a class="dropdown-item" href="eerste.php">Eerste aankoop </a>
        <a class="dropdown-item" href="recente.php">Meest recente aankoop </a>
        <a class="dropdown-item" href="niethollands.php">Niet hollandse gerechten </a>
        <a class="dropdown-item" href="september.php">Alle Hollandse gerechten die in september 2018 zijn besteld</a>
        <a class="dropdown-item" href="bestellingen.php">Alle bestellingen die onder de 20 minuten klaar zijn.</a>
        <a class="dropdown-item" href="aantallen.php">Hoeveel prijs aantallen zijn er van de verschillende soorten gerechten </a>
        <a class="dropdown-item" href="zeven.php">Bestellingen die met 7 + gewaardeerd zijn zonder dubbele gegevens </a>
        </div>
      </li>
     
      <li class="nav-item">
		<a class="nav-link"href="registration2.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
	</li>
      <li class="nav-item">
      	<a class="nav-link" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
      </li>
      <li class= "nav-item"> 
        <a class= "nav-link" href="mijnorders.php"> Mijn orders </a>
        </li> 
    </ul>
    </ul>
  </div>

  <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Mijn Gegevens
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="change.php">Verander Wachtwoord</a>
    <a class="dropdown-item" href="order.php"> Bestel producten</a>

  </div>
</div>
          <form class="form-inline" style="width:20%" method="post" action="searchbar.php">
          <input class="form-control mr-sm-2" type="text" name="zoeker" placeholder="Search">
          <button class="btn btn-primary" type="submit">Zoeken</button>
          </form>
  </nav><br>
   <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>