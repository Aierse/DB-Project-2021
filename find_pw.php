<style>
	.find_pw{
		width: 300px;
		height: 200px;
		border: 1px groove black;
	}
</style>
<body>
	<?php
		include_once "stdlib.php";

		$phone_number = check_input($_POST['phonenumber']);
		$id = check_input($_POST['id']);

		$connect = get_connect();
		$sql = "SELECT user_pw FROM CUSTOMER WHERE user_id = '$id' AND phone_number = '$phone_number'";
		$stid = oci_parse($connect, $sql);
		
		$pw = query_with_disconnect($connect, $stid, $sql)[0];
	?>
	<div class = "find_pw">
		<?php
			if($pw == NULL){
			echo "입력하신 정보가 옳바르지 않습니다...";
		}
		else{
			
			echo "$id 님의 패스워드입니다. <br>";
			echo "PassWard: ".$pw;
		}
		?>
	</div
</body>
