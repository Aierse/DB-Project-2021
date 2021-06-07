<?php
	include "stdlib.php";

	$movie_id = check_input($_POST[movie_reserve]);
	$result = get_movie($movie_id);
?>