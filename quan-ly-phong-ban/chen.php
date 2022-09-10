<?php

    // first 
    session_start();
    include_once("config.php");
    
    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) { 
        header('location: login.php');
        exit;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Cập nhật</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
</head>
<body>
	<?php require_once "header.php"; ?>
	<div style="display:flex">
		<div style="width:20%">
			<?php require_once "sidebar.php"; ?>
		</div>
		<div style="width:60%;border:1px solid #b8daff;margin-left:10px;margin-right:10px">

            <section class="container wrapper" >
				<h2 class="display-6 pt-3">Chèn Thông tin Nhân Viên</h2>
				<form action="xulichen.php" method="POST" style="width:50%;margin:auto" >
					<label for="IDNV">Mã Nhân Viên</label>
					<input type="text" style="font-weight:bold" name="IDNV" id="IDNV" class="form-control" >
                    <span class="d-none" style="color:red" id="spIDNV">Mã Nhân Viên không được để trống</span> 

					<label for="Hoten">Họ Tên</label>
					<input type="text" style="font-weight:bold" name="Hoten" id="Hoten" class="form-control" >
                    <span class="d-none" style="color:red" id="spHoten">Họ Tên không được để trống</span>

                    <label for="IDPB">Mã Phòng Ban</label>
					<input type="text" style="font-weight:bold" name="IDPB" id="IDPB" class="form-control" >
                    <span class="d-none" style="color:red" id="spIDPB">Mã Phòng Ban không được để trống</span>

                    <label for="Diachi">Địa Chỉ</label>
					<input type="text" style="font-weight:bold" name="Diachi" id="Diachi" class="form-control" >
                    <span class="d-none" style="color:red" id="spDiachi">Mô tả không được để trống</span>

					<br>
					<input type="submit" id="ok" name="add_nv" class="btn btn-block btn-outline-primary" value="OK" >
					<input type="reset" name="reset" id="res" class="btn btn-block btn-outline-primary" value="RESET">
				</form>
			</section>

		</div>
        <div style="width:20%;">
			<?php require_once "rightbar.php"; ?>
		</div>
	</div>
	<script type="text/javascript">

        var IDNV = document.getElementById("IDNV");
        var Hoten = document.getElementById("Hoten");
        var IDPB = document.getElementById("IDPB");
        var Diachi = document.getElementById("Diachi");

        var spIDNV = document.getElementById("spIDNV");
        var spHoten = document.getElementById("spHoten");
        var spIDPB = document.getElementById("spIDPB");
        var spDiachi = document.getElementById("spDiachi");

        var ok = document.getElementById("ok");
        ok.addEventListener("click", function(event){
            if(IDNV.value == '' || Hoten.value == '' || IDPB.value == '' || Diachi.value == ''){
                event.preventDefault()
                if(IDNV.value == '') spIDNV.classList.add('d-block');
                else spIDNV.classList.remove('d-block');

                if(Hoten.value == '') spHoten.classList.add('d-block');
                else spHoten.classList.remove('d-block');

                if(IDPB.value == '') spIDPB.classList.add('d-block');
                else spIDPB.classList.remove('d-block');

                if(Diachi.value == '') spDiachi.classList.add('d-block');
                else spDiachi.classList.remove('d-block');
            }
        });
    </script>
</body>
</html>