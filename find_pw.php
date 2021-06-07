<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=980" />
	<title>pw 찾기</title>
	<style>
	</style>
</head>
<body>
	<?php
		include "stdlib.php";

		$phone_number = check_input($_POST['phonenumber']);
		$id = check_input($_POST['id']);

		$connect = get_connect();
		$sql = "SELECT user_pw FROM CUSTOMER WHERE user_id = '$id' AND phone_number = '$phone_number'";
		$stid = oci_parse($connect, $sql);
		

		echo "$id 님의 패스워드입니다. <br>";

		$pw = query_with_disconnect($connect, $stid, $sql)[0];

		echo "$pw";
	?>
</body>
</html>