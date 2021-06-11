<?php
	session_start();
	include_once "stdlib.php";
	
	$connect = get_connect();

	$user_id = $_SESSION['id'];
	$screening_id = $_POST['screening'];

	for ($i = 0; $i < count($_POST['seat']); $i++) {
		$seat[$i] = explode('-', $_POST['seat']); // (row, col)
	}

	if (is_member()) {
		$phone_number = $_SESSION['phone_number'];
		
		for ($i = 0; $i < count($seat); $i++) {
			$col = $seat[$i][1];
			$row = $seat[$i][0];
			$sql = "INSERT INTO Reserve(reserve_id, user_id, reserve_phone_number, screening_id, reserve_col, reserve_row) 
			VALUES (RESERVE_SEQ.NEXTVAL, '$user_id', '$phone_number', '$screening_id', '$col', '$row')";
			$stid = oci_parse($connect, $sql);
			oci_execute($stid);
		}
	}

	else {
		$phone_number = $_POST['firstnum'].$_POST['middlenum'].$_POST['lastnum'];

		for ($i = 0; $i < count($seat); $i++) {
			$col = $seat[$i][1];
			$row = $seat[$i][0];
			$sql = "INSERT INTO Reserve(reserve_id, user_id, reserve_phone_number, screening_id, reserve_col, reserve_row) 
			VALUES (RESERVE_SEQ.NEXTVAL, 'NULL', '$phone_number', '$screening_id', '$col', '$row')";
			$stid = oci_parse($connect, $sql);
			oci_execute($stid);
		}
	}
?>