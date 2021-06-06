<?php
	include "stdlib.php";

	function show_user_info($user_id, $connect = null){
		if (!isset($connect))
			$connect = get_connect();

		$sql = "SELECT user_pw, birth, phone_number FROM CUSTOMER WHERE user_id = '$user_id'";
		$stid = oci_parse($connect, $sql);

		return query_with_disconnect($connect, $stid, $sql);
	}
?>
<style>
	table{
		text-align : center;
	}
	
</style>
<table border>
	<tr>
		<td>이름</td>
		<td width = "200">
			<?php
				$name = $_SESSION['name'];
				echo "$name";
			?>
		</td>
	</td>
	<tr>
		<td>ID</td>
		<td>
			<?php
				$user_id = $_SESSION['id'];
				echo "$user_id";
			?>
		</td>
	</tr>
	<tr>
		<td>P.W</td>
		<td>
			<?php
				$result=show_user_info($_SESSION['id']);
				echo "$result[0]";
			?>
		</td>
	</tr>
	<tr>
		<td>생년월일</td>
		<td>
			<?php
				echo "$result[1]";
			?>
		</td>
	</td>
	<tr>
		<td>휴대폰 번호</td>
		<td>
			<?php
				echo "$result[2]";
			?>
		</td>
	</tr>
</table>