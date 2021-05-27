<style>
	.seat {
		margin : auto;
		margin-top : 50px;
		border : 1px solid gray;
		padding : 5px;
		border-spacing: 5px;
	}

	.screen {
		font-size : 80px;
		color : gray;
	}

	.seat td {
		border : 1px solid black;
		width : 80px;
		height : 80px;
		margin : 3px;
		font-size : 30px;
	}
</style>
<table class = "seat">
	<caption class = "screen">스크린</caption>
	</thead>
	<tbody>
		<?php
			for ($i = 1; $i <=5; $i++) {
				echo "<tr>";
				for ($j = 1; $j <= 10; $j++){
					echo "<td>$i-$j</td>";
				}
				echo "</tr>";
			}
		?>
	</tbody>
</table>