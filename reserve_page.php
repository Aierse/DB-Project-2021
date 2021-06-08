<?php
	include "stdlib.php";

	function get_screening($movie_id, $connect = null) {
		if (!isset($connect))
			$connect = get_connect();

		$sql = "SELECT screening_id, room_id, TO_CHAR(start_time, 'YYYY-MM-DD-HH-MI')
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

	$date = get_date($movie_id);

	$i = 0;
	foreach ($date as $item) {
		$day[$i++] = $item;
	}
?>
<style>
	#reserve {
		margin-top : 19.016px;
		height : 602px;
		display : flex;
	}

	#reserve > img {
		width : 500px;
		height : 602px;
	}
	
	#reserve ul {
		list-style-type : none;
	}

	.day_list {
		width : 970px;
		margin-left : 19.016px;
		border-left : 2px solid #bebebe;
		width : 100px;
		height : 602px;
		padding : 0 19.016px;
		overflow : auto;
	}

	.day_list > h3 {
		padding-top : 19.016px;
		padding-bottom : 19.016px;
		border-top : 2px solid #bebebe;
		border-bottom : 2px solid #bebebe;
		cursor : default;
	}

	.day_list input {
		display : none;
	}

	.time_buttons > label {
		padding-top : 19.016px;
		padding-bottom : 19.016px;
		border-bottom : 1px solid #bebebe;
		cursor : pointer;
		display : block;
	}

	.day_list > input:nth-of-type(1):checked ~ .time_buttons > label:nth-of-type(1) {
		background-color : #E71A0F;
		color : white;
		transition-duration: 1s;
	}

	<?php
		for ($i = 1; $i <= count($day); $i++) {
			echo ".day_list > input:nth-of-type($i):checked ~ .time_buttons > label:nth-of-type($i) {";
			echo "background-color : #E71A0F;";
			echo "color : white;";
			echo "transition-duration: 1s;";
			echo "}";
		}
	?>

	.select_area {
		width : 823px;
		height : 602px;
		padding-left : 19.016px;
		padding-right: 19.016px;
		border-left : 2px solid #bebebe;
	}

	.select_area > div {
		width : 823px;
		letter-spacing : 3px;
		padding-top : 19.016px;
		padding-bottom : 19.016px;
		border-bottom : 2px solid #bebebe;
		float : left;
	}

	.select_area > div:nth-of-type(1) {
		border-top : 2px solid #bebebe;
	}

	.select_area > div > h3 {
		padding-bottom : 19.016px;
		border-bottom : 2px solid #bebebe;
	}

	.select_area > div > ul {
		width : 823px;
		letter-spacing : 3px;
		margin : 19.016 auto;
	}

	.select_area > div > ul > li {
		float : left;
		padding-top : 19.016px;
		padding-right : 10px;
	}
</style>
<form>
	<div id = "reserve">
		<img class = "movie_image" src=<?php echo "'$movie[7]'"?> alt='이미지 불러오기에 실패했습니다.'>
		<div class = "day_list">
			<h3>날짜 선택</h3>
			<?php
				foreach ($day as $item) {
					echo "<input id = '$item' type = 'radio' name = 'time' value = '$item'/>";
				}
			?>
			<div class = 'time_buttons'>
				<?php
					foreach ($day as $item) {
						echo "<label for = '$item'>$item</label>";
					}
				?>
			</div>
		</div>
		<form>
		<div class = "select_area">
			<div>
				<h3>상영관 1</h3>
				<ul>
				<?php
					for ($i = 0; $i < 10; $i++){
						echo "<li>1960-01-01</li>";
					}
				?>
				</ul>
			</div>
			<div>
				<h3>상영관 2</h3>
				<ul>
				<?php
					for ($i = 0; $i < 10; $i++){
						echo "<li>1960-01-01</li>";
					}
				?>
				</ul>
			</div>
		</div>
		</form>
	</div>
</form>