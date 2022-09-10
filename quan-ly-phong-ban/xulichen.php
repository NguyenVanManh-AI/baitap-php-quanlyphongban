<?php

    session_start();
    include_once("config.php");

    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) { 
        header('location: login.php');
        exit;
    }

    if(isset($_POST['add_nv'])){
        $IDNV = mysqli_real_escape_string($mysql_db, $_POST['IDNV']);
        $Hoten = mysqli_real_escape_string($mysql_db, $_POST['Hoten']);
        $IDPB = mysqli_real_escape_string($mysql_db, $_POST['IDPB']);
        $Diachi = mysqli_real_escape_string($mysql_db, $_POST['Diachi']);
        $result = mysqli_query($mysql_db, "INSERT nhanvien SET IDNV='$IDNV',Hoten='$Hoten',IDPB='$IDPB',Diachi='$Diachi'");
    }
    header('location: xemthongtinnv.php');


?>