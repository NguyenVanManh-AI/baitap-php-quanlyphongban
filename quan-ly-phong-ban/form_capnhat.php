<?php

    session_start();
    include_once("config.php");
    
    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) { 
        header('location: login.php');
        exit;
    }

    if(!empty($_GET['id'])){
        $id = $_GET['id']; 
        $result = mysqli_query($mysql_db, "SELECT Tenpb,Mota FROM phongban WHERE IDPB='$id'");

        while($res = mysqli_fetch_array($result))
        {
            $Tenpb = $res['Tenpb'];
            $Mota = $res['Mota'];
        }
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
				<h2 class="display-6 pt-3">Cập Nhật</h2>
				<form action="xulicapnhat.php" method="POST" style="width:50%;margin:auto" >
					<label for="Tenpb">Tên phòng ban</label>
					<input type="text" style="font-weight:bold" name="Tenpb" id="Tenpb" class="form-control" >
                    <span class="d-none" style="color:red" id="spten">Tên Phòng ban không được để trống</span><br>

					<label for="Mota">Mô tả phòng ban</label>
					<input type="text" style="font-weight:bold" name="Mota" id="Mota" class="form-control" >
                    <span class="d-none" style="color:red" id="spmt">Mô tả không được để trống</span>

                    <input type="hidden" name="id" value=<?php echo $id; ?> >

					<br>
					<input type="submit" id="ok" name="update" class="btn btn-block btn-outline-primary" value="OK" >
					<input type="reset" name="reset" id="res" class="btn btn-block btn-outline-primary" value="RESET">
				</form>
			</section>

		</div>
        <div style="width:20%;">
			<?php require_once "rightbar.php"; ?>
		</div>
	</div>
	<script type="text/javascript">
        var Tenpb = "<?php Print($Tenpb); ?>";
        var Mota = "<?php Print($Mota); ?>";

        var mt = document.getElementById("Mota");
        var ten = document.getElementById("Tenpb");
        var spten = document.getElementById("spten");
        var spmt = document.getElementById("spmt");

        mt.value = Mota;
        ten.value = Tenpb;

        var ok = document.getElementById("ok");
        ok.addEventListener("click", function(event){
            if(mt.value == '' || ten.value == ''){
                event.preventDefault()
                if(mt.value == '') spmt.classList.add('d-block');
                else spmt.classList.remove('d-block');

                if(ten.value == '') spten.classList.add('d-block');
                else spten.classList.remove('d-block');
            }
        });
    </script>
</body>
</html>
