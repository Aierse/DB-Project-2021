<style>
	#food_menu_div{
		margin-right:19.016px;
	}
	#food_menu {
		list-style-type: none;
		background-color: #fdfcf0;
		margin-top: 19.016px;
		border-top : 1px solid #bebebe;
		border-bottom : 1px solid #bebebe;
	}
	#food_menu:after{
		content:'';
		display: block;
		clear:both;
	}
	#food_menu > li {
		float: left;
	}
	#food_menu > li a {
		display: block;
		color: #e71a0f;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	#food_menu > li a:hover{
		background-color: #e71a0f;
		color: #fdfcf0;
		transition-duration: 1s;
	}
	#menu_tb{
		font-weight: bold;
		margin-top:19.016px;
	}
</style>
<div id="food_menu_div">
	<ul id="food_menu">
		<li><a class="snack" href="view_food_menu.php">SNACK</a></li>
		<li><a class="popcorn" href="view_popcorn_menu.php">POPCORN</a></li>
		<li><a class="hotdog" href="view_hotdog_menu.php">HOTDOG</a></li>
		<li><a class="drink" href="view_drinking_menu.php">DRINK</a></li> 
		<li><a class="set" href="view_set_menu.php">SET</a></li>
	</ul>
</div>

<table border id="menu_tb">
	<tr>
		<td colspan="7">DRINKING</td>
	</tr>
	<tr>
		<td><img src="image/음식사진/콜라.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/사이다.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/아메리카노.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/에스프레소.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/카페라테.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/카페모카.png" width=200 height=200></td>
		<td><img src="image/음식사진/카푸치노.jpg" width=200 height=200></td>
	</tr>
	<tr align=center>
		<td>콜라</td>
		<td>사이다</td>
		<td>아메리카노</td>
		<td>에스프레소</td>
		<td>카페라테</td>
		<td>카페모카</td>
		<td>카푸치노</td>
	</tr>
	<tr align=center>
		<td>2000원</td>
		<td>2000원</td>
		<td>2000원</td>
		<td>2000원</td>
		<td>2000원</td>
		<td>2000원</td>
		<td>2000원</td>
	</tr>
</table>