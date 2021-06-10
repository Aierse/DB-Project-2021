<?php
	
	include "stdlib.php";
	$user_id = $_SESSION['id'];
	
	function show_reserve($user_id,$connect = null){
		if (!isset($connect))
			$connect = get_connect();
	
		$sql = "SElECT m.movie_name, m.price, s.room_id, r.reserve_col, r.reserve_row, TO_CHAR(s.start_time, 'MMDDHHMI'),r.reserve_id
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
<script>
	function can_u_cancel(){

	var con_test = confirm("선택하신 영화를 예매 취소하시겠습니까?.");

	if(con_test == true){
		return true;
		}
	else
		return false;
	}
</script>

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
		width : 500px;
		height : 140px;
		margin : 0 auto;
		margin-bottom : 19.016px;
		font-size: 17px;
		display : flex;
	}
	.cancel{
		width : 100px;
		height : 140px;
		display : inline-block;
		outline : none;
		border : 0;
		border-left : 4px dashed;
		font-size : 20px;
		font-weight: 700;
		background-color : #3232FF;
		color : #FDFCF0;
		cursor : pointer;
		}
	.tradeMark{
		width : 100px;
		height : 100px;
		padding : 20px 0px;
		line-height : 50px;
		font-size : 20px;
		font-weight: 700;
		border-right: 5px dashed;
		background-color : #E71A0F;
		color : #FDFCF0;
	}
	.ticket{
		width : 300px;
		height : 140px;
	}
	.ticket > div {
		margin : 1.5px 0px;
		height : 23px;
		display : inline-block;
		width : 300px;
	}

	.ticket > div > div {
		display : inline-block;
	}
	.ticket > div > div:nth-of-type(1) {
		overflow : hidden;
		width : 80px;
		margin-left : 5px;
		text-align : left;
	}

	.ticket > div > div:nth-of-type(2) {
		overflow : hidden;
		width : 200px;
		margin-right : 5px;
		text-align : right;
	}
	#show_reserved > h1 {
		margin-bottom: 19.016px;
	}
	form{
		margin : 0;
		padding : 0;
	}
</style>
<div id = "show_reserved">
	<h1><?php echo $_SESSION['name'];?>님의 예매 정보</h1>
	<?php
		if(show_reserve($user_id) == NULL){
			echo "<h3>아직 영화 예매를 하지 않으셨습니다...</h3>";
		}
		else{
			foreach(show_reserve($user_id) as $item){
				echo "<div class = cutting>";
					echo "<div class = tradeMark>";
						echo "KING GOD";
					echo "</div>";
					echo "<div class = ticket>";
						echo "<div>";
							echo "<div><b>Title :</b></div>";
							echo "<div><b>$item[0]</b></div>";
						echo "</div>";
						echo "<div>";
							echo "<div><b>Cost :</b></div>";
							echo "<div><b>$item[1]원</b></div>";
						echo "</div>";
						echo "<div>";
							echo "<div><b>Theater :</b></div>";
							echo "<div><b>상영관 $item[2]</b></div>";
						echo "</div>";
						echo "<div>";
							echo "<div><b>Seat :</b></div>";
							echo "<div><b>$item[3]"." 행".$item[4]." 열</b></div>";
						echo "</div>";
						echo "<div>";
							echo "<div><b>Date :</b></div>";
							echo "<div><b>".(int)substr($item[5], 0, 2)."월".substr($item[5], 2, 2)."일".(int)substr($item[5], 4, 2)."시".substr($item[5], 6, 2)."분</b></div>";
						echo "</div>";
					echo "</div>";
					echo "<form name='cancel' method='post' action = 'cancel_reserve.php' onsubmit = 'return can_u_cancel()'>";
						echo "<button class = cancel >예매<br><br>취소</button>";
						echo "<input type = 'hidden' value = $item[6] name = 'reserve_id'>";
					echo "</form>";
				echo "</div>";
			}
		}
	?>
</div>