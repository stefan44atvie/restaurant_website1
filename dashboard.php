<?php 
      require_once "components/db_connect.php";
      require_once "components/usermedia_file_upload.php";
      require_once 'components/createuser.php';
      require_once 'components/upload_pdf_wk.php';

      
      
        // wenn user oder adm bereits angemeldet sind, werden diese auf Unterseiten umgeleitet
      session_start();
      
      if (isset($_SESSION['user'])) {
        header("Location: userhome.php");
        exit;
      }
      if (!isset($_SESSION['superadmin']) && !isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
      }
      

      $userid = $_SESSION["userid"];
      
      $sql_userdetails = "SELECT * from users where user_id = $userid";

      $res = mysqli_query($connect, $sql_userdetails);
      $rowDet=mysqli_fetch_assoc($res);

      $sql_user="SELECT * from users";
      $result = mysqli_query ($connect, $sql_user);

      $layoutdetail = "";

      $layoutuser = "";

      if (mysqli_num_rows ($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $layoutuser .= "
            
             <tr>
              <td>
                  <a href='update_profile.php?id=$userid' class='btn btn-warning btn-sm' tabindex='-1' role='button' aria-disabled='true'>Update</a>
                  <a href='delete.php?id={$row["user_id"]}' class='btn btn-danger btn-sm' role='button' tabindex='-1'>Delete User</a>
                  </td>
              <td>
                  <img class='card-img-top ' height='100' src='media/uploads/pictures/user/" .$row['picture']."'  alt='AALT image cap'>
              </td>
              <td>{$row["username"]}</td>
              <td>{$row["email"]}</td>
              <td>{$row["status"]}</td>
            </tr>
              
               ";
        };
    }else{
        $layoutuser .= "no result";        
    };

  
    $layoutdetail .= "
          
          <tr>
            <td>
                <a href='update_profile.php?id=$userid' class='btn btn-warning btn-sm ' tabindex='-1' role='button' aria-disabled='true'>Update</a>

            </td>
          <td> 
              <img class='card-img-top ' src='media/uploads/pictures/user/" .$rowDet['picture']."'  alt='ULT image cap' height='50px'>
          </td>
          <td>{$rowDet["username"]}</td>
          <td>{$rowDet["email"]}</td>
          <td>{$rowDet["status"]}</td>

          </tr>
            
             ";
    
$username = "";
$email = "";
$password = "";

// Abschnitt Upload Wochenkarte
// ============================

if(isset($_POST["uploadW"])){
  $wochenkarte = cleanInput($_POST["wochenkarte"]);
 
  
  $error = false;

  // Validation of $username
  
  
  if(empty($wochenkarte)){
    $error = false;
    $wochenkarteError="huhuh";
    // $wochenkarteError ="Bitte Wochenkarte einfügen!";
  }elseif(strlen($wochenkarte) < 3){
    $error = true;
    $wochenkarteError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
  }elseif(!preg_match("/^[a-zA-Z]+$/", $wochenkarte)){
    $error = true;
    $wochenkarteError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
  }
  $wochenkarte = pdf_upload($_FILES["wochenkarte"]);

  if(!$error){
    $sql = "INSERT INTO wochenkarte(`wochenkarte`) VALUES ('$wochenkarte->fileName')";
    $res = mysqli_query($connect, $sql);

    if($res){
      // $sql = "INSERT INTO wochenkarte(`wochenkarte`) VALUES ('$wochenkarte->fileName')";
      // $res = mysqli_query($connect, $sql);
      $errType = "success";
      $trt=2;
      $errMsg = "Wochenkarte erfolgreich hochgeladen";
      // $username = "";
      // $email = "";
      $uploadError = ($wochenkarte >$error != 0 ) ? $wochenkarte->ErrorMessage : "";
    }else{
      $errType = "danger";
      $trt=3;
    $errMsg = "something went wrong, try again later!!";
    $uploadError = ($wochenkarte >$error != 0 ) ? $wochenkarte->ErrorMessage : ""; 
    }
  
}else{
  $errType="danger";
  $errMsg = "Fehler 1";
  $trt=4;
}
}

