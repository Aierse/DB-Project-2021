<style>
	#header {
		width : 100%;
		height : 187.38px;
		float : center;
	}

	#head {
		width : 100%;
		position : absolute;
	}

	#head > h1 {
		background-image : url('image/header_background.PNG');
		background-size: 36px;
		position : absolute;
		width : 100%;
		height : 187.39px;
		line-height : 187.39px;
		letter-spacing : 12px;
	}

	#head > h1 > a:link { 
		color : black;
		text-decoration : none;
	}

	#head > h1 > a:visited { 
		color : black;
		text-decoration : none;
	}
</style>
<header id = "header">
	<?php
		session_start();
	?>
	<div id = "head">
		<h1><a href = "index.php">킹갓 영화관</a></h1>
	</div>
</header>