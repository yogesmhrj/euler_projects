<?php
//we have formula for triangle number is Tn = (n(n + 1))/2
$divisorCount = 500;
//so its no point searching for triangle number before 500th term
$i = 0; $loop = true;
echo "\nWorking...\n";
while($loop){

//get the triangle term
$triNum = ($i * ($i + 1) )/ 2;
$divisors = array(1);
$largestDivisor = (int)($triNum / 2);

	for($j = 2; $j < $largestDivisor; $j++){
		if($triNum % $j == 0 && !in_array($triNum/$j,$divisors)){
			$divisors[] = $j;
			$divisors[] = $triNum / $j;
		}
	}
	if(count($divisors) >= $divisorCount){
		$loop = false;
		echo "\nThe first triangle number to have over $divisorCount divisors is $triNum. \n";
	}
$i++;
}



