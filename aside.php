<style>
	aside {
		position : absolute;
		background-color : #fdfcf0;
		width : 380.594px;
		height : 655.891px;
	}

	aside > nav {
		padding : 0 19.016px;
	}
</style>

<aside>
	<?php
		if (!isset($_SESSION['id'])) {
			include "loginform.php";
		}
		else {
			include "logingform.php";
		}
	?>
	<nav>
		<?php
			include "menu.php";
		?>
	</nav>
</aside>