<?php
$con = mysqli_connect('localhost', 'root', '');
	if (!$con) {
        $con=$conn;
		die("database connection failed" . mysqli_error($conn));
	}

$select_db = mysqli_select_db($con, 'php_crud_app');
	if (!$select_db) {
		die("database selected failed" . mysqli_error($con));
	}

?>