// Abschnitt Upload Wochenkarte ENDE 




// Abschnitt Upload Sommerkarte
// ============================

if(isset($_POST["uploadS"])){
  $sommerkarte = cleanInput($_POST["sommerkarte"]);
 
  
  $errorS = false;

  // Validation of $username
  
  
  if(empty($sommerkarte)){
    $errorS = false;
    $sommerkarteError="huhuh";
    // $wochenkarteError ="Bitte Wochenkarte einfügen!";
  }elseif(strlen($sommerkarte) < 3){
    $errorS = true;
    $sommerkarteError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
  }elseif(!preg_match("/^[a-zA-Z]+$/", $sommerkarte)){
    $errorS = true;
    $sommerkarteError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
  }
  $sommerkarte = sommer_upload($_FILES["sommerkarte"]);
  if(!$errorS){
    $sql = "INSERT INTO sommerkarte(`sommerkarte`) VALUES ('$sommerkarte->fileName')";
    $res = mysqli_query($connect, $sql);

    if($res){
      // $sql = "INSERT INTO wochenkarte(`wochenkarte`) VALUES ('$wochenkarte->fileName')";
      // $res = mysqli_query($connect, $sql);
      $errTypeS = "success";
      $trt=2;
      $errMsgS = "Sommerkarte erfolgreich hochgeladen";
      // $username = "";
      // $email = "";
      $uploadErrorS = ($sommerkarte >$errorS != 0 ) ? $sommerkarte->ErrorMessageS : "";
    }else{
      $errTypeS = "danger";
      $trt=3;
    $errMsgS = "something went wrong, try again later!!";
    $uploadErrorS = ($sommerkarte >$errorS != 0 ) ? $sommerkarte->ErrorMessageS : ""; 
    }
  
}else{
  $errTypeS="danger";
  $errMsgS = "Fehler 1";
  $trt=4;
}
}

// Abschnitt Upload Sommerkarte ENDE 


// Abschnitt Upload Grillkarte
// ============================

if(isset($_POST["uploadG"])){
  $grillkarte = cleanInput($_POST["grillkarte"]);
 
  
  $errorG = false;

  // Validation of $username
  
  
  if(empty($grillkarte)){
    $errorG = false;
    $grillkarteError="huhuh";
    // $wochenkarteError ="Bitte Wochenkarte einfügen!";
  }elseif(strlen($grillkarte) < 3){
    $errorG = true;
    $grillkarteError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
  }elseif(!preg_match("/^[a-zA-Z]+$/", $grillkarte)){
    $errorG = true;
    $grillkarteError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
  }
  $grillkarte = grill_upload($_FILES["grillkarte"]);
  if(!$errorG){
    $sql = "INSERT INTO grillkarte(`grillkarte`) VALUES ('$grillkarte->fileName')";
    $res = mysqli_query($connect, $sql);

    if($res){
      // $sql = "INSERT INTO wochenkarte(`wochenkarte`) VALUES ('$wochenkarte->fileName')";
      // $res = mysqli_query($connect, $sql);
      $errTypeG = "success";
      $trt=2;
      $errMsgG = "Grillkarte erfolgreich hochgeladen";
      // $username = "";
      // $email = "";
      $uploadErrorG = ($grillkarte >$errorG != 0 ) ? $grillkarte->ErrorMessageG : "";
    }else{
      $errTypeG = "danger";
      $trt=3;
    $errMsgG = "something went wrong, try again later!!";
    $uploadErrorG = ($grillkarte >$errorG != 0 ) ? $grillkarte->ErrorMessageG : ""; 
    }
  
}else{
  $errTypeG="danger";
  $errMsgG = "Fehler 1";
  $trt=4;
}
}

// Abschnitt Upload Grillkarte ENDE 


// Abschnitt Upload Speisekarte
// ============================

