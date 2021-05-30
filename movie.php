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
?>
<div id = "movie">
	<?php
		$prev = $slideindex - 3;
		$next = $slideindex + 3;
		echo "<a class='prev' href = 'index.php?slideindex=$prev'>&#10094;</a>";
		echo "<a class='next' href = 'index.php?slideindex=$next'>&#10095;</a>";
	?>
	<table border>
		<tr class = "name_area">
			<?php
				for ($i = $slideindex; $i < $slideindex + 3; $i++) {
					echo "<td><h1>테스트$i</h1></td>";
				}
			?>
		</tr>
		<tr class = "img_area">
			<td><img src="image/testimage.png" alt="이미지 불러오기에 실패했습니다."></td>
			<td><img src="image/testimage.png" alt="이미지 불러오기에 실패했습니다."></td>
			<td><img src="image/testimage.png" alt="이미지 불러오기에 실패했습니다."></td>
		</tr>
		<tr>
			<?php
				for ($i = $slideindex; $i < $slideindex + 3; $i++) {
						echo "<td>";
						echo "<form>";
						echo "<input type = 'hidden' name = 'reserve_movie' value = '$i'/>";
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