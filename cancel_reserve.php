<?php
	include_once "stdlib.php";

	$reserve_id = check_input($_POST["reserve_id"]);
	
	$conn = get_connect();
	$sql = "DELETE FROM RESERVE
			WHERE
			reserve_id = '$reserve_id'";

	$stid = oci_parse($conn,$sql);
	oci_execute($stid);

	oci_free_statement($stid);
	oci_close($conn);
	echo "<script>alert('예매 취소가 완료 되었습니다.');</script>";

	if (!is_member()) {
		session_destroy();
		echo "<script>location.href = 'index.php';</script>";
	}
?>
<meta http-equiv="refresh" content="0;url=check_reserve_page.php" />