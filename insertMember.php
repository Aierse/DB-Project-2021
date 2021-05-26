<?php
	include "stdlib.php";

	$conn = get_connect();
	
	$sql = "INSERT INTO CUSTOMER(customer_id,user_id,user_pw,birth,name,phone_number)
				VALUES(CUSTOMER_SEQ.NEXTVAL,:user_id,:user_pw,:birth,:name,:phone_number)";
		
	$stid = oci_parse($conn,$sql);
	
	$user_id = check_input($_POST['id']);
	$user_pw = check_input($_POST['pw']);
	
	$year = check_input($_POST['year']);
	$month = check_input($_POST['month']);
	$day = check_input($_POST['day']);
	
	$name = check_input($_POST['name']);
	
	$firstNum = check_input($_POST['firstNum']);
	$middleNum = check_input($_POST['middleNum']);
	$lastNum = check_input($_POST['lastNum']);
	
	$birth = (string)$year."-".$month."-".$day;
	$phone_number = (string)$firstNum.$middleNum.$lastNum;
	
	oci_bind_by_name($stid, ":user_id", $user_id);
	oci_bind_by_name($stid, ":user_pw", $user_pw);
	oci_bind_by_name($stid, ":birth", $birth);
	oci_bind_by_name($stid, ":name", $name);
	oci_bind_by_name($stid, ":phone_number", $phone_number);

	$result = query_with_disconnect($conn, $stid, $sql) ? '성공' : '실패';
	echo $result;
	
	oci_commit($conn);
	oci_free_statement($stid);
	oci_close($conn);
?>