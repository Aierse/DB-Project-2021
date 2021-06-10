<style>
	.find_id{
		width: 400px;
		height: 300px;
	}
	.find_id > table > th{
		background-color : #E71A0F;
		color : white;
	}
</style>

<body>
	<?php
		include "stdlib.php";

		$phone_number = check_input($_POST['phonenumber']);
		
		$connect = get_connect();

		$sql = "SELECT user_id FROM Customer WHERE phone_number = '$phone_number'";
		$stid = oci_parse($connect, $sql);

		oci_execute($stid);
		
		$b=1;
		$i = 0;
		
		while(($row = oci_fetch_array($stid,OCI_NUM)) != false ){
			$id_list[$i] = $row[0];
			$i += 1;
		}
		oci_free_statement($stid);
		oci_close($connect);
	?>
	<div class = "find_id">
		<?php
			
			if ($id_list == NULL){
				echo "입력하신 전화번호로 ID를 찾을 수 없습니다.";
			}
			else{
				echo "<table border= ".$b.">";
					echo "<thead>";
						echo "<tr>";
							echo "<th>회원님의 ID 입니다.</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
				foreach($id_list as $id){
					echo "<tr>";
						echo "<td>".$id."</td>";
					echo "</tr>";
					}
				echo "</table>";
				}
		?>
	</div>
</body>