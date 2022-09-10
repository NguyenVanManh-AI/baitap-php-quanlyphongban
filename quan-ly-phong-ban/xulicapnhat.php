<?php

    // first 
    session_start();
    include_once("config.php");

    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) { 
        header('location: login.php');
        exit;
    }

    // second 
    if(isset($_POST['update'])){
        // $id = $_GET['id']; 
        $id = mysqli_real_escape_string($mysql_db, $_POST['id']);
        $Mota = mysqli_real_escape_string($mysql_db, $_POST['Mota']);
        $Tenpb = mysqli_real_escape_string($mysql_db, $_POST['Tenpb']);
        $result = mysqli_query($mysql_db, "UPDATE phongban SET Tenpb='$Tenpb',Mota='$Mota' WHERE IDPB='$id'");
    }
    header('location: capnhat.php');


?>