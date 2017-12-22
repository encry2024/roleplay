<?php
	
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
	
	include 'include/global.php';
	include 'include/function.php';

	$user_id 	= $_GET['user_id'];

	/**
	* SecurityKey 		== ?
	* $time_limit_reg - variable from global.php
	* $base_path 		- variable from global.php
	* 
	* Get process_register.php page
	* Get getac.php page
	*/

	echo "$user_id;SecurityKey;".$time_limit_reg.";".$base_path."process_register.php;".$base_path."getac.php";
	
}

?>