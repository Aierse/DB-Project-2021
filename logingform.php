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

	#account_menu > li {
		list-style-type : none;
	}
</style>

<div id = "loging">
	<div>
		<p>
			<?php
				$name = $_SESSION['name'];
				echo "<strong>$name"." 님</strong>"
			?>
		</p>
		<nav id = "account_menu">
			<li>
				<ul><a href = "my_info.php">내 정보</a></ul>
				<ul>예매 확인</ul>
			</li>
		</nav>
	</div>
	<button class = "logout" onclick = "location.href='logout.php'">로그 아웃</button>
</div>