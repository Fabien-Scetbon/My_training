<?php
	function equation($a, $b, $c) {

		if ($a == 0) {
			echo 'Equation invalide';
			exit;
		}
		
		$delta = delta($a, $b, $c);
		echo 'L\'équation est : '.$a.'x2 + '.$b.'x + '.$c.'<br>';
		echo 'Delta = '.$delta.'<br>';

		if ($delta < 0) echo "Pas de solution";
		else if ($delta == 0) echo 'Une seule solution : x0 = '.-$b/(2*$a);
		else echo 'Deux solutions : x1 = '.(-$b-sqrt($delta))/(2*$a).' et x2 = '.(-$b+sqrt($delta))/(2*$a);
	} 

	function delta($a, $b, $c) {
		return $b**2 - 4*$a*$c;
	}

	equation(1,-2,4);
