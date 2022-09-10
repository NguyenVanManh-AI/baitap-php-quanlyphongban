<?php 

    session_start();
    require_once "config.php";

    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) { 
        header('location: login.php');
        exit;
    }

    $sql = "SELECT IDNV,Hoten,Diachi FROM nhanvien";
    $result = $mysql_db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xóa Nhiều nhân viên</title>
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
            
            <h4 style="width:100%;text-align:center;color:#007bff">Xóa Nhiều Dữ Liệu Bảng Nhân Viên</h4>
            
            <form action='xulixoatatca.php' method='POST'>
                <table width='100%' class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã Nhân viên</th>
                            <th scope="col">Tên Nhân viên</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Chọn</th>
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
                                    echo "<td><input type='checkbox' name='checkedId[]' value='".$row['IDNV']."'></td>";
                                }
                            }
                            $mysql_db->close();
                        ?>
                    </tbody>
                </table>
                <br><hr>
                <button type='submit' class='btn btn-danger' style='float : right' ><i class='fa-solid fa-trash'></i> Xóa Các Nhân Viên</button>
            </form>
        </div>

    </div>
        <div style="width:20%;">
			<?php require_once "rightbar.php"; ?>
		</div>
	</div>
	
</body>
</html>