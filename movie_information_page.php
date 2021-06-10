<?php
	include_once "stdlib.php";

	$movie_id = check_input($_GET['movie_id']);

	$result = get_movie($movie_id);
?>
<style>
	#information {
		margin-top : 19.016px;
		height : 602px;
		display : flex;
	}

	#information > img {
		width : 500px;
		height : 602px;
	}

	.text_area {
		width : 970px;
		border-left : 2px solid #bebebe;
		margin-left : 19.016px;
		padding-left : 19.016px;
	}

	.text_area > span {
		display : flex;
		width : 970px;
		border-bottom : 2px solid #bebebe;
		padding-bottom : 8px;
	}

	.text_area > span > b {
		width : 570px;
		font-size : 50px;
		letter-spacing : 16px;
		
		text-align : left;
	}

	.information_list {
		height : 59px;
		border-bottom : 2px solid #bebebe;
	}

	.information_list > ul {
		list-style-type : none;
	}

	.information_list > ul > li {
		letter-spacing : 3px;
		border-left : 1px solid #bebebe;
		margin-top : 19.016px;
		padding : 0px 10px;
		float : left;
	}

	.information_list > ul > li:nth-of-type(1) {
		padding-left : 0;
		border : 0;
	}

	.story {
		margin-top : 5px;
		margin-bottom : 19.016px;
		letter-spacing : 3px;
		line-height : 37.016px;
		font-size : 18px;
		text-align : left;
	}

	.reserve {
		outline : none;
		background-color : #e71a0f;
		color : white;
		border : 1px solid gray;

		font-weight: 700;
		font-size : 24px;
		width : 400px;
		height : 66px;

		letter-spacing : 30px;
		padding-left : 30px;
		cursor : pointer;
		float : right;
	}
</style>
<div id = "information">
	<img class = "movie_image" src=<?php echo "'$result[7]'"?> alt='이미지 불러오기에 실패했습니다.'>
	<div class = "text_area">
		<span>
			<b><?php echo $result[1]?></b>
			<form method = 'POST' action = 'reserve.php'>
				<input type = 'hidden' name = 'movie_reserve' value = '<?php echo $result[0]?>'/>
				<?php
					if (!is_member())
						echo "<input type = 'submit' class = 'reserve' value = '비회원 예매'/>";
					else
						echo "<input type = 'submit' class = 'reserve' value = '예매'/>";
				?>
			</form>
		</span>
		<div class = "information_list">
			<ul>
				<li><?php echo $result[4]?></li>
				<li><?php echo $result[3]."분"?></li>
				<li><?php echo $reslut[2] == "0" ? "전체 이용가" : $result[2]."세 관람 가능"?></li>
				<li><?php echo $result[6]."원"?></li>
			</ul>
		</div>
		<div class = "story">
			<?php echo $result[5]?>
		</div>
	</div>
</div>