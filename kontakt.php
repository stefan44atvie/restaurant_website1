<?php 
    require_once "components/db_connect.php";


    $sql_kontakt_titel = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=13;"; 
    $res_ktt = mysqli_query ($connect, $sql_kontakt_titel);
    $rowktt = mysqli_fetch_assoc($res_ktt);
    $kontakt_titel = $rowktt["text"];

    $sql_address1 = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=14;"; 
    $res_a1 = mysqli_query ($connect, $sql_address1);
    $rowa1 = mysqli_fetch_assoc($res_a1);
    $zeile1 = $rowa1["text"];

    $sql_address2 = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=15;"; 
    $res_a2 = mysqli_query ($connect, $sql_address2);
    $rowa2 = mysqli_fetch_assoc($res_a2);
    $zeile2 = $rowa2["text"];
  
    $sql_open_title = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=16;"; 
    $res_ot = mysqli_query ($connect, $sql_open_title);
    $rowot = mysqli_fetch_assoc($res_ot);
    $open_title = $rowot["text"];

    $sql_open_z1 = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=17;"; 
    $res_o1 = mysqli_query ($connect, $sql_open_z1);
    $rowo1 = mysqli_fetch_assoc($res_o1);
    $open_z1 = $rowo1["text"];

    $sql_open_z2 = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=18;"; 
    $res_z2 = mysqli_query ($connect, $sql_open_z2);
    $rowz2 = mysqli_fetch_assoc($res_z2);
    $open_z2 = $rowz2["text"];
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <!-- Title -->
  <title>PSV-Lounge</title>
</head>
<body class="body-kontakt">
  
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
          <a class="nav-link" href="reservieren.php">Reservieren</a>
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
          <a class="nav-link active" href="kontakt.php">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Hauptmenü Ende  -->

<div class="container">
    <div class="m-4 w-50 mx-auto opacity-75">
      <div class="card text-center">
        <div class="card-header ">
          <ul class="nav nav-tabs card-header-tabs" id="myTab">
              <li class="nav-item">
                <a href="#adresse" class="nav-link active" data-bs-toggle="tab">Adresse</a>
              </li>  
              <li class="nav-item">
                <a href="#reachus" class="nav-link" data-bs-toggle="tab">Die Anfahrt</a>
              </li>
              <li class="nav-item">
                <a href="#openhours" class="nav-link" data-bs-toggle="tab">Öffnungszeiten</a>
              </li>
              <li class="nav-item">
                <a href="#contacts" class="nav-link" data-bs-toggle="tab">Kontakt</a>
              </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active fade show" id="adresse">
                <h5 class="card-title text-start"> <?php echo $kontakt_titel; ?></h5>
                <p class="card-text text-start">
                    <?php
                        echo $zeile1;
                    ?>
                </p>
                <p class="card-text text-start">
                    <?php 
                      echo $zeile2;
                    ?>
                </p>
            </div>
            <div class="tab-pane active fade" id="openhours">
                <h5 class="card-title text-start"> <?php echo $open_title ?></h5>
                <p class="card-text text-start">
                    <?php 
                      echo $open_z1;
                    ?>
                </p>
                <p class="card-text text-start">
                  <?php 
                      echo $open_z2;
                  ?>
                </p>
            </div>
            <div class="tab-pane fade" id="reachus">
            <h5 class="card-title"> So erreichen Sie uns</h5>
                <p class="card-text">
                  ja 
                </p>
                <a href="https://www.google.at/maps/dir//PSV+Lounge+-+Polizeisportverein+Wien,+Dampfschiffhaufen+2,+1220+Wien/@48.2227304,16.4276427,17z/data=!3m1!5s0x476d06d80372c48f:0x12701ce34108a2eb!4m8!4m7!1m0!1m5!1m1!1s0x476d07291129cc7b:0xde20be4d9c557b2a!2m2!1d16.4298367!2d48.2227304" target="_blank" class="btn btn-primary text-center text-bg-info">Route planen</a>
            </div>
          </div>
        </div>


      </div>
    </div> 

</div>    




  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="components/js/bootstrap.js" crossorigin="anonymous"></script>
</body>
</html>