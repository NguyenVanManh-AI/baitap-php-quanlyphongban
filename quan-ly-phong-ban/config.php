<?php
	// Database credentials
	define('DB_SERVER', 'localhost'); // địa chỉ 
	define('DB_USERNAME', 'root'); // tên người ngườidungf 
	define('DB_PASSWORD', ''); // passw 
	define('DB_NAME', 'DULIEU'); //  file database đã được cấu hình trong file config.php 

	// Attempt to connect to MySQL database
	$mysql_db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	///// phần này để vào luôn file config cho khỏe . tại vì hầu như file nào cũng có dùng file config 
	// và lặp lại đoạn code này cho nhiều file => không thông minh 
	// chỉ cần code vào config là được 
	// if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) { 
    //     header('location: login.php');
    //     exit;
    // }
	////// Nhưng cũng nên code qua file riêng nếu không vào file xulilogin sẽ có vấn đề vì 
    // if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false && empty($_POST)) { có thêm : empty($_POST)

	if (!$mysql_db) {
		die("Error: Unable to connect " . $mysql_db->connect_error);
	}