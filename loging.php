<?php
	session_start();
	include "stdlib.php";

	$type = $_POST['tab'];

	if ($type = "member") {
		$id = check_input($_POST['member_id']);
		$pw = check_input($_POST['member_pw']);

		$row = login($id, $pw);

		if ($row != NULL) {
			$_SESSION['id'] = $row[0];
			$_SESSION['name'] = $row[1];

			echo "<script>location.href='index.php'</script>";
		}
		else {
			echo "<script>location.href='index.php'</script>";
			echo "<script>alert('로그인 실패');</script>";
		}
	}
	else {
		$non_id = check_input($_POST['non_member_id']);
		$non_pw = check_input($_POST['non_member_phone_number']);
	}
?>