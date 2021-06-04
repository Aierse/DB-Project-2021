<style>
	#movie {
		display : inline-block;
		margin-top : 19.016px;
		margin-bottom : 19.016px;
	}

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

	.name_area h1 {
		padding-top : 19.016px;
		padding-bottom : 19.016px;
		padding-left : 16px;
		letter-spacing : 16px;
	}

	.img_area img {
		width : 350px;
		height : 416.814px;
		padding : 25px;
		vertical-align : middle;
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
	}
</style>
<?php
	if (!isset($_GET['slideindex']))
		$slideindex = 1;
	else
		$slideindex = $_GET['slideindex'];

	if ($slideindex < 1)
		$slideindex = 1;
?>
<div id = "movie">
	<?php
		$next = $slideindex + 3;
		if ($slideindex > 1) {
			$prev = $slideindex - 3;
			echo "<a class='prev' href = 'index.php?slideindex=$prev'>&#10094;</a>";
		}

		echo "<a class='next' href = 'index.php?slideindex=$next'>&#10095;</a>";
	?>
	<table border>
		<?php
			include "stdlib.php";

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
					echo "<td><h1>$item[1]</h1></td>";
				}
			?>
		</tr>
		<tr class = "img_area">
			<?php
				foreach ($movie_list as $item) {
					echo "<td><img src='$item[2]' alt='이미지 불러오기에 실패했습니다.'></td>";
				}
			?>
		</tr>
		<tr>
			<?php
				foreach ($movie_list as $item) {
					echo "<td>";
					echo "<form method = 'POST' action = 'movie_information.php'>";
					echo "<input type = 'hidden' name = 'movie_reserve' value = '$item[0]'/>";
					if (!isset($_SESSION['id']))
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