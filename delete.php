<?php
session_start();

if(!isset($_SESSION["superadmin"])){
    header("Location: login.php");
 }

    require_once "components/db_connect.php";
    $id = $_GET["id"];
    
    $sql = "DELETE FROM `users` WHERE user_id=$id";
    
    if(mysqli_query($connect, $sql)){
            header("Location: dashboard.php");
        }
    

?>