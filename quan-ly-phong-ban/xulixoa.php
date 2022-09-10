<?php

    include("config.php");
    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) { 
        header('location: login.php');
        exit;
    }
    $id = $_GET['id'];

    $result = mysqli_query($mysql_db, "DELETE FROM nhanvien WHERE IDNV='$id'");

    header("Location:xoa_nv.php");

?>

