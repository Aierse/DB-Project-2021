<style>
	#movie {
		display : inline-block;
		margin-top : 19.016px;
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
	.img_area {
		height : 655.891px;
		line-height : 655.891px;
	}
	.img_area img {
		width : 300px;
		vertical-align : middle;
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
	<div class = "img_area">
		<img src="image/testimage.png" alt="이미지 불러오기에 실패했습니다.">
	</div>
</div>