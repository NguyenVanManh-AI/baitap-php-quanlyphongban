<?php
	session_start();

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: capnhat.php");
		exit;
	}
    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false && empty($_POST)) { 
        header('location: login.php');
        exit;
    }

	require_once "config.php";

    print_r($_POST);
	
	$username = $password = '';
	$username_err = $password_err = '';
  
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$username = trim($_POST['username']); 
		$password = trim($_POST['password']);

        $sql = 'SELECT username, password FROM admin WHERE username = ?';

		if ($stmt = $mysql_db->prepare($sql)) {

			$param_username = $username;
			$stmt->bind_param('s', $param_username);

			if ($stmt->execute()) {

			$stmt->store_result();

			if ($stmt->num_rows == 1) { 

				$stmt->bind_result($username, $hashed_password); 

				if ($stmt->fetch()) {

				if (password_verify($password, $hashed_password)) {

					session_start();
					$_SESSION['loggedin'] = true; 
					$_SESSION['username'] = $username; 
					header('location: capnhat.php'); 
				} 
                    header('location: login.php');
				}
			} 
                header('location: login.php');
			} 
            header('location: login.php');
			$stmt->close(); 
		}
		$mysql_db->close(); 
    }
?>