<?php
      require_once "components/db_connect.php";

      $sql_wtext="SELECT public_texte.textart, public_texte.text FROM public_texte where id=1;";
      $res_w = mysqli_query ($connect, $sql_wtext);
      $rowW=mysqli_fetch_assoc($res_w);
      $welcome_text = $rowW["text"];

      $sql_wtitle = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=2;";
      $res_wt = mysqli_query ($connect,$sql_wtitle );
      $rowWT = mysqli_fetch_assoc($res_wt);      
      $welcome_title = $rowWT["text"];

      $sql_aboutus_title = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=3;"; 
      $res_ati = mysqli_query ($connect, $sql_aboutus_title);
      $rowAbT = mysqli_fetch_assoc($res_ati);
      $aboutus_title = $rowAbT["text"];

      $sql_aboutus_text1 = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=4;"; 
      $res_at1 = mysqli_query ($connect, $sql_aboutus_text1);
      $rowAT1 = mysqli_fetch_assoc($res_at1);
      $aboutus_text1 = $rowAT1["text"];

      $sql_aboutus_text2 = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=5;"; 
      $res_at2 = mysqli_query ($connect, $sql_aboutus_text2);
      $rowAT2 = mysqli_fetch_assoc($res_at2);
      $aboutus_text2 = $rowAT2["text"];

      $sql_aboutus_text3 = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=6;"; 
      $res_at3 = mysqli_query ($connect, $sql_aboutus_text3);
      $rowAT3 = mysqli_fetch_assoc($res_at3);
      $aboutus_text3 = $rowAT3["text"];

      $sql_aboutus_text4 = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=7;"; 
      $res_at4 = mysqli_query ($connect, $sql_aboutus_text4);
      $rowAT4 = mysqli_fetch_assoc($res_at4);
      $aboutus_text4 = $rowAT4["text"];

      $sql_aboutus_danke = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=8;"; 
      $res_atD = mysqli_query ($connect, $sql_aboutus_danke);
      $rowATD = mysqli_fetch_assoc($res_atD);
      $aboutus_danke = $rowATD["text"];

      $sql_danke = "SELECT public_texte.textart, public_texte.text FROM public_texte where id=9;"; 
      $res_da = mysqli_query ($connect, $sql_danke);
      $rowDA = mysqli_fetch_assoc($res_da);
      $danke = $rowDA["text"];

?>

<!DOCTYPE html>
<html lang="de">
<head>
  
  <!-- Meta Tags -->
  <!-- <meta charset="utf-8"> -->
  <meta http-equiv="content-type" content="text/html; charset=utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS Files Links -->
  <link rel="stylesheet" href="components/css/bootstrap.css">
  <link rel="stylesheet" href="components/css/psvstyles.css"> 
 <link rel="stylesheet" href="components/js/bootstrap.js"> 

  <!-- Title -->
  <title>Restaurant WebSite</title>
</head>
<body class="body-index">

<!-- Hauptmenü -->
<nav class="navbar navbar-expand-lg bg-light sticky-top opacity-75">
  <div class="container-fluid">
    <a class="navbar-brand active" href="index.php"><img src="media/Logo/logo1.png" height="50"></a>
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
            <li><a class="dropdown-item" href="sommerkarte.php">Sommerkarte</a></li>
            <li><a class="dropdown-item" href="grillkarte.php">Grillkarte</a></li>
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
          <a class="nav-link" href="kontakt.php">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Hauptmenü Ende  -->


<div class="m-4 w-50 mx-auto opacity-75">
  <div class="card text-center">
    <div class="card-header ">
      <ul class="nav nav-tabs card-header-tabs " id="myTab">
          <li class="nav-item">
            <a href="#aktuelles" class="nav-link active" data-bs-toggle="tab">Restaurant Aktuell</a>
          </li>  
          <li class="nav-item">
            <a href="#aboutus" class="nav-link" data-bs-toggle="tab">About us</a>
          </li>
      </ul>
    </div>
    <div class="card-body ">
      <div class="tab-content">
        <div class="tab-pane fade show" id="aboutus">
            <h5 class="card-title"><?php echo $aboutus_title; ?></h5>
            <p class="card-text text-center">
                     <?php echo $aboutus_text1; ?>
            </p>
            <p class="card-text text-center">
                <?php 
                  echo $aboutus_text2;
                ?>
            </p>
            <p class="card-text text-center">
                <?php 
                  echo $aboutus_text3;
                ?>
            </p>
            <p class="card-text text-center">
                <?php 
                  echo $aboutus_text4;
                ?>                  
            </p>
            <p class="card-text text-center">
              <a class="danke">
                <?php 
                  echo $aboutus_danke;
                ?>
              </a>
            </p>
            
        </div>
        <div class="tab-pane fade active show" id="aktuelles">
        <h5 class="card-title"> <?php echo $welcome_title; ?></h5>
            <p class="card-text">
               <?php 
                  echo $welcome_text;
               ?>
                           <h5 class="card-title">Version 8.5.2023</h5>

            </p>
            <br>
            <a class="danke">
            <?php 
              echo $danke;
            ?>
            </a>
        </div>
      </div>
    </div>
  </div>
</div>







  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="components/js/bootstrap.js" crossorigin="anonymous"></script>
</body>
</html>