if(isset($_POST["uploadK"])){
  $speisekarte = cleanInput($_POST["speisekarte"]);
 
  
  $errorK = false;

  // Validation of $username
  
  
  if(empty($speisekarte)){
    $errorK = false;
    $speisekarteError="huhuh";
    // $wochenkarteError ="Bitte Wochenkarte einfügen!";
  }elseif(strlen($speisekarte) < 3){
    $errorG = true;
    $speisekarteError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
  }elseif(!preg_match("/^[a-zA-Z]+$/", $speisekarte)){
    $errorK = true;
    $speisekarteError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
  }
  $speisekarte = speise_upload($_FILES["speisekarte"]);
  if(!$errorK){
    $sql = "INSERT INTO speisekarte(`speisekarte`) VALUES ('$speisekarte->fileName')";
    $res = mysqli_query($connect, $sql);

    if($res){
      // $sql = "INSERT INTO wochenkarte(`wochenkarte`) VALUES ('$wochenkarte->fileName')";
      // $res = mysqli_query($connect, $sql);
      $errTypeK = "success";
      $trt=2;
      $errMsgK = "Speisekarte erfolgreich hochgeladen";
      // $username = "";
      // $email = "";
      $uploadErrorK = ($speisekarte >$errorK != 0 ) ? $speisekarte->ErrorMessageK : "";
    }else{
      $errTypeK = "danger";
      $trt=3;
    $errMsgK = "something went wrong, try again later!!";
    $uploadErrorK = ($speisekarte >$errorK != 0 ) ? $speisekarte->ErrorMessageK : ""; 
    }
  
}else{
  $errTypeK="danger";
  $errMsgK = "Fehler 1";
  $trt=4;
}
}

// Abschnitt Upload Speisekarte ENDE 

//Anzeige aller Texte (public Texte)
$sql_texte="SELECT * FROM public_texte";
$result_texte = mysqli_query ($connect, $sql_texte);
$layout ="";
if (mysqli_num_rows ($result_texte) > 0){
  while($row = mysqli_fetch_assoc($result_texte)){
      $layout .= "
      
              <tr>
              <td><a class='btn btn-info' href='details_text.php?id={$row["id"]}'>Details</a></td>
              <td><a class='table_textttile'>{$row["textart"]}</a></td>
              <td><a class='table_text'>{$row["text"]}</a></td>

             
          </tr>  
          ";
  };
 
}else{
  $layout .= "no result";        
};
//Ende public Texte

//Anzeige aller Texte (Dashboard Texte)
$sql_dashtexte="SELECT * FROM dashboard_texte";
$result_dashtexte = mysqli_query ($connect, $sql_dashtexte);
$layoutDASH ="";
if (mysqli_num_rows ($result_dashtexte) > 0){
  while($rowD = mysqli_fetch_assoc($result_dashtexte)){
      $layoutDASH .= "
      
              <tr>
              <td><a class='btn btn-info' href='details_text.php?id={$rowD["id"]}'>Details</a></td>
              <td><a class='table_textttile'>{$rowD["textart"]}</a></td>
              <td><a class='table_text'>{$rowD["text"]}</a></td>

             
          </tr>  
          ";
  };
 
}else{
  $layoutDASH .= "no result";        
};
//Ende public Texte

// Abfrage der einzelnen Dashboard-Textbausteine

$sql_wDashboard="SELECT * FROM dashboard_texte where textart='Dashboard Welcome';";
$res_wD = mysqli_query ($connect, $sql_wDashboard);
$rowD=mysqli_fetch_assoc($res_wD);
$welcome_dashboard = $rowD["text"];

$sql_Dprofile="SELECT * FROM dashboard_texte where textart='Dashboard Your Profile';";
$res_DY = mysqli_query ($connect, $sql_Dprofile);
$rowDY=mysqli_fetch_assoc($res_DY);
$welcome_profile = $rowDY["text"];

$sql_allUsT="SELECT * FROM dashboard_texte where textart='Dashboard Alle User Titel';";
$res_AUT = mysqli_query ($connect, $sql_allUsT);
$rowAUT=mysqli_fetch_assoc($res_AUT);
$allUser_titel = $rowAUT["text"];

$sql_allUsTex="SELECT * FROM dashboard_texte where textart='Dashboard Alle User Text';";
$res_AUTe = mysqli_query ($connect, $sql_allUsTex);
$rowAUTe=mysqli_fetch_assoc($res_AUTe);
$allUser_text = $rowAUTe["text"];

