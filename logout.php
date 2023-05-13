<?php
    session_start();

    if(!isset($_SESSION["user"]) && !isset($_SESSION["superadmin"])){
        header("Location: index.php");
        exit;
    }
    if(isset($_GET["logout"])){
        unset($_SESSION["user"]);
        unset($_SESSION["superadmin"]);
        unset($_SESSION["name"]);

        session_unset();
        session_destroy();
        header("Location: index.php");
        exit;
    }
?>