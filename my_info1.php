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
	#info {
		margin-top : 125px;
		margin-left : 350px;
	}

	#info > table {
		text-align : center;
		margin-top : 19.016px;
		font-size : 35px;
	}

	td:nth-child(2n+1) {
		background-color : #E71A0F;
		color : white;
	}

</style>
<div id = "info">
	<table border ="1">
		<tr height = "75">
			<td width = "200" >이름</td>
			<td width = "400">
				<?php
					$name = $_SESSION['name'];
					echo "$name";
				?>
			</td>
		</td>
		<tr height = "75">
			<td>ID</td>
			<td>
				<?php
					$user_id = $_SESSION['id'];
					echo "$user_id";
				?>
			</td>
		</tr>
		<tr height = "75">
			<td>P.W</td>
			<td>
				<?php
					$result=show_user_info($_SESSION['id']);
					echo "$result[0]";
				?>
			</td>
		</tr>
		<tr height = "75">
			<td>생년월일</td>
			<td>
				<?php
					echo substr($result[1], 0, 4)."년".substr($result[1], 4, 2)."월".substr($result[1], 6, 2)."일";
				?>
			</td>
		</td>
		<tr height = "75">
			<td>휴대폰 번호</td>
			<td>
				<?php
					echo substr($result[2], 0, 3)."-".substr($result[2], 3,4)."-".substr($result[2], 7,4);
				?>
			</td>
		</tr>
	</table>
</div>