$sql_newUserT="SELECT * FROM dashboard_texte where textart='Dashboard Neuer User Titel';";
$res_newUT = mysqli_query ($connect, $sql_newUserT);
$rownUT=mysqli_fetch_assoc($res_newUT);
$newUser_title = $rownUT["text"];

$sql_newUserTex="SELECT * FROM dashboard_texte where textart='Dashboard Neuer User Text';";
$res_newUTex = mysqli_query ($connect, $sql_newUserTex);
$rownUTex=mysqli_fetch_assoc($res_newUTex);
$newUser_text = $rownUTex["text"];

$sql_textPTi="SELECT * FROM dashboard_texte where textart='Dashboard Texte public Titel';";
$res_textPTi = mysqli_query ($connect, $sql_textPTi);
$rowtextPTi=mysqli_fetch_assoc($res_textPTi);
$public_title = $rowtextPTi["text"];

$sql_textPTex="SELECT * FROM dashboard_texte where textart='Dashboard public Texte Text';";
$res_textPTex = mysqli_query ($connect, $sql_textPTex);
$rowtextPTex = mysqli_fetch_assoc($res_textPTex);
$public_text = $rowtextPTex["text"];

$sql_textDT="SELECT * FROM dashboard_texte where textart='Dashboard Texte Dashboard Titel';";
$res_textDT = mysqli_query ($connect, $sql_textDT);
$row_textDT = mysqli_fetch_assoc($res_textDT);
$dashboard_title = $row_textDT["text"];

$sql_textDTex="SELECT * FROM dashboard_texte where textart='Dashboard Texte Dashboard Text';";
$res_textDTex = mysqli_query ($connect, $sql_textDTex);
$row_textDTex = mysqli_fetch_assoc($res_textDTex);
$dashboard_text = $row_textDTex["text"];

$sql_speiseT="SELECT * FROM dashboard_texte where textart='Dashboard Speisekarte Titel';";
$res_speiseT = mysqli_query ($connect, $sql_speiseT);
$row_speiseT = mysqli_fetch_assoc($res_speiseT);
$speise_titel = $row_speiseT["text"];

$sql_speiseTex="SELECT * FROM dashboard_texte where textart='Dashboard Speisekarte Text';";
$res_speiseTex = mysqli_query ($connect, $sql_speiseTex);
$row_speiseTex = mysqli_fetch_assoc($res_speiseTex);
$speise_text = $row_speiseTex["text"];

$sql_wocheT="SELECT * FROM dashboard_texte where textart='Dashboard Wochenkarte Titel';";
$res_wocheT = mysqli_query ($connect, $sql_wocheT);
$row_wocheT = mysqli_fetch_assoc($res_wocheT);
$woche_title = $row_wocheT["text"];

$sql_wocheTex="SELECT * FROM dashboard_texte where textart='Dashboard Wochenkarte Text';";
$res_wocheTex = mysqli_query ($connect, $sql_wocheTex);
$row_wocheTex = mysqli_fetch_assoc($res_wocheTex);
$woche_text = $row_wocheTex["text"];

$sql_sommerT="SELECT * FROM dashboard_texte where textart='Dashboard Sommerkarte Titel';";
$res_sommerT = mysqli_query ($connect, $sql_sommerT);
$row_sommerT = mysqli_fetch_assoc($res_sommerT);
$sommer_title = $row_sommerT["text"];

$sql_sommerTex="SELECT * FROM dashboard_texte where textart='Dashboard Sommerkarte Text';";
$res_sommerTex = mysqli_query ($connect, $sql_sommerTex);
$row_sommerTex = mysqli_fetch_assoc($res_sommerTex);
$sommer_text = $row_sommerTex["text"];

$sql_grillT="SELECT * FROM dashboard_texte where textart='Dashboard Grillkarte Titel';";
$res_grillT = mysqli_query ($connect, $sql_grillT);
$row_grillT = mysqli_fetch_assoc($res_grillT);
$grill_titel = $row_grillT["text"];

