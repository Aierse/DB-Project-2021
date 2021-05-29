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
</style>
<div id="food_menu_div">
	<ul id="food_menu">
		<li><a class="snack" href="view_food_menu.php">SNACK</a></li>
		<li><a class="popcorn" href="view_popcorn_menu.php">POPCORN</a></li>
		<li><a class="hotdog" href="view_hotdog_menu.php">HOTDOG</a></li>
		<li><a class="drink" href="view_drink_menu.php">DRINK</a></li> 
		<li><a class="set" href="view_set_menu.php">SET</a></li>
	</ul>
</div>
<h1>Hot Dog</h1>
<table border>
	<tr>
		<td><img src="image/음식사진/핫도그.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/핫도그.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/아메리칸 핫도그.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/어니언 핫도그.jpg" width=200 height=200></td>
		<td><img src="image/음식사진/핫바.jpg" width=200 height=200></td>
	</tr>
	<tr align=center>
		<td>핫도그</td>
		<td>치즈 핫도그</td>
		<td>아메리칸 핫도그</td>
		<td>어니언 핫도그</td>
		<td>핫바</td>
	</tr>
	<tr align=center>
		<td>2500원</td>
		<td>3000원</td>
		<td>2500원</td>
		<td>3000원</td>
		<td>2000원</td>
	</tr>
</table>