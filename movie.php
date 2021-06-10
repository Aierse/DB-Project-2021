<?php
	include_once "stdlib.php";
	
	$connect = get_connect();
	$sql = "SELECT COUNT(*) FROM Movie";
	$stid = oci_parse($connect, $sql);
	
	$count = query_with_disconnect($connect, $stid, $sql)[0];

	if (!isset($_GET['slideindex']))
		$slideindex = 1;
	else
		$slideindex = $_GET['slideindex'];

	if ($slideindex < 1)
		$slideindex = 1;
	
	if ($slideindex > $count) 
		$slideindex = $count - 2;
?>
<style>
	.prev, .next {
		cursor : pointer;
		position : absolute;
		top : 50%;
		width : auto;
		padding : 16px;
		margin-top : -22px;
		color : #e71a0f;
		font-weight : bold;
		font-size : 36px;
		transition-duration : 1s;
	}

	.next {
		right: 0;
	}

	.prev {
		left : 0;
	}

	.prev:hover, .next:hover {
		background-color : #e71a0f;
		color : white;
	}

	#movie {
		display : inline-block;
		margin-top : 19.016px;
		margin-bottom : 19.016px;
	}

	#movie > table {
		width : <?php echo $count - $slideindex + 1 >= 3 ? 1215 : 1215 * ($count - $slideindex + 1) / 3?>px;
		table-layout : fixed;
	}

	#movie table tr td {
		width : 384px;

		white-space : nowrap;
		overflow : hidden;
		text-overflow: ellipsis;
	}

	.name_area > td {
		padding : 13px 0px;
	}

	.name_area a {
		font-size : 24px;
		padding-left : 12px;
		letter-spacing : 12px;
	}

	.name_area a:link {
		color : black;
	}

	.name_area a:visited {
		color : black;
	}

	.img_area img {
		width : 350px;
		height : 426.814px;
		padding : 25px;
		vertical-align : middle;
		cursor : pointer;
	}

	.reserve {
		outline : none;
		background-color : #e71a0f;
		color : white;
		border : 1px solid gray;

		font-weight: 700;
		font-size : 24px;
		width : 400px;
		height : 65px;

		letter-spacing : 30px;
		padding-left : 30px;
		cursor : pointer;
	}
</style>
<div id = "movie">
	<?php
		$next = $slideindex + 3;
		if ($slideindex > 1) {
			$prev = $slideindex - 3;
			echo "<a class='prev' href = 'index.php?slideindex=$prev'>&#10094;</a>";
		}

		if ($slideindex + 2 < $count)
			echo "<a class='next' href = 'index.php?slideindex=$next'>&#10095;</a>";
	?>
	<table border style="table-layout: fixed">
		<?php
			$connect = get_connect();

			$first = $slideindex;
			$last = $slideindex + 2;

			$sql = "SELECT movie_id, movie_name, image FROM (
			SELECT * FROM Movie ORDER BY movie_id ASC
			)
			WHERE movie_id BETWEEN $first AND $last";
			$stid = oci_parse($connect, $sql);

			if (oci_execute($stid)) {
				$i = 0;
				while (($row = oci_fetch_array($stid, OCI_NUM)) != false) {
					$movie_list[$i] = $row;
					$i += 1;
				}
			}

			oci_free_statement($stid);
			oci_close($connect);
		?>
		<tr class = "name_area">
			<?php
				foreach ($movie_list as $item) {
					echo "<td><a href = 'movie_information.php?movie_id=$item[0]'><b>$item[1]</a></td>";
				}
			?>
		</tr>
		<tr class = "img_area">
			<?php
				foreach ($movie_list as $item) {
					echo "<td><img src='$item[2]' alt='이미지 불러오기에 실패했습니다.' onclick = \"location.href = 'movie_information.php?movie_id=$item[0]'\"></td>";
				}
			?>
		</tr>
		<tr>
			<?php
				foreach ($movie_list as $item) {
					echo "<td>";
					echo "<form method = 'POST' action = 'reserve.php'>";
					echo "<input type = 'hidden' name = 'movie_reserve' value = '$item[0]'/>";
					if (!is_member())
						echo "<input type = 'submit' class = 'reserve' value = '비회원 예매'/>";
					else
						echo "<input type = 'submit' class = 'reserve' value = '예매'/>";
					echo "</form>";
					echo "</td>";
				}
			?>
		</tr>
	</table>
</div>