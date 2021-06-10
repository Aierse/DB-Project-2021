<?php
	session_start();
	include "stdlib.php";

	$type = $_POST['tab'];

	if ($type == "member") {
		$id = check_input($_POST['member_id']);
		$pw = check_input($_POST['member_pw']);

		$row = login($id, $pw);

		if ($row != NULL) {
			$_SESSION['id'] = $row[0];
			$_SESSION['name'] = $row[1];
		}
		else {
			echo "<script>alert('로그인 실패');</script>";
		}
	}
	else {
		$non_id = check_input($_POST['non_member_id']);
		$non_phone_number = check_input($_POST['non_member_phone_number']);


		$row = login_non_member($non_id, $non_phone_number);

		if ($row != NULL) {
			$_SESSION['id'] = $row[0];
			$_SESSION['name'] = "예약 번호 ".$row[0];
		}
		else {
			echo "<script>alert('로그인 실패');</script>";
		}
	}
?>
<meta http-equiv="refresh" content="0;url=index.php" />