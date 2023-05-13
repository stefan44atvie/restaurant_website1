<?php
// $sql="SELECT standardtexte.stext, text_art.textart FROM standardtexte INNER JOIN text_art ON standardtexte.fk_textart = text_art.art_id where art_id=8";
      // $result = mysqli_query ($connect, $sql);

      // $row=mysqli_fetch_assoc($result);
      // $admin_textarea = $row["stext"];
      
     $username = "";
      function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

      $usernameError = $emailError = $passError = $username = $email = $password = "";
      if(isset($_POST["register"])){
        $username = cleanInput($_POST["username"]);
        $password = cleanInput($_POST["password"]);
        $email = cleanInput($_POST["email"]);
        $pic=$_POST["picture"];
        
        $error = false;

        // Validation of $username
        if(empty($username)){
          $error = true;
          $usernameError ="Bitte Usernamen einfügen!";
        }elseif(strlen($username) < 3){
          $error = true;
          $usernameError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
        }elseif(!preg_match("/^[a-zA-Z]+$/", $username)){
          $error = true;
          $usernameError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
        }
       
        
        // Validation of email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $error = true;
          $emailError = "Bitte eine korrekte email eingeben!";
        }else{
          $sql = "Select email from users where email = '$email'";
          $result = mysqli_query($connect, $sql);
          if(mysqli_num_rows($result) != 0){
            $error = true;
            $emailError = "Diese email ist bereits in unserem System!";
          }
        }
        if(empty($password)){
          $error = true;
          $passError = "Bitte Passwort eingeben!";
        }elseif(strlen($password) < 6){
          $error = true;
          $passError = "Passwort muss aus mindestens 6 Zeichen bestehen";
        }

        $password = hash("sha256", $password);

        $picture = file_upload($_FILES["picture"]);

        if(!$error){
          $sql = "INSERT INTO `users`(`username`, `password`, `email`, `picture`) 
          VALUES ('$username','$password','$email','$picture->fileName') ";
          $res = mysqli_query($connect, $sql);
          header("Location: dashboard.php");
          if($res){
            $errType = "success";
            $errMsg = "Erfolgreich registriert!! Sie können sich nun einloggen";
            $username = "";
            $email = "";
            $uploadError = ($picture >$error != 0 ) ? $picture->ErrorMessage : "";
          }else{
            $errType = "danger";
          $errMsg = "something went wrong, try again later!!";
          $uploadError = ($picture >$error != 0 ) ? $picture->ErrorMessage : ""; 
          }
        
      }
    }




?>