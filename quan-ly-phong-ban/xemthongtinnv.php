<?php 

    session_start();
    require_once "config.php";

    $disp = 'none';
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		$disp = 'block';
	}
	else $disp = "none";

    $sql = "SELECT IDNV,Hoten,Diachi,IDPB FROM nhanvien";
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
            
            <div style="display:<?php echo $disp?>">
                <button style="float : left;" class="btn btn-success" ><a href="chen.php"><i class="fa-solid fa-plus"></i> Chèn Nhân Viên</a></button>
                <br><hr>
            </div>
            <h4 style="width:100%;text-align:center;color:#007bff">Dữ Liệu Bảng Nhân Viên</h4>
            <table width='100%' class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mã Nhân viên</th>
                        <th scope="col">Tên Nhân viên</th>
                        <th scope="col">Mã Phòng Phòng Ban</th>
                        <th scope="col">Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td scope='row'>".$row['IDNV']."</td>";
                                echo "<td>".$row['Hoten']."</td>";
                                echo "<td>".$row['IDPB']."</td>";
                                echo "<td>".$row['Diachi']."</td>";	
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