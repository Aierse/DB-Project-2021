<?php
	session_start();
	include_once "stdlib.php";
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
		padding : 0px 19.016px;
		margin-bottom : 0px;
	}

	body {
		padding : 0px 19.016px;
		margin-bottom : 0px;
	}

	form {
		margin : 0;
		padding : 0;
	}

	.seat_area {
		-webkit-user-select : none;
		margin : 19.016px 0;
		margin-top : 0;
		padding : 19.016px 0;
		border-top : 1px solid gray;
		border-bottom : 1px solid gray;
	}

	.seat_area > input {
		display : none;
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
		cursor : pointer;
	}

	input[type="checkbox"]:disabled + label {
		cursor : default;
		background-color : gray;
	}

	input[type="checkbox"]:checked + label {
		transition-duration : 0.5s;
		color : white;
		background-color : #e71a0f;
	}


	.selecting {
		display : inline-block;
		margin : 0;
		padding : 0;
	}

	.selecting > div {
		margin : 0;
		margin-right : 160px;
		padding : 0;
		display :inline-block;
		float : left;

	}

	.phone {
		text-align : center;
		margin : 0;
		padding : 0;
		width : 90px;
		height : 50px;
	}

	.transport {
		display :inline-block;
		outline : none;
		padding : 0;
		width : 272px;
		height : 50px;

		background-color : #e71a0f;
		margin-top : 4.5px;
		color : white;
		font-size : 25px;
		font-weight : 500;
		margin : 0;
		border : 0;
		cursor : pointer;
	}
</style>
<script>
	function check() {
		<?php
			if (!is_member()) {
			echo "if(!document.myForm.firstnum.value || !document.myForm.middlenum.value || !document.myForm.lastnum.value){";
			echo "alert('휴대폰번호를 입력하세요.');";
			echo "return false;";
			echo "}";
			}
		?>
		
		var chkbox = document.getElementsByName('seat');
		for(var i = 0 ; i < chkbox.length ; i++) {
			if(chkbox[i].checked) {
				return true;
			}
		}

		alert("좌석을 선택하세요.");
		return false;
	}

	function goSubmit() {
		if (!check())
			return;

		window.opener.name = "parentPage"; // 부모창의 이름 설정
		document.myForm.target = "parentPage"; // 타켓을 부모창으로 설정
		document.myForm.action = "reserving.php";
		document.myForm.submit();
		self.close();
	}

	function checkNumber(event){
		if(event.key === '.' || event.key === '-' || event.key >= 0 && event.key <= 9){
			return true;
		}
		return false;
	}

	
</script>
<html lang = "ko">
	<head>
		<meta charset="UTF-8">
		<title>좌석 선택</title>
	</head>
	<body>
		<h1 style = 'margin-bottom : 0px;'>좌석 선택</h1>
		<form name = 'myForm' action = 'reserving.php' method = "POST">
			<div class = 'seat_area'>
				<?php
					echo "<input type = hidden name = 'screening' value = $screening_id>";
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
			<div class = 'selecting'>
					<?php
						if (!is_member()) {
							echo "<div>";
							echo "<select class = 'phone' name='firstnum'>";
							echo "<option> 010 </option>";
							echo "<option> 011 </option>";
							echo "<option> 016 </option>";
							echo "<option> 018 </option>";
							echo "</select> - ";
							echo "<input class = 'phone' type = 'text' name='middlenum' size = '4' maxlength = '4' onkeypress='return checkNumber(event)'/> - <input type = 'text' class = 'phone' name = 'lastnum' size = '4' maxlength = '4' onkeypress='return checkNumber(event)'/>";
							echo "</div>";
						}
					?>
				<input type = 'button' class = 'transport' value = "선택 완료" onclick="goSubmit()">
			</div>
		</form>
	</body>
</html>