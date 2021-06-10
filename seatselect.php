<?php
	include "stdlib.php";
	$connect = get_connect();
	$screening_id = $_POST['screening'];
	$sql = "SELECT reserve_col, reserve_row FROM Reserve WHERE screening_id = '$screening_id'";
	$stid = oci_parse($connect, $sql);
	oci_execute($stid);

	while (($row = oci_fetch_array($stid, OCI_NUM)) != false) {
		$reserved[$row[0]][$row[1]] = true;
	}
?>

<style>
	* {
		font-family : "맑은 고딕";
		margin : 0px;
		margin-bottom : 19.016px;
		padding : 19.016px;
		text-align : center;
		background-color : #fdfcf0;
		border-top : 
	}

	html {
		padding-top : 0px;
	}

	body {
		padding-top : 0px;
	}

	form {
		margin : 0;
		padding : 0;
	}

	.seat {
		border : 1px solid gray;
		margin : 3px;
		display : inline-block;
		padding : 3px;
		width : 60px;
		height : 60px;
		line-height : 60px;
		font-size : 20px;
	}

	div > input {
		display : none;
	}

	input[type="checkbox"]:disabled + label {
		background-color : gray;
	}

	input[type="checkbox"]:checked + label {
		transition-duration : 0.5s;
		color : white;
		background-color : #e71a0f;
	}

	.transport {
		outline : none;
		border : 0;
	}
</style>
<script>
	function goSubmit() {
	window.opener.name = "parentPage"; // 부모창의 이름 설정
	document.myForm.target = "parentPage"; // 타켓을 부모창으로 설정
	document.myForm.action = "reserving.php";
	document.myForm.submit();
	self.close();
}
</script>
<html lang = "ko">
	<head>
		<meta charset="UTF-8">
		<title>좌석 선택</title>
	</head>
	<body>
		<h1 style = 'border-bottom : 1px solid gray; margin-bottom : 0px;'>좌석 선택</h1>
		<form name = 'myForm' action = 'reserving.php' method = "POST">
			<div class = 'seat_area'>
				<?php
					
					echo "<input type = hidden value = $screening_id>";

					for ($i = 1; $i <= 5; $i++) {
						for($j = 1; $j <= 10; $j++) {
							$value = $j."-".$i;
							if ($reserved[$j][$i])
								echo "<input id = '$value' type='checkbox' name='seat' value='$value' disabled = 'disabled'>";
							else
								echo "<input id = '$value' type='checkbox' name='seat' value='$value'>";
							echo "<label id= 'label$value' class = 'seat' for = '$value'>$i - $j</label>";
						}
					}
				?>
			</div>
			<div>
				<input type = 'button' class = 'transport' value = "선택 완료" onclick="goSubmit()">
			</div>
		</form>
	</body>
</html>