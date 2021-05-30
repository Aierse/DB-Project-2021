<style>
	.menu {
		list-style-type : none;
		margin-top : 10%;

		border-left : 1px solid #bebebe;
		border-right : 1px solid #bebebe;
	}

	.menu > li {
		height : 90px;
		line-height : 90px;

		width : 324.56px;
		text-align : center;
		font-weight: 700;
		font-size : 20px;
		padding-left : 16px;
		letter-spacing : 16px;
		color : #e71a0f;
	}

	.menu > li:hover {
		transition-duration: 1s;
		background-color : #e71a0f;
		color : white;
	}
</style>

<ul class = "menu">
	<li onclick="location.href = 'index.php'">상영 영화</li>
	<li onclick="location.href = 'seatmenu.php'">좌석 보기</li>
	<li onclick="location.href = 'view_food_menu.php'">음식 보기</li>
</ul>