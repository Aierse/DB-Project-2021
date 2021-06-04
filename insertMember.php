<?php
	include "stdlib.php";

	function num2date($num){
		return $num<10 ? "0".$num : (string)$num;
	}

	$conn = get_connect();
	
	$sql = "INSERT INTO CUSTOMER(user_id,user_pw,birth,name,phone_number)
				VALUES(:user_id,:user_pw,:birth,:name,:phone_number)";
		
	$stid = oci_parse($conn,$sql);
	
	$user_id = check_input($_POST['id']);
	$user_pw = check_input($_POST['pw']);
	
	$year = check_input($_POST['year']);
	$month = num2date(check_input($_POST['month']));
	$day = num2date(check_input($_POST['day']));
	
	$name = check_input($_POST['name']);
	
	$firstNum = check_input($_POST['firstNum']);
	$middleNum = check_input($_POST['middleNum']);
	$lastNum = check_input($_POST['lastNum']);
	

	$birth = (string)$year.$month.$day;
	$phone_number = (string)$firstNum.$middleNum.$lastNum;
	
	oci_bind_by_name($stid, ":user_id", $user_id);
	oci_bind_by_name($stid, ":user_pw", $user_pw);
	oci_bind_by_name($stid, ":birth", $birth);
	oci_bind_by_name($stid, ":name", $name);
	oci_bind_by_name($stid, ":phone_number", $phone_number);

	$result = query_with_disconnect($conn, $stid, $sql);
	
	if ($result) {
		echo "<script>alert('성공');</script>";
	}
	else {
		echo "<script>alert('실패');</script>";
	}
?>
<meta http-equiv="refresh" content="0;url=index.php" />