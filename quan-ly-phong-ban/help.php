<?php 

    session_start();
    require_once "config.php";


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
            
            <div style="width:100%;height:100%;text-align:center;line-height:100%">
                <h1 style="font-size:60px;color:#007bff">HELP ¯\_(ツ)_/¯</h1>
            </div>    

        </div>

    </div>
        <div style="width:20%;">
			<?php require_once "rightbar.php"; ?>
		</div>
	</div>
	
</body>
</html>