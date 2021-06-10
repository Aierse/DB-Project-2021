<!DOCTYPE html>
<html lang="kor">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>중복확인</title>
</head>
<body>
	<?php
		include_once "stdlib.php";

		$id = check_input($_GET['id']);

		$row = search_member($id);

		if($row == NULL)
			echo "사용할 수 있는 아이디입니다.";
		else 
			echo "중복된 아이디입니다.";
	?>
</body>
</html>