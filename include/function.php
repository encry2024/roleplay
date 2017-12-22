<?php
	
	function getDevice() 
	{
		$con=mysqli_connect("localhost","root","","fingerprint");
		$sql 	= 'SELECT * FROM demo_device ORDER BY device_name ASC';
		$result	= mysqli_query($con, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {
			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);
			$i++;
		}

		return $arr;
	}
	
	function getDeviceAcSn($vc) 
	{
		$con=mysqli_connect("localhost","root","","fingerprint");
		$sql 	= "SELECT * FROM demo_device WHERE vc ='".$vc."'";
		$result	= mysqli_query($con, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysql_fetch_array($result)) {
			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'				=> $row['sn'],
				'vc'				=> $row['vc'],
				'ac'				=> $row['ac'],
				'vkey'			=> $row['vkey']
			);
			$i++;
		}

		return $arr;
	}
	
	function getDeviceBySn($sn) 
	{
		$con=mysqli_connect("localhost","root","","fingerprint");
		$sql 	= "SELECT * FROM demo_device WHERE sn ='".$sn."'";
		$result	= mysqli_query($con, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {
			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);
			$i++;
		}

		return $arr;
	}

	function getUser()
	{
		$con=mysqli_connect("localhost","root","","payroll");
		$sql 	= 'SELECT * FROM employees ORDER BY employee_no ASC';
		$result	= mysqli_query($con, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {
			$arr[$i] = array(
				'user_id'	=> $row['id'],
				'employee_no' => $row['employee_no'],
				'user_name'	=> $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']
			);
			$i++;
		}

		return $arr;
	}

	function deviceCheckSn($sn) 
	{
		$con=mysqli_connect("localhost","root","","fingerprint");
		$sql 	= "SELECT count(sn) as ct FROM demo_device WHERE sn = '".$sn."'";
		$result	= mysqli_query($con, $sql);
		$data 	= mysqli_fetch_array($result);

		if ($data['ct'] != '0' && $data['ct'] != '') {
			return "sn already exist!";
		} else {
			return 1;
		}
	}

	function checkUserName($user_name) 
	{
		$con=mysqli_connect("localhost","root","","fingerprint");
		$sql	= "SELECT user_name FROM demo_user WHERE user_name = '".$user_name."'";
		$result	= mysqli_query($con, $sql);
		$row	= mysqli_num_rows($result);

		if ($row>0) {
			return "Username exist!";
		} else {
			return "1";
		}
	}

	function getUserFinger($user_id) 
	{
		$con=mysqli_connect("localhost","root","","fingerprint");
		$sql 	= "SELECT * FROM demo_finger WHERE user_id= '".$user_id."' ";
		$result = mysqli_query($con, $sql);
		$arr 	= array();
		$i	= 0;

		while($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'user_id'	=>$row['user_id'],
				"finger_id"	=>$row['finger_id'],
				"finger_data"	=>$row['finger_data']
				);
			$i++;

		}

		return $arr;
	}
	
	function getLog() 
	{
		$con=mysqli_connect("localhost","root","","fingerprint");
		$sql 	= 'SELECT * FROM demo_log ORDER BY log_time DESC';
		$result	= mysqli_query($con, $sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'log_time'		=> $row['log_time'],
				'user_name'		=> $row['user_name'],
				'data'			=> $row['data']
			);

			$i++;

		}

		return $arr;
	}

	function createLog($user_name, $time, $sn) 
	{
		$con=mysqli_connect("localhost","root","","fingerprint");
		$sq1  = "INSERT INTO demo_log SET user_name='".$user_name."', data='".date('Y-m-d H:i:s', strtotime($time))." (PC Time) | ".$sn." (SN)"."' ";
		$result1	= mysqli_query($con, $sq1);
		if ($result1) {
			return 1; "Error insert log data!";
		} else {
			return "Error insert log data!";
		}
	}
?>