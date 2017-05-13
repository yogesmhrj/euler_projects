<?php
$perimeter = 1000;
//we have  a + b + c = 1000---eqn 1
//and a< b< c --- eqn 2
//so max value each term could have is less than 1000, or more clearly c can have is 997; then b can be 2 and a can be 1 satisfting both eqn 1 and 2.
//thus we need to search from 997 and below for the correct values
$c = 0; $b = 0; $a = 0;
echo "\nWorking...\n";
for($i = $perimeter-3; $i > 1; $i--){
	$c = $i;
	//we have b < c, then a + b = 1000 - c,
	$aPlusB = $perimeter-$c;
	//also b > a
	for($j = $aPlusB; $j > 1; $j--){
		$b = $j;
		$a = $aPlusB - $b;
		//then check the cases
		if($a > 0 && $b > 0 && ($a + $b + $c == 1000)){
			if($c*$c == ($a*$a + $b*$b)){
				echo "\nThe sides are $a, $b and $c.\n";
				$j = 0; //exit the loops
				$i = 0; //exit the loops
			}
		}
	}

}

echo "\nAnd their product is ".$a*$b*$c.".\n";

