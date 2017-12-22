<?php
	/*ini_set("display_errors", 0);
	error_reporting(0);*/

	$base_path		= "http://192.168.254.114/bulalohan_payroll/biometric/";
	$db_name		= "bulalohan_payroll";
	$db_user		= "root";
	$db_pass		= "linux1978";
	$db_host		= "127.0.0.1";
	$time_limit_reg = "15";
	$time_limit_ver = "10";

	$conn = mysqli_connect($db_host, $db_user, $db_pass);
	if (!$conn) die("Connection for user $db_user refused!");
	mysqli_select_db($conn, $db_name) or die("Can not connect to database!");
?>