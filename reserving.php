<?php
	session_start();
	include_once "stdlib.php";

	$user_id = $_SESSION['id'];
	$screening_id = $_POST['screening'];

	for ($i = 0; $i < count($_POST['seat']); $i++) {
		$seat[$i] = explode('-', $_POST['seat'][$i]); // (row, col)
	}

	$connect = get_connect();
	$is_member = is_member();

	$phone_number = $is_member ? $_SESSION['phone_number'] : $_POST['firstnum'].$_POST['middlenum'].$_POST['lastnum'];

	for ($i = 0; $i < count($seat); $i++) {
		$col = $seat[$i][0];
		$row = $seat[$i][1];

		$sql = "SELECT COUNT(*) FROM Reserve WHERE reserve_col = '$col' AND reserve_row = '$row'";
		$stid = oci_parse($connect, $sql);

		oci_execute($stid, OCI_NO_AUTO_COMMIT);

		$success = oci_fetch_array($stid, OCI_NUM)[0];
		if ($success) { // 셀렉트 결과가 있으면 롤백
			oci_rollback($connect);
			break;
		}

		if ($is_member) {
			$sql = "INSERT INTO Reserve(reserve_id, user_id, reserve_phone_number, screening_id, reserve_col, reserve_row) 
			VALUES (RESERVE_SEQ.NEXTVAL, '$user_id', '$phone_number', '$screening_id', '$col', '$row')";
		}
		else {
			$sql = "INSERT INTO Reserve(reserve_id, user_id, reserve_phone_number, screening_id, reserve_col, reserve_row) 
			VALUES (RESERVE_SEQ.NEXTVAL, '', '$phone_number', '$screening_id', '$col', '$row')";
		}

		$stid = oci_parse($connect, $sql);
		if (!oci_execute($stid, OCI_NO_AUTO_COMMIT))
			oci_rollback($connect);

		if (!$is_member) {
			$sql = "SELECT reserve_id 
					FROM(
						SELECT reserve_id
						FROM RESERVE
						ORDER BY Reserve_id DESC
					)
					WHERE ROWNUM = 1";

			$stid = oci_parse($connect, $sql);
			oci_execute($stid, OCI_NO_AUTO_COMMIT);
			$result = oci_fetch_array($stid, OCI_NUM)[0];

			if (count($seat) - $i == 1)
				$reserve_list = $reserve_list.$result;
			else
				$reserve_list = $reserve_list.$result.", ";
		}
	}
	if (!$success) 
		oci_commit($connect);

	oci_free_statement($stid);
	oci_close($connect);

	if (!$success) {
		if ($is_member)
			echo "<script>alert('예약이 완료되었습니다.');</script>";
		else
			echo "<script>alert('예약이 완료되었습니다. 예약 번호는 $reserve_list 번입니다.');</script>";
	}
	else 
		echo "<script>alert('예약에 실패했습니다.');</script>";
?>
<meta http-equiv="refresh" content="0;url=index.php" />