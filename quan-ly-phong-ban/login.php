<?php
	session_start();

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: capnhat.php");
		exit;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
		.wrapper{ 
		width: 500px; 
		padding: 20px; 
		}
		.wrapper h2 {text-align: center}
		.wrapper form .form-group span {color: red;}
	</style>
</head>
<body>
	<?php require_once "header.php"; ?>
	<div style="display:flex">
		<div style="width:20%">
			<?php require_once "sidebar.php"; ?>
		</div>
		<div style="width:60%;border:1px solid #b8daff;margin-left:10px;">

			<section class="container wrapper" >
				<h2 class="display-6 pt-3">Login</h2>
				<p class="text-center">Please fill this form to login.</p>
				<form action="xulilogin.php" method="POST" style="width:30%;margin:auto">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control">
					<br>

					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">

					<br>
					<input type="submit" class="btn btn-block btn-outline-primary" value="login">
				</form>
			</section>

		</div>

		<div style="width:20%;">
			<?php require_once "rightbar.php"; ?>
		</div>
	</div>
	
</body>
</html>