$sql_grillTex="SELECT * FROM dashboard_texte where textart='Dashboard Grillkarte Text';";
$res_grillTex = mysqli_query ($connect, $sql_grillTex);
$row_grillTex = mysqli_fetch_assoc($res_grillTex);
$grill_text = $row_grillTex["text"];

$sql_logoutT="SELECT * FROM dashboard_texte where textart='Dashboard Logout Titel';";
$res_logoutT = mysqli_query ($connect, $sql_logoutT);
$row_logoutT = mysqli_fetch_assoc($res_logoutT);
$logout_titel = $row_logoutT["text"];

$sql_logoutTex="SELECT * FROM dashboard_texte where textart='Dashboard Logout Text';";
$res_logoutTex = mysqli_query ($connect, $sql_logoutTex);
$row_logoutTex = mysqli_fetch_assoc($res_logoutTex);
$logout_text = $row_logoutTex["text"];

$sql_danke="SELECT * FROM dashboard_texte where textart='Dashboard Danke';";
$res_danke = mysqli_query ($connect, $sql_danke);
$row_danke = mysqli_fetch_assoc($res_danke);
$danke = $row_danke["text"];

?>

<!DOCTYPE html>
<html lang="de">
<head>
 
  <!-- Meta Tags -->
  <meta http-equiv="content-type" content="text/html; charset=utf-8">

  <!-- <meta charset="UTF-8"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
  <!-- CSS Files Links -->
  <link rel="stylesheet" href="components/css/psvstyles.css">
  <link rel="stylesheet" href="components/css/bootstrap.css">

  <!-- Title -->
  <title>Restaurant</title>

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
<!-- Hauptmenü Ende  -->
 
<!-- Hier die Box für die Registrierung -->

<div class="container w-75 mtop10 text-bg-info"> 
    <div class="card text-center">
      <div class="card-header ">
        <a class="dashboard_title"> PSV-Lounge </a>
      </div>
      <div class="card-body">
        <p class="card-text"> <?php echo $welcome_dashboard ?> </p> 
        <?php
            $status = $_SESSION['status'];
            $name = $_SESSION['name'];

            // echo "Hallo ".$status." und ".$name;
            
        ?>
        </p>
            

