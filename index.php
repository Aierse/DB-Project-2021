<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8">
		<title>영화 예매 사이트</title>
		<style>
			* {
				font-family : "맑은 고딕";
				margin : 0;
				padding : 0;
				text-align : center;
			}

			a {
				text-decoration : none;
			}

			body > section {
				width : 100%;
				display : block;
			}

			body > section > div {
				position : absolute;
				background-color : #fdfcf0;
				padding : 10 10px;
				left : 380.594px;
				width : 1522.41px;
				height : 655.891px;
				float : right;
			}
		</style>
	</head>
	<body>
		<?php
			include "header.php";
		?>
		<section>
			<?php
				include "aside.php";
			?>
			<div>
				<?php
					include "movie.php";
				?>
			</div>
		</section>
		<?php
			include "footer.php";
		?>
	</body>
</html>