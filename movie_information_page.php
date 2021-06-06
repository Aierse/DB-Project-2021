<?php
	include "stdlib.php";

	$movie_id = check_input($_GET['movie_id']);

	$connect = get_connect();
	$sql = "SELECT * FROM Movie WHERE movie_id = '$movie_id'";

	$result = query_with_disconnect($connect, oci_parse($connect, $sql), $sql);
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
		border-left : 2px solid #bebebe;
		margin-left : 19.016px;
		padding-left : 19.016px;
	}

	.text_area > p {
		font-size : 50px;
		letter-spacing : 16px;

	}

</style>
<div id = "information">
	<img class = "movie_image" src=<?php echo "'$result[7]'"?> alt='이미지 불러오기에 실패했습니다.'>
	<div class = "text_area">
		<p><?php echo $result[1]?></p>
	</div>
</div>