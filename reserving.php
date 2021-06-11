<?php
	session_start();
	include_once "stdlib.php";

	$user_id = $_SESSION['id'];
	$screening_id = $_POST['screening'];

	
	for ($i = 0; $i < count($_POST['seat']); $i++) {
		$seat[$i] = explode('-', $_POST['seat'][$i]); // (row, col)
	}

	$connect = get_connect();

	if (is_member()) {
		$phone_number = $_SESSION['phone_number'];

		for ($i = 0; $i < count($seat); $i++) {
			$col = $seat[$i][0];
			$row = $seat[$i][1];
			
			$sql = "INSERT INTO Reserve(reserve_id, user_id, reserve_phone_number, screening_id, reserve_col, reserve_row) 
			VALUES (RESERVE_SEQ.NEXTVAL, '$user_id', '$phone_number', '$screening_id', '$col', '$row')";
			$stid = oci_parse($connect, $sql);
			oci_execute($stid);
		}
	}

	else {
		$phone_number = $_POST['firstnum'].$_POST['middlenum'].$_POST['lastnum'];
		$reserve_list = "";
		for ($i = 0; $i < count($seat); $i++) {
			$col = $seat[$i][0];
			$row = $seat[$i][1];

			
			$sql = "INSERT INTO Reserve(reserve_id, user_id, reserve_phone_number, screening_id, reserve_col, reserve_row) 
			VALUES (RESERVE_SEQ.NEXTVAL, '', '$phone_number', '$screening_id', '$col', '$row')";
			$stid = oci_parse($connect, $sql);
			oci_execute($stid);

			$sql = "SELECT reserve_id 
					FROM(
						SELECT *
						FROM RESERVE
						ORDER BY Reserve_id DESC
					)
					WHERE ROWNUM = 1";

			$stid = oci_parse($connect, $sql);
			oci_execute($stid);
			$result = oci_fetch_array($stid, OCI_NUM)[0];

			if (count($seat) - $i == 1)
				$reserve_list = $reserve_list.$result;
			else
				$reserve_list = $reserve_list.$result.", ";
		}
	}

	oci_free_statement($stid);
	oci_close($connect);

	if (is_member())
		echo "<script>alert('예약이 완료되었습니다.');</script>";
	else
		echo "<script>alert('예약이 완료되었습니다. 예약 번호는 $reserve_list 번입니다.');</script>";
?>
<meta http-equiv="refresh" content="0;url=index.php" />