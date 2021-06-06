<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=980" />
	<title>ID 찾기</title>
	<style>
	</style>
</head>
<body>
	<?php
		include "stdlib.php";

		$phone_number = check_input($_POST['phonenumber']);
		
		$connect = get_connect();

		$sql = "SELECT user_id FROM Customer WHERE phone_number = '$phone_number'";
		$stid = oci_parse($connect, $sql);

		oci_execute($stid);

		

		$i = 0;
		while($row = oci_fetch_array($stid,OCI_NUM)) {
				$id_list[$i] = $row[0];
				$i += 1;
			}

			echo "회원님의 ID 입니다. <br>";

		foreach($id_list as $id){
				echo "ID : ".$id."<br>";
		}
		

		oci_free_statement($stid);
		oci_close($connect);
	?>
</body>
</html>



