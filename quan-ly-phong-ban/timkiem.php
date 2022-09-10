<?php 

    session_start();
    require_once "config.php";

    $disp = 'none';
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		$disp = 'block';
	}
	else $disp = "none";

    $text = '';
    if(isset($_POST['search'])) $text = $_POST['text_search'];
    else $text = '';

    $sql = "SELECT nv.IDNV, nv.Hoten, nv.Diachi, nv.IDPB, pb.Tenpb, pb.Mota FROM `nhanvien` as nv 
            LEFT JOIN phongban as pb ON nv.IDPB = pb.IDPB 
            WHERE nv.IDNV like '%$text%' OR nv.Hoten like '%$text%' OR nv.IDPB like '%$text%' 
            OR nv.Diachi like '%$text%' OR pb.Tenpb like '%$text%' OR pb.Mota like '%$text%' ";
    $result = $mysql_db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cập nhật</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
    <style>
        button > a {
            color:white;
        }
        button > a:hover {
            color:white;
        }
        #tal {
            height: 450px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
    </style>
</head>
<body>
	<?php require_once "header.php"; ?>
	<div style="display:flex">
		<div style="width:20%">
			<?php require_once "sidebar.php"; ?>
		</div>
		<div style="width:60%;border:1px solid #b8daff;margin-left:10px">

        <div style="padding:20px" id="tal">
            
            <h4 style="width:100%;text-align:center;color:#007bff">Tìm kiếm</h4>

            <form action='timkiem.php' method='POST' style="display:flex">
                <input type="text" name="text_search" class="form-control" aria-describedby="emailHelp" placeholder="Enter Text Search" 
                    value="<?php echo $text?>">
                <button type="submit" name="search" class="btn btn-primary" style="margin-left:10px">Submit</button>
            </form>

            <br><hr>

            <table width='100%' class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã Nhân viên</th>
                        <th scope="col">Tên Nhân viên</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Mã Phòng Phòng Ban</th>
                        <th scope="col">Tên Phòng Ban</th>
                        <th scope="col">Mô tả Phòng Ban</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td scope='row'>".$row['IDNV']."</td>";
                                echo "<td>".$row['Hoten']."</td>";
                                echo "<td>".$row['Diachi']."</td>";	
                                echo "<td>".$row['IDPB']."</td>";
                                echo "<td>".$row['Tenpb']."</td>";
                                echo "<td>".$row['Mota']."</td>";
                            }
                        }

                        $mysql_db->close();
                    ?>
                </tbody>
            </table>
        </div>

    </div>
        <div style="width:20%;">
			<?php require_once "rightbar.php"; ?>
		</div>
	</div>
	
</body>
</html>