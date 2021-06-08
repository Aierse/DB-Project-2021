<?php
	
	include "stdlib.php";
	$user_id = $_SESSION['id'];
	
	function show_place($user_id,$connect = null){
		if (!isset($connect))
			$connect = get_connect();
	
		$sql = "SELECT r.screening_id, r.reserve_col, r.reserve_row 
				FROM reserve r WHERE r.user_id = '$user_id'";
		$stid = oci_parse($connect,$sql);
		oci_execute($stid);
	
		$i = 0;
		$count = 0;
		while(($row = oci_fetch_array($stid,OCI_NUM)) != false){
			$reserve_list[$i++] = $row;
		}
		
		echo $count;
		
		var_dump($reserve_list);
		

	oci_free_statement($stid);
	oci_close($connect);
	}
?>
<style>
	#show_reserve{
		margin : 0 auto;
		margin-top : 19.016px;
		margin-right : 19.016px;
		background-color : skyblue;
		width : 1500px;
		height : 602px;
	}
	#reserved{
		background-color : orange;
		width : 750px;
		height : 150px;
		margin-left : 19.016px;
	}
</style>
<div id = "show_reserve">
	asdfasdfasdf
	<div id = "reserved">
		<?php
		show_place($user_id);
		?>
	</div>
</div>
