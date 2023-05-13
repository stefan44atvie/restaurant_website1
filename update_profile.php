<?php
session_start();


require "components/db_connect.php";
require_once "components/usermedia_file_upload.php";


$id = $_GET["id"];

$sql = "select * from users where user_id = $id";
$result = mysqli_query($connect, $sql);


//$row = mysqli_fetch_assoc($result); hut
if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $username = $data['username'];
    $email = $data['email'];
    $picture = $data['picture'];

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $picturearray = file_upload($_FILES['picture']);

        $picture = $picturearray->fileName;


        if ($picturearray->error === 0) {
            ($_POST['picture'] == "avatar.png") ?: unlink("./media/uploads/pictures/user/{$_POST['picture']}");
            $sqlupdate = "UPDATE `users` SET `username`='$username',`picture`='$picturearray->fileName', `email`='$email'  WHERE user_id = $id";
        } else {
            $sqlupdate = "UPDATE `users` SET `username`='$username',`email`='$email'  WHERE user_id = $id";
        }


        if (mysqli_query($connect, $sqlupdate)) {
            header("Location: userhome.php");
        } else {
            echo "something went wrong";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="components/css/psvstyles.css">
    <link rel="stylesheet" href="components/css/bootstrap.css">

    <title>PSV-Lounge</title>
</head>

<body class="body-index">
  <!-- Hauptmenü oben  -->
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
            <li><a class="dropdown-item" href="#">Sommerkarte</a></li>
            <li><a class="dropdown-item" href="#">Grillkarte</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="getraenke.php">Getränke</a>
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
          <a class="nav-link" href="galerie.php">Galerie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontakt.php">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Ende Hauptmenü  -->


  <div class="container">  
      <h1 class="text-center text-white"> Update the user</h1>
        <br>
        <div class="container w-50" class="form-group">
            <!-- action="actions/a_update.php" -->
            <form method="POST" enctype="multipart/form-data">
                <input type="text" placeholder="username" class="form-control" name="username" value="<?= $username ?>">
                <input type="text" placeholder="email" class="form-control" name="email" value="<?= $email ?>">
                <input type="file" placeholder="Bild (HTTP-LINK)" class="form-control" name="picture">
                <input type="submit" name="submit" value="Update Profile" class="btn btn-success">
            </form>
        </div>
  </div>
 
 <!-- Menü unten im Footer-Bereich -->
<div class="nav nav-pills flex-column  d-flex opacity_dark50 fixed-bottom">
        <ul class="nav nav-pills justify-content-end d-flex">
          <li class="nav-item">
            <a class="nav-link" aria-current="datenschutz.php" href="datenschutz.php">DatenXXschutz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="impressum.php">Impressum</a>
          </li>
      </ul>
</div>
<!-- Ende Footer-Menü -->>
<script src="components/js/bootstrap.js"></script>
</body>

</html>