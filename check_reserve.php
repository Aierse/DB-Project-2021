<?php
	
	include "stdlib.php";
	
	
	$connect = get_connect();
	
	$user_id = $_SESSION['id'];
	$sql = "SELECT r.screening_id, r.reserve_col, r.reserve_row 
			FROM reserve r where r.user_id = '$user_id'";
	
	$stid = oci_parse($connect,$sql);
	
	oci_execute($stid);
	
	$i = 0;

	while(($row = oci_fetch_array($stid,OCI_NUM)) != false){
		$reserve_list[$i++] = $row;
	}
	
	foreach($reserve_list as $reserve){
		foreach($reserve as $element){
			echo $element;
		}
	}

	oci_free_statement($stid);
	oci_close($connect);
	
?>