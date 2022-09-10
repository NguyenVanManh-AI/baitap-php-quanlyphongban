<?php

    // first 
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

<!-- 

Phải cho thêm một input vào trong form là bởi vì . 
Lúc đầu chạy đoạn php thứ 2 GET được id : $id = $_GET['id']; 
còn lúc sau chạy đoạn thứ 1 => không GET được id nữa => nên để giải quyết vấn đề đó ta cho id vào form rồi POST đi cùng với các giá 
trị khác luôn . 


Nút reset => với các input bình thường là reset được . Với mấy input bootstrap thì không được 
nên mình có thể đổi qua loại khác . Nhưng cũng phải lo tìm hiểu cách reset cái input này 

CÁCH FIX BUG 
    + Sau khi thử các cách như bắt sự kiện onclick 
    + Search gg các kiểu thì không fix được 
    + Cái này mình tự nghĩ ra  

    => Không echo nữa => vì echo cho value thì nó không reset được 
    => Nếu bỏ echo đi thì reset thoải mái => vấn đề còn lại là khi vào form_capnhat.php => là nó phải load được giá trị lên cho 2 input 
    => Lấy giá trị php gán vào javascript => sau đó dùng javascript gán lên input . 

    <script type="text/javascript">
        var Tenpb = "<?php Print($Tenpb); ?>";
        var Mota = "<?php Print($Mota); ?>";
        document.getElementById("Mota").value = Mota;
        document.getElementById("Tenpb").value = Tenpb;
    </script>

    + Nói thêm : input chứa ID là cái luôn cần và không đổi và không được reset nên để echo php cho nó là hợp lí luôn . 


TÍNH NĂNG KHÁC 
    + Lúc trước để chung form_capnhap.php và xulicapnhap.php chung một chỗ nên khá dễ . 
    + Lưu các lỗi vào 2 biến lỗi => echo ra sẵn cho thẻ span => nếu lỗi thì nó hiện ra . 

    + Bây giờ tách ra => thì phần xủ lí thuộc file khác => acction một phát là đến file khác xử lí => 2 biến lưu lỗi nằm 
    ở file khác => truyền về mệt => xử lí mệt => nên xử lí tại file hiện tại này luôn 
    + Xử lí bằng front end js trước khi truyền đi 
        + bắt sự kiện click nút ok => nếu có input nào chưa nhập dừng sự kiện submit form lại sau đó 
            thêm hoặc xóa đi class d-none và d-block (của bootstrap)
        + và nếu cả 2 input đều nhập đủ => chuyển đến xulicapnhap.php => xong chuyển về thẳng capnhap.php  



///////////////

<section class="container wrapper" >
<h2 class="display-6 pt-3">Cập Nhật</h2>
<form action="form_capnhap.php" method="POST" style="width:50%;margin:auto">
    <label for="Tenpb">Tên phòng ban</label>
    <textarea class="form-control" name="Tenpb" id="Tenpb" rows="1" ><?php echo $Tenpb ?></textarea>
    <br>

    <label for="Mota">Mô tả phòng ban</label>
    <textarea class="form-control" name="Mota" id="Mota" rows="6" ><?php echo $Mota ?></textarea>

    <input type="hidden" name="id" value=<?php echo $id; ?> >


    <br>
    <input type="submit" name="update" class="btn btn-block btn-outline-primary" value="OK">
    <input type="reset" id="res" class="btn btn-block btn-outline-primary" value="RESET">
    
</form>
<script>
    var res = document.getElementById("res");
    var Tenpb = document.getElementById("Tenpb");
    var Mota = document.getElementById("Mota");
    res.onclick = function(){
        Tenpb.innerHTML = "";
        Mota.innerHTML = "";
    }
</script>
</section>


 -->