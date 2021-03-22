<!-- 
	Web app that contains functions to convert decimal numbers to octal, hexadecimal and binary equivalents
	And displays the decimal numbers 1 - 256 ( and their binary, hexadecimal and octal equivalents) on a table 
-->
<html>
	<h1 style="text-align: center">Numerative Algorithms Assignment</h1>
	<?php
		// Converts Decimal number to Binary number
		function decToBin($num){
			$bin = null;
			while($num >= 1){
				$rem = $num % 2;
				$num /= 2;
				$bin = $rem.$bin;
			}
			if($bin == null){
				$bin = 0;
			}
			return $bin;
		}
		// Converts Decimal number to hexadecimal number 
		function decToHex($num) {
			$hexValues = array('0','1','2','3','4','5','6','7',
					'8','9','A','B','C','D','E','F');
			$hex = null;
			while($num != '0')
			{
				$hex = $hexValues[bcmod($num,'16')].$hex;
				$num = bcdiv($num,'16',0);
			}
			return $hex;
		}
		// converts decimal number to octal number
		function decToOct($num) {
			$i = 0;
			$octalNum = null;
			while ($num != 0) {
				$octalNum = bcmod($num, '8').$octalNum;
				$num = bcdiv($num, '8', 0); 
				$i++;
			}
			return $octalNum;
		}
	?>
	    <style>
      table,
      th,
      td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
	<!-- Displays the decimal numbers 1 - 256 and their octal, binary and hexadecimal equivalents in a table-->
	<table style= "width: 60%; text-align: center; margin-left: auto; margin-right: auto;">
		<tr>
			<th>Decimal</th>
			<th>Binary</th>
			<th>Hexadecimal</th>
			<th>Octal</th>
		</tr>
		<?php 
			$range = range(1, 256);
			for($i = 1; $i <= count($range); $i++){
				echo '<tr>
					<td>';
				echo $i;
			 	echo '</td>';
				echo '<td>';
				echo decToBin($i);
				echo "</td>";
				echo '<td>';
				echo decToHex($i);
				echo "</td>";
				echo '<td>';
				echo decToOct($i);
				echo "</td>";

			} 
		?>
	</table> 
</html>
