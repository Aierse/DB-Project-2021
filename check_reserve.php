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

		foreach($reserve_list as $item){
			echo "<div class = cutting>";
			echo "영화이름: ".$item[0]; 
			echo "가격: ".$item[1]."원 ";
			echo "<hr>상영관: ".$item[2]."번 ";
			echo "좌석번호: ".$item[3]."-";
			echo $item[4]." ";
			echo "시작날짜 및 시간: ".$item[5];
			echo "</div>";
			echo "<br>";
		}

	oci_free_statement($stid);
	oci_close($connect);
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
	}
	.cutting{
		border-style: groove groove groove dashed;
		border-color: #bcbcbc;
		background-color : #FDFCF0;
		width : 500px;
		height : 50px;
		margin-left : 19.016px;
	}
</style>
<div id = "show_reserved">
	<div>
		<h1>회원님의 예매 정보입니다.</h1>
		<?php
		show_reserve($user_id);
		?>
	</div>
</div>
