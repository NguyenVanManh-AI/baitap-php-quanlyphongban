<?php

    session_start();
    include("config.php");
    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) { 
        header('location: login.php');
        exit;
    }
    foreach ($_POST['checkedId'] as $id_nv){
        $result = mysqli_query($mysql_db, "DELETE FROM nhanvien WHERE IDNV='$id_nv'");
    }

    header("Location:xoatatca.php");

?>