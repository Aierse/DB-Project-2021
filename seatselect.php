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
</style>
<html lang = "ko">
	<head>
		<meta charset="UTF-8">
		<title>좌석 선택</title>
	</head>

	<body>
		<h1 style = 'border-bottom : 1px solid gray; margin-bottom : 0px;'>좌석 선택</h1>
		<div>
			<?php
				for ($i = 1; $i <= 5; $i++) {
					for($j = 1; $j <= 10; $j++) {
						$value = $j."-".$i;
						echo "<label class = 'seat' for = '$value'>$i - $j</label>";
					}
				}
			?>
		</div>
	</body>
</html>