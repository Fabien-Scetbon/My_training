<?php
	echo '<table border>
			<tr>
				<th>Nombre</th>
				<th>Carré</th>
				<th>Racine</th>
			</tr>';

		for($i = 1; $i<=50; $i++) {
		echo '<tr>
				<td>'.$i.'</td>
				<td>'.$i*$i.'</td>
				<td>'.sqrt($i).'</td>
			 </tr>';
		};

	     echo'</table>';