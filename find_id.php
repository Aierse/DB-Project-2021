<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>ID 찾기</title>
	<style>
	</style>
</head>
<body>
	<?php
		include "stdlib.php";

		$phone_number = check_input($_POST['phonenumber']);

		$result = search_member_id($phone_number);
		$count = count($result);

		echo "$count";
		echo "회원님이 생성하신 계정입니다.";
	?>
</body>
</html>