<!-- TEST  -->
<div class="m-4 w-100 mx-auto opacity-75 ">
  <div class="card text-center">
    <div class="card-header ">
      <ul class="nav nav-tabs card-header-tabs " id="myTab">
          <li class="nav-item">
            <a href="#profile" class="nav-link active" data-bs-toggle="tab">Ihr Profil</a>
          </li>
          <li class="nav-item">
            <a href="#dbuser" class="nav-link" data-bs-toggle="tab">Alle User</a>
          </li>
          <li class="nav-item">
            <a href="#user" class="nav-link" data-bs-toggle="tab">Neue User</a>
          </li>  
          <li class="nav-item">
            <a href="#textepublic" class="nav-link" data-bs-toggle="tab">Texte public</a>
          </li>
          <li class="nav-item">
            <a href="#textedashboard" class="nav-link" data-bs-toggle="tab">Texte Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="#galerie1" class="nav-link" data-bs-toggle="tab">Galerie 1</a>
          </li>
          <li class="nav-item">
            <a href="#speisekarte" class="nav-link" data-bs-toggle="tab">Speisekarte</a>
          </li>
          <li class="nav-item">
            <a href="#wochenkarte" class="nav-link" data-bs-toggle="tab">Wochenkarte</a>
          </li>
          <li class="nav-item">
            <a href="#sommerkarte" class="nav-link" data-bs-toggle="tab">Sommerkarte</a>
          </li>
          <li class="nav-item">
            <a href="#grillkarte" class="nav-link" data-bs-toggle="tab">Grillkarte</a>
          </li>
          <li class="nav-item">
            <a href="#logout" class="nav-link" data-bs-toggle="tab">Logout</a>
          </li>
      </ul>
    </div>
    <div class="card-body ">
      <div class="tab-content">
        <div class="tab-pane fade show" id="user">
            <h5 class="card-title"> <?php echo $newUser_title ?></h5>
            <p class="card-text text-center">
              <p class="card-text text-center">
                <?php echo $newUser_text ?>
              </p>
                  <!-- Warnmeldungen Anfang -->
                    <?php
                        if(isset($errMsg)){
                        ?>
                          <div class = "alert alert-<?= $errType ?>" role="alert">
                            <?= $errMsg ?> 
                            <?= $uploadError ?> 

                          </div> 
                          
                          <?php 
                        }
                    ?>
                <!-- Warnmeldungen Ende  -->          
            
            <!-- Start Formular Eingabemaske  -->
            <div class="container col-10 col-md-8 col-lg-6 w-100">
              <form class="w-100" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                      <input type="text" placeholder="Bitte den gewünschten Usernamen einfügen" class="form-control" name="username" value="<?= $username ?>">
                      <span class="text-danger"><?= $usernameError ?></span class="text-danger">
                      <input type="email" placeholder="Bitte Ihre email-Adresse einfügen" class="form-control" name="email" value="<?= $email ?>">
                      <span class="text-danger"><?= $emailError ?></span class="text-danger">
                      <input type="file" placeholder="Bitte Bild einfügen" class="form-control" name= "picture">
                      <!-- <span class="text-danger"><?= $picError ?></span class="text-danger"> -->

                      <input type="password" placeholder="Bitte Passwort einfügen" class="form-control" name= "password">
                      <span class="text-danger"><?= $passError ?></span class="text-danger">
                      <input type="submit" class="form-control text-bg-success" name="register" value="Register">
                </form>
            </div>
            <!-- Ende Formular  -->    
            
        </div>
        <div class="tab-pane fade show active" id="profile">
          <h5 class="card-title"> Mein Profil</h5>
            <p class="card-text text-center">
                Hallo <?php echo $rowDet["username"]; ?>. <?php echo $welcome_profile ?>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Details</th>
                      <th scope="col">Bild</th>
                      <th scope="col">Username</th>
                      <th scope="col">email</th>
                      <th scope="col">Rolle</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                      echo $layoutdetail;
                   ?>
                    
                  </tbody>
                </table>
                <a class="danke"><?php echo $danke ?></a>
            </p>
        </div>
        <div class="tab-pane fade show" id="dbuser">
          <h5 class="card-title"> <?php echo $allUser_titel ?></h5>
            <p class="card-text">
                  <?php echo $allUser_text ?>
               <br>
               <br>

               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Details</th>
                      <th scope="col">Bild</th>
                      <th scope="col">Username</th>
                      <th scope="col">email</th>
                      <th scope="col">Rolle</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                      echo $layoutuser;
                   ?>
                    
                  </tbody>
                </table>

                <a class="danke"><?php echo $danke ?></a>
            </p>
        </div>
        <div class="tab-pane fade show" id="textepublic">
        <h5 class="card-title"> <?php echo $public_title ?></h5>
            <p class="card-text">
              <?php echo $public_text ?>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Details</th>
                      <th scope="col">Textart</th>
                      <th scope="col">Text</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                      echo $layout;
                   ?>
                    
                  </tbody>
                </table>
                <hr>
                <a class="danke"><?php echo $danke ?></a>
            </p>
        </div>
        <!-- TEXTE DASHBOARD  -->
        <div class="tab-pane fade show" id="textedashboard">
        <h5 class="card-title"> <?php echo $dashboard_title ?></h5>
            <p class="card-text">
                <?php echo $dashboard_text ?>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Details</th>
                      <th scope="col">Textart</th>
                      <th scope="col">Text</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                      echo $layoutDASH;
                   ?>
                    
                  </tbody>
                </table>
                <hr>
                    <a class="danke"><?php echo $danke ?></a>
              </p>
        </div>
        <div class="tab-pane fade show" id="speisekarte">
        <h5 class="card-title"> <?php echo $speise_titel ?></h5>
            <p class="card-text">
                <?php echo $speise_text ?>
            </p>
            <!-- Anfang  -->
            <div class="container">
            <?php
              if(isset($errMsgK)){
              ?>
                <div class = "alert alert-<?= $errTypeK ?>" role="alert">
                  <?= $errMsgK ?> 
                  <?= $uploadErrorK ?> 

                </div> 
                
                <?php 
              }
            ?>
                <form class="w-100" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                      <input type="file" placeholder="Bitte Speisekarte einfügen" class="form-control" name= "speisekarte">
                      <input type="submit" class="form-control" name="uploadK" value="upload Speisekarte">
                      <span class="text-danger"><?= $speisekarteError ?></span class="text-danger">
                </form>
        </div> 


                <!-- Ende  -->
        </div>
        <div class="tab-pane fade show" id="wochenkarte">
        <h5 class="card-title"> <?php echo $woche_title ?></h5>
            <p class="card-text">
                <?php echo $woche_text ?>
                <!-- Anfang  -->
                <div class="container">
            <?php
              if(isset($errMsg)){
              ?>
                <div class = "alert alert-<?= $errType ?>" role="alert">
                  <?= $errMsg ?> 
                  <?= $uploadError ?> 

                </div> 
                
                <?php 
              }
            ?>
                <form class="w-100" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                      <input type="file" placeholder="Bitte Wochenkarte einfügen" class="form-control" name= "wochenkarte">
                      <input type="submit" class="form-control" name="uploadW" value="upload Wochenkarte">
                      <span class="text-danger"><?= $wochenkarteError ?></span class="text-danger">
                </form>
        </div> 


                <!-- Ende  -->
            </p>
        </div>
        <div class="tab-pane fade show" id="sommerkarte">
        <h5 class="card-title"> <?php echo $sommer_title ?></h5>
            <p class="card-text">
                <?php echo $sommer_text ?>
                <div class="container">
            <?php
              if(isset($errMsgS)){
              ?>
                <div class = "alert alert-<?= $errTypeS ?>" role="alert">
                  <?= $errMsgS ?> 
                  <?= $uploadErrorS ?> 

                </div> 
                
                <?php 
              }
            ?>
                <form class="w-100" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                      <input type="file" placeholder="Bitte Sommerkarte einfügen" class="form-control" name= "sommerkarte">
                      <input type="submit" class="form-control" name="uploadS" value="upload Sommerkarte">
                      <span class="text-danger"><?= $sommerkarteError ?></span class="text-danger">
                </form>
        </div> 

            </p>
        </div>
        <div class="tab-pane fade show" id="grillkarte">
        <h5 class="card-title"> <?php echo $grill_titel ?></h5>
            <p class="card-text">
                <?php echo $grill_text ?>
            </p>
             <!-- Anfang  -->
             <div class="container">
            <?php
              if(isset($errMsgG)){
              ?>
                <div class = "alert alert-<?= $errTypeG ?>" role="alert">
                  <?= $errMsgG ?> 
                  <?= $uploadErrorG ?> 

                </div> 
                
                <?php 
              }
            ?>
                <form class="w-100" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                      <input type="file" placeholder="Bitte Grillkarte einfügen" class="form-control" name= "grillkarte">
                      <input type="submit" class="form-control" name="uploadG" value="upload Grillkarte">
                      <span class="text-danger"><?= $grillkarteError ?></span class="text-danger">
                </form>
        </div> 


                <!-- Ende  -->
        </div>
        <div class="tab-pane fade show" id="logout">
        <h5 class="card-title"> <?php echo $logout_titel ?></h5>
            <p class="card-text">
                Hallo <?php echo $_SESSION["Name"]  ?>,
                <p class="card-text"><?php echo $logout_text ?></p>
                <a href='logout.php?logout' class='btn btn-warning'>Logout</a>

            </p>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Menü unten im Footer-Bereich -->
<div class="nav nav-pills flex-column  d-flex opacity_dark50 fixed-bottom">
        <ul class="nav nav-pills justify-content-end d-flex">
          <li class="nav-item">
            <a class="nav-link" aria-current="datenschutz.php" href="datenschutz.php">Datenschutz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Impressum.php">Impressum</a>
          </li>
      </ul>
</div>
<!-- Ende Footer-Menü -->



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="components/js/bootstrap.js" crossorigin="anonymous"></script>
</body>
</html>