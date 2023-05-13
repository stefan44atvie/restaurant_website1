<?php 
    require_once "components/db_connect.php";


    $sql_reserve_titel = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=10;"; 
    $res_rti = mysqli_query ($connect, $sql_reserve_titel);
    $rowRTI = mysqli_fetch_assoc($res_rti);
    $reserve_titel = $rowRTI["text"];

    $sql_reserve_text = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=11;"; 
    $res_rte = mysqli_query ($connect, $sql_reserve_text);
    $rowRTE = mysqli_fetch_assoc($res_rte);
    $reserve_text = $rowRTE["text"];

    $sql_danke = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=12;"; 
    $res_danke = mysqli_query ($connect, $sql_danke);
    $rowDANKE = mysqli_fetch_assoc($res_danke);
    $danke = $rowDANKE["text"];

    $sql_foermlich = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=9;"; 
    $res_foe = mysqli_query ($connect, $sql_foermlich);
    $rowFR = mysqli_fetch_assoc($res_foe);
    $dankefoe = $rowFR["text"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS Files Links -->
  <link rel="stylesheet" href="components/css/bootstrap.css">
  <link rel="stylesheet" href="components/css/psvstyles.css">

  <!-- Title -->
  <title>PSV-Lounge</title>
</head>
<body class="body-reservieren" height="100vh">
  
<!-- Hauptmenü -->
<nav class="navbar navbar-expand-lg bg-light sticky-top opacity-75">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="media/Logo/logo1.png" height="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="speisekarte.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Speisekarte
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="speisekarte.php">Speisekarte</a></li>
            <li><a class="dropdown-item " href="wochenkarte.php">Wochenkarte</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item disabled" href="#">Sommerkarte</a></li>
            <li><a class="dropdown-item disabled" href="#">Grillkarte</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="getraenke.php">Getränke</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="reservieren.php">Reservieren</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="veranstaltungen.php">Veranstaltungen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="angebote.php">Angebote vor Ort</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="galerie.php">Galerie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontakt.php">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Hauptmenü Ende  -->

<!-- Container Box Anfang -->
<div class="m-4 w-50 mx-auto opacity-75">
  <div class="card text-center">
    <div class="card-header ">
      <ul class="nav nav-tabs card-header-tabs " id="myTab">
          <li class="nav-item">
            <a href="#infos" class="nav-link active" data-bs-toggle="tab">Informationen zu Reservierungen</a>
          </li>  
          <li class="nav-item">
            <a href="#reservierung" class="nav-link" data-bs-toggle="tab">Ihre Reservierung</a>
          </li>
      </ul>
    </div>
    <div class="card-body ">
      <div class="tab-content">
        <div class="tab-pane active fade show" id="infos">
            <h5 class="card-title"> <?php echo $reserve_titel; ?> </h5>
            <p class="card-text text-center">
              <?php 
                echo $reserve_text;
              ?>
            </p>
            <p class ="card-text text-center">
                <?php
                  echo $danke;
                ?>
           </p>    
           <p class ="card-text text-center danke">
                <?php 
                  echo $dankefoe;
                ?>
          </p>
        </div>
        <div class="tab-pane fade show" id="reservierung">
        <h5 class="card-title"> HOHO</h5>
            <p class="card-text">
    
            <!-- Beginn Eingabeformular  -->
            <form class="form-control">    
              <div class="input-group mb-3">
                    <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1" name="name">
                  </div>

                  <div class="input-group mb-3">
                    <input type="date" class="form-control" placeholder="datum" aria-label="Recipient's username" aria-describedby="basic-addon2" name="datum">
                    <span class="input-group-text" id="basic-addon2">Ihr gewünschtes Datum</span>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">Personenanzahl</span>
                    <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="anzahl">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text">Rückrufnummer</span>
                    <input type="text" class="form-control" aria-label="Telefonnummer" name="phone">
                  </div>
                  <div class="input-group mb-3">
                  <span class="input-group-text">@</span>
                    <input type="text" class="form-control" placeholder="email" aria-label="email" name="email">
                  </div>

                  <div class="input-group">
                    <span class="input-group-text">Anmerkungen</span>
                    <textarea class="form-control" aria-label="With textarea" name="notes"></textarea>
                  </div>
                  <input type="submit" name="sumbit" class="btn btn-primary" value="Termin anfragen">
            </form>
    <!-- Ende des Formulars -->
        </div>
      </div>
    </div>
  </div>
</div> 
   <!-- Container Box Ende  -->


  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="components/js/bootstrap.js" crossorigin="anonymous"></script>
</body>
</html>