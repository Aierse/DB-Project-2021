<style>
	#movie {
		width : 100%;
		height : 655.891px;
		display : inline-block;
		margin-top : 19.016px;
	}

	.prev, .next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto;
		padding: 16px;
		margin-top: -22px;
		color: #e71a0f;
		font-weight: bold;
		font-size: 36px;
		transition-duration: 1s;
	}

	.next {
		right: 0;
	}

	.prev {
		left : 0;
	}

	.prev:hover, .next:hover {
		background-color: #e71a0f;
		color : white;
	}
</style>
<div id = "movie">
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>