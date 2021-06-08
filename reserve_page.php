<?php
	include "stdlib.php";

	function get_screening($movie_id, $connect = null) {
		if (!isset($connect))
			$connect = get_connect();

		$sql = "SELECT screening_id, room_id, TO_CHAR(start_time, 'MMDDHHMI')
				FROM Screening
				WHERE screening_id IN (
					SELECT screening_id
					FROM Screening 
					WHERE movie_id = '$movie_id'
				)
				ORDER BY room_id, start_time";
		
		$stid = oci_parse($connect, $sql);
		oci_execute($stid);

		$i = 0;
		while ($row = oci_fetch_array($stid)) {
			$result[$i++] = $row;
		}

		oci_free_statement($stid);
		oci_close($connect);

		return $result;
	}

	function get_date($movie_id, $connect = null) {
		if (!isset($connect))
			$connect = get_connect();

		$sql = "SELECT DISTINCT(TO_CHAR(start_time, 'YYYY-MM-DD')) FROM Screening WHERE movie_id = '$movie_id'";
		$stid = oci_parse($connect, $sql);
		oci_execute($stid);

		$i = 0;
		while ($row = oci_fetch_array($stid)) {
			$result[$i++] = $row[0];
		}

		oci_free_statement($stid);
		oci_close($connect);

		return $result;
	}

	$movie_id = check_input($_POST['movie_reserve']);
	$movie = get_movie($movie_id);
	$screening = get_screening($movie_id);

	for ($i = 0; $i < count($screening); $i++) {
		$month = substr($screening[$i][2], 0, 2);
		$day = substr($screening[$i][2], 2, 2);
		$minute = substr($screening[$i][2], 6, 2);
		$screening[$i][2] = ($month[0] == '0' ? $month[1] : $month)."월 ".($day[0] =="0" ? $day[1] : $day)."일 ".substr($screening[$i][2], 4, 2)."시 ".($minute == "00" ? "" : $minute."분");
		$room_id[$screening[$i][1]][count($room_id[$screening[$i][1]])] = array($screening[$i][0], $screening[$i][2]);
	}
?>
<style>
	#reserve {
		margin-top : 19.016px;
		height : 602px;
		display : flex;
	}

	#reserve > img {
		margin-right : 19.016px;
		width : 500px;
		height : 602px;
	}
	
	#reserve ul {
		list-style-type : none;
	}

	.select_area {
		width : 963px;
		height : 602px;
		padding-left : 19.016px;
		padding-right: 19.016px;
		border-left : 2px solid #bebebe;
		position : relative;
		overflow : auto;
		letter-spacing : 3px;
	}

	.select_area > h3 {
		float : left;
		width : 963px;
		padding-top : 19.016px;
		padding-bottom : 19.016px;
		color : white;
		background-color : #e71a0f;
	}

	.rbutton {
		display : none;
	}

	.select_area > label {
		-ms-user-select: none; 
		-moz-user-select: -moz-none;
		-khtml-user-select: none;
		-webkit-user-select: none;
		user-select: none;
		display : inline-block;
		width : 200px;
		font-size : 16px;
		padding : 20px 60.5px;
		cursor : pointer;
		float : left;
	}

	.select_area > label:hover {
		color : white;
		background-color : #e71a0f;
		transition-duration: 0.5s;
	}

	.select_area > input {
		outline : none;
		border : 0;
		color : white;
		background-color : #e71a0f;
		font-size : 20px;
		width : 240px;
		height : 60px;
		position : absolute;
		right : 0;
		bottom : 0;
		margin-right : 19.016px;
		cursor : pointer;
	}
	
	<?php
		for ($i = 0; $i < count($screening); $i++) {
			$t = $i+1;
			$item = $screening[$i][0];
			echo ".select_area > input:nth-of-type($t):checked ~ #label$item {";
			echo "color : white;";
			echo "background-color : #e71a0f;";
			echo "}";
		}
	?>
</style>
<script>
	function checkValue() {
		var chk_radio = document.getElementsByName('screening');
		var sel_type = null;

		for (var i = 0; i < chk_radio.length ; i++){
			if(chk_radio[i].checked == true){ 
				sel_type = chk_radio[i].value;
			}
		}

		if(sel_type == null){
			alert("시간을 선택하세요."); 
			return false;
		}
	}
</script>
<form method = "POST" action = "seatselect.php" onsubmit = "return checkValue()">
	<div id = "reserve">
		<img class = "movie_image" src = <?php echo "'$movie[7]'"?> alt = '이미지 불러오기에 실패했습니다.'>
		<div class = "select_area">
			<?php
				foreach ($room_id as $key => $value) {
					echo "<h3>상영관 $key</h3>";
					foreach ($value as $item) {
						echo "<input id = '$item[0]' class = 'rbutton' type = 'radio' name = 'screening' value = '$item[0]'/>";
						echo "<label id = 'label$item[0]' for = '$item[0]'><b>$item[1]</b></label>";
					}
				}
			?>
			<input type = "submit" value = "좌석 선택"/>
		</div>
	</div>
</form>