<?php

    $dbuser="dbuser174414";
    $dbpass="ce174414";
    $dbsid = "( DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP) (HOST = localhost) (PORT = 1521) ) ) 
                          (CONNECT_DATA = (SERVER = DEDICATED) (SERVICE_NAME = orcl) ) ) ";

    $conn = oci_connect($dbuser,$dbpass,$dbsid);
	
	$sql = "INSERT INTO CUSTOMER(customer_id,user_id,user_pw,birth,name,phone_number)
				VALUES(CUSTOMER_SEQ.NEXTVAL,:user_id,:user_pw,:birth,:name,:phone_number)";
	
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
		
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
	
    echo $birth ;
    echo $phone_number;

	$result = (oci_execute($stid) ) ? 'Succes' : 'Fail';
	echo $result;
	
	oci_commit($conn);
	oci_free_statement($stid);
	oci_close($conn);
?>