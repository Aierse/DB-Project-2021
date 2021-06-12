<style>
	#loging {
		margin : 19.016px;
		padding : 19.016px;
		border : 1px solid black;
		width : 302.531px;
		height : 257.5px;
	}

	#loging > div {
		height : 212.5px;
	}

	#loging > div > p {
		margin-bottom : 19.016px;
	}

	#loging > div > p > strong {
		font-size : 30px;
	}

	.logout {
		outline : none;
		width : 302.531px;
		height : 45px;
		border : 1px solid gray;

		background-color : #e71a0f;
		font-weight: 700;
		font-size : 16px;
		letter-spacing : 16px;
		color : white;
		cursor : pointer;
	}


	#account_menu {
		position : absolute;
		width : 302.531px;
		height : 103.5px;
	}

	#account_menu > ul {
		margin-bottom : 20px;
		list-style-type : none;
	}

	#account_menu > ul > li {
		margin : 5px 0px;
	}

	#account_menu > ul > li > a {
		padding : 10px 0px;
		font-size : 20px;
		color : #505050;
	}

	#account_menu > ul > li > a:visited {
		color : #505050;
	}
</style>

<div id = "loging">
	<div>
		<p>
			<?php
				include_once "stdlib.php";
				$name = $_SESSION['name'];
				echo "<strong>$name"."님</strong>";
			?>
			<h2>환영합니다</h2>
		</p>
		<nav id = "account_menu">
			<ul>
				<?php
					if (is_member()) {
						echo "<li><a href = 'my_info.php'>내 정보</a></li>";
					}
				?>
				<li><a href = "check_reserve_page.php">예매 확인</a></li>
			</ul>
		</nav>
	</div>
	<button class = "logout" onclick = "location.href='logout.php'">로그 아웃</button>
</div>