<?php 
      require_once "db_connect.php";
      require_once "upload_pdf_wk.php";

      // wenn user oder adm bereits angemeldet sind, werden diese auf Unterseiten umgeleitet
    //   session_start();

      $sql="SELECT standardtexte.stext, text_art.textart FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where art_id=7";
      $result = mysqli_query ($connect, $sql);

      $row=mysqli_fetch_assoc($result);
      $admin_updateWoche = $row["stext"];
    

      function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

      $wochenkarteError = "";

      if(isset($_POST["register"])){
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
        
        
        
        $wochenkarte = file_upload($_FILES["wochenkarte"]);

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
      
?>