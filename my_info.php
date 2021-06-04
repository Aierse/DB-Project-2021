<style>
	table{
		text-align : center;
	}
	
</style>
<table border>
	<tr>
		<td>이름</td>
		<td>
			<?php
				$name = $_SESSION['name'];
				echo "$name";
			?>
		</td>
	</td>
	<tr>
		<td>ID</td>
		<td></td>
	</tr>
	<tr>
		<td>P.W</td>
		<td></td>
	</tr>
	<tr>
		<td>생년월일</td>
		<td></td>
	</td>
	<tr>
		<td>휴대폰 번호</td>
		<td></td>
	</tr>
</table>
