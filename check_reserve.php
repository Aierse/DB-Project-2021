<?php
	
	include "stdlib.php";
	$user_id = $_SESSION['id'];
	
	function show_reserve($user_id,$connect = null){
		if (!isset($connect))
			$connect = get_connect();
	
		$sql = "SElECT m.movie_name, m.price, s.room_id, r.reserve_col, r.reserve_row, TO_CHAR(s.start_time, 'MM-DD-HH-MI')
				FROM reserve r JOIN screening s ON r.screening_id = s.screening_id 
				JOIN movie m ON m.movie_id = s.movie_id
				WHERE r.user_id = '$user_id'";

		$stid = oci_parse($connect,$sql);
		oci_execute($stid);
	
		$i = 0;
		while(($row = oci_fetch_array($stid,OCI_NUM)) != false){
			$reserve_list[$i++] = $row;
		}

		oci_free_statement($stid);
		oci_close($connect);

		return $reserve_list;
	}

?>
<style>
	#show_reserved{
		margin : 0 auto;
		margin-top : 19.016px;
		margin-right : 19.016px;
		width : 1500px;
		height : 602px;
		border-left : 1px solid black;
		overflow : auto;
	}
	.cutting{
		border-style: groove;
		border-color: #bcbcbc;
		background-color : #FDFCF0;
		width : 400px;
		height : 140px;
		margin : 0 auto;
		margin-bottom : 19.016px;
		font-size: 17px;
		display : flex;
	}
	.tradeMark{
		width : 100px;
		height : 140px;
		font-size : 20px;
		font-weight: 700;
		border-right: 5px dashed;
		background-color : #E71A0F;
		color : #FDFCF0;
	}
	.ticket{
		height : 140px;
	}
	.ticket > div {
		margin : 5px auto;
		width : 200px;
	}
	.ticket > div > div{
		width : 100px;
		display : inline-block;
	}
</style>
<div id = "show_reserved">
	<h1>회원님의 예매 정보입니다.</h1>
	<?php
		foreach(show_reserve($user_id) as $item){
			echo "<div class = cutting>";
				echo "<div class = tradeMark>";
					echo "KING GOD";
				echo "</div>";
				echo "<div class = ticket>";
					echo "<div>";
						echo "<div><b>movie:</b></div>";
						echo "<div><b>$item[0]</b></div>";
					echo "</div>";
					echo "<div>";
						echo "<div><b>cost:</b></div>";
						echo "<div><b>$item[1]</b></div>";
					echo "</div>";
					echo "<div>";
						echo "<div><b>theater:</b></div>";
						echo "<div><b>$item[2]</b></div>";
					echo "</div>";
					echo "<div>";
						echo "<div><b>seat:</b></div>";
						echo "<div><b>$item[3]."-".$item[4]</b></div>";
					echo "</div>";
					echo "<div>";
						echo "<div><b>date:</b></div>";
						echo "<div><b>$item[5]</b>/<div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
	
	?>
</div>

