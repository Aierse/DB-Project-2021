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
		$screening[$i][2] = ($month[0] == '0' ? $month[1] : $month)."월".substr($screening[$i][2], 2, 2)."일 ".substr($screening[$i][2], 4, 2)."시".substr($screening[$i][2], 6, 2)."분";
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
	}

	.select_area > div {
		width : 963px;
		letter-spacing : 3px;
		padding-bottom : 19.016px;
		float : left;
	}

	.select_area > div > h3 {
		padding-top : 19.016px;
		padding-bottom : 19.016px;
		color : white;
		background-color : #e71a0f;
	}

	.select_area > div > ul {
		width : 963px;
		letter-spacing : 3px;
		margin : 19.016 auto;
	}

	.select_area > div > ul > li {
		float : left;
		padding : 10px 70px;
		cursor : pointer;
	}

	.select_area > div > ul > li > b {
		width : 180px;
	}

	.select_area > div > ul > li:hover {
		color : white;
		background-color : #e71a0f;
		transition-duration: 1s;
	}
</style>
<form>
	<div id = "reserve">
		<img class = "movie_image" src=<?php echo "'$movie[7]'"?> alt='이미지 불러오기에 실패했습니다.'>
		<form>
		<div class = "select_area">
			<?php
				foreach ($room_id as $key => $value) {
					echo "<div>";
					echo "<h3>상영관 $key</h3>";
					echo "<ul>";
					foreach ($value as $item) {
						echo "<input type = 'hidden' value = $item[0]/>";
						echo "<li><b>$item[1]</b></li>";
					}
					echo "</ul>";
					echo "</div>";
				}
			?>
		</div>
		</form>
	</div>
</form>