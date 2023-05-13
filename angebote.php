<?php 
    require_once "components/db_connect.php";


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
          <a class="nav-link " href="galerie.php">Galerie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="kontakt.php">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Hauptmenü Ende  -->

<div class="container">
    <div class="m-4 w-75 mx-auto">
      <div class="card text-center">
        <div class="card-header ">
          <ul class="nav nav-tabs card-header-tabs" id="myTab">
              <li class="nav-item">
                <a href="#kinderspiele" class="nav-link active" data-bs-toggle="tab">Spielplatz für Kinder</a>
              </li>  
              <li class="nav-item">
                <a href="#strandspiele" class="nav-link" data-bs-toggle="tab">Strandspiele</a>
              </li>
              <li class="nav-item">
                <a href="#supbase" class="nav-link" data-bs-toggle="tab">StandUp-Paddling</a>
              </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active fade show" id="kinderspiele">
                <h5 class="card-title text-start"> <?php echo $kontakt_titel; ?></h5>
                
                <!--SLIDESHow START -->
                <div id="carouselSpiele" class="carousel slide">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselSpiele" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselSpiele" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselSpiele" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="media/background/pic1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="media/background/pic2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="media/background/pic3.jpg" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselSpiele" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselSpiele" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>

<!-- SlideShow ENDE -->
                <p class="card-text text-start">
                    Spielen findet statt
                   
            </div>
            <div class="tab-pane active fade" id="strandspiele">
                <h5 class="card-title text-start"> <?php echo $open_title ?></h5>
                
                  <!--SLIDESHow START -->
                  <div id="carouselExampleFade" class="carousel slide carousel-fade">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="media/background/pic5.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="media/background/pic6.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="media/background/pic7.jpg" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                  </div>

                  <!-- SlideShow ENDE -->




                <p class="card-text text-start">Spaß und Spiele direkt am Strand </p>
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
            <div class="tab-pane fade" id="supbase">

            <!--SLIDESHow START  (SUPBASE)-->
                  <div id="carouselExampleCaptions" class="carousel slide">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="media/background/pic1.jpg" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p> -->
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="media/background/pic2.jpg" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                           <!-- <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p> -->
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img src="media/background/pic3.jpg" class="d-block w-100" alt="...">
                          <div class="carousel-caption d-none d-md-block">
                            <!-- <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p> -->
                          </div>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
              </div>

                              <!-- SlideShow ENDE -->

                <p class="card-text mt-1">
                    Kommen Sie doch zu unserem Stand direkt am Wasser
                </p>
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