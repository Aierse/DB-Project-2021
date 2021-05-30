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
<script>
	var slideindex = 1;

	function plusslides(n) {
		slideindex += n;
	}
</script>
<div id = "movie">
	<form method = "POST" action = "index.php">
		<a class="prev" onclick="plusslides(-1)">&#10094;</a>
		<a class="next" onclick="plusslides(1)">&#10095;</a>
	</form>
	<table border>
		<tr class = "name_area">
			<td><h1>테스트1</h1>
			<td><h1>테스트2</h1>
			<td><h1>테스트3</h1>
		</tr>
		<tr class = "img_area">
			<td><img src="image/testimage.png" alt="이미지 불러오기에 실패했습니다."></td>
			<td><img src="image/testimage.png" alt="이미지 불러오기에 실패했습니다."></td>
			<td><img src="image/testimage.png" alt="이미지 불러오기에 실패했습니다."></td>
		</tr>
		<tr>
			<?php
				if (!isset($_SESSION['id'])) {
					for ($i = 0; $i < 3; $i++) {
						echo "<td>";
						echo "<form>";
						echo "<input type = 'submit' class = 'reserve' value = '비회원 예매'/>";
						echo "</form>";
						echo "</td>";
					}
				}

				else {
					for ($i = 0; $i < 3; $i++) {
						echo "<td>";
						echo "<form>";
						echo "<input type = 'submit' class = 'reserve' value = '예매'/>";
						echo "</form>";
						echo "</td>";
					}
				}
			?>
		</tr>
	</table>
</div>