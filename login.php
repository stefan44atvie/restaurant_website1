<?php
    session_start();
  
    if(isset($_SESSION["user"])){
      header("Location: userhome.php");
    }
    if(isset($_SESSION["superadmin"])){
      header("Location: dashboard.php");
    }

require_once "components/db_connect.php";

    function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

    if(isset($_POST["login"])){
        $error = false;

        $email = cleanInput($_POST["email"]);
        $password = cleanInput($_POST["password"]);
        
         // Validation of email
         if(empty($email)){
            $error = true;
            $emailError = "Plase enter email!";
         }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Enter vailid email";
         }
         if(empty($password)){
            $error = true;
            $passError = "Please enter password";
         }

         if(!$error){
            $password = hash("sha256", $password);

            $sql = "Select * from users where email = '$email' and password ='$password'";
            $result = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            if($count == 1){
                if($row["status"] =="superadmin"){
                  $_SESSION["superadmin"] = $row["user_id"];
                  $_SESSION["Name"] = $row["username"];
                  $_SESSION["userid"] = $row["user_id"];
                  header ("Location: dashboard.php"); 
                }else{
                  $_SESSION["user"] =$row["user_id"];
                  $_SESSION["name"] =$row["username"];
                  $_SESSION["userid"] = $row["user_id"];

                  // var_dump($row["user_id"]);
                  // die();
                  header ("Location: userhome.php");
                }

            }
         }
  
    }

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
 <link rel="stylesheet" href="components/js/bootstrap.js"> 

  <!-- Title -->
  <title>PSV-Lounge</title>
</head>
<body class="body-index">

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
          <a class="nav-link" href="kontakt.php">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Hauptmenü Ende  -->

<div class="m-5 w-50 mx-auto">
    <div class="card" style="width: 18rem;">
      <div class="card-header text-bg-info">
        Login-Bereich
      </div>
     <div class="container">
          <form class="w-100 mx-auto" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                  <?php
                      if (isset($errMSG)) {
                      echo $errMSG;
                      }
                  ?>
              <span class="text-danger"><?= $usernameError ?></span class="text-danger">
              <input type="email" placeholder="Bitte Ihre email-Adresse einfügen" class="form-control" name="email" value="<?= $email ?>">
              <span class="text-danger"><?= $emailError ?></span class="text-danger">
              <input type="password" placeholder="Bitte Passwort einfügen" class="form-control" name= "password">
              <span class="text-danger"><?= $passError ?></span class="text-danger">
              <input type="submit" class="form-control" name="login" value="Einloggen">
          </form>
    </div> 
  </div>
</div>




  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="components/js/bootstrap.js" crossorigin="anonymous"></script>
</body>
</html>