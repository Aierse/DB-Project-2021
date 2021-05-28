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
		<li><a class="snack" href="#snack">SNACK</a></li>
		<li><a class="popcorn" href="popcorn">POPCORN</a></li>
		<li><a class="hotdog" href="hotdog">HOTDOG</a></li>
		<li><a class="drink" href="drink">DRINK</a></li>
		<li><a class="set" href="set">SET</a></li>
	</ul>
</div>