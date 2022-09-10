
<?php
	$disp = 'none';
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		$disp = 'block';
	}
	else $disp = "none";

?>

<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
	*{
		list-style: none;
		text-decoration: none;
	}
	li{
		font-size:14px;
		font-weight: bold;
	}
</style>
<div>
	<ul>
		<li class="alert alert-primary" role="alert" style="margin:3px"><a href="login.php"><i class="fa-solid fa-house-user"></i> Trang chủ</a></li>
		<li class="alert alert-primary" role="alert" style="margin:3px;"><a href="xemthongtinnv.php"><i class="fa-solid fa-users"></i> Xem nhân viên</a></li>
		<li class="alert alert-primary" role="alert" style="margin:3px;"><a href="xemphongban.php"><i class="fa-sharp fa-solid fa-bars"></i> Xem Phòng ban</a></li>
		<li class="alert alert-primary" role="alert" style="margin:3px;"><a href="timkiem.php"><i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm</a></li>
		<li class="alert alert-primary" role="alert" style="margin:3px;display:<?php echo $disp?>"><a href="capnhat.php"><i class="fa-solid fa-pen-to-square"></i> Cập nhật thông tin</a></li>
		<li class="alert alert-primary" role="alert" style="margin:3px;display:<?php echo $disp?>"><a href="xoa_nv.php"><i class="fa-solid fa-trash-can"></i> Xóa thông tin</a></li>
		<li class="alert alert-primary" role="alert" style="margin:3px;display:<?php echo $disp?>"><a href="xoatatca.php"><i class="fa-solid fa-trash"></i> Xóa tất cả</a></li>
		<li class="alert alert-primary" role="alert" style="margin:3px"><a href="help.php"><i class="fa-solid fa-circle-info"></i> Trợ giúp chương trình</a></li>
		<li class="alert alert-danger" role="alert" style="margin:3px;display:<?php echo $disp?>" ><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
	</ul>
</div>
</html>