<!DOCTYPE html>
<html lang="kor">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>중복확인</title>
</head>
<style>
	#usable{
		color : blue;
	}
	#unusable{
		color : red;
	}
</style>
<body>
	<?php
		include_once "stdlib.php";

		$id = check_input($_GET['Is_id']);

		$row = search_member($id);

		if($row == NULL){
			echo "<div id = usable >";
			echo "사용할 수 있는 아이디입니다.";
			echo "</div>";
			echo "<script>";
			echo "opener.document.getElementById('submit').disabled=false;";
			echo "opener.document.getElementById('Is_id').disabled=true;";
			echo "opener.document.getElementById('real_id').value = opener.document.getElementById('Is_id').value;";
			echo "</script>";
		}
		else {
			echo "<div id = unusable>";
			echo "사용할 수 없는 아이디입니다.";
			echo "</div>";
		}
	?>
</body>
</html>