<?php
//we have formula for triangle number is Tn = (n(n + 1))/2
$divisorCount = 500;
//so its no point searching for triangle number before 500th term
$i = 10000; $loop = true; $maxDiv = 0;
echo "\nWorking...\n";
while($loop){
//get the triangle term
$triNum = ($i * ($i + 1) )/ 2;
$divisors = array(1);
$largestDivisor = (int)sqrt($triNum);

	for($j = 2; $j < $largestDivisor; $j++){
		if($triNum % $j == 0){
			$divisors[] = $j;
			$divisors[] = $triNum / $j;
		}
	}
	$nums = count($divisors);
	if($nums > $maxDiv){
		$maxDiv = $nums;
		echo "\nReached $i term ($triNum) with ".$nums." divisors. \n";
	}
	if($nums >= $divisorCount){
		$loop = false;
		echo "\nThe first triangle number to have over $divisorCount divisors is $triNum. \n";
	}
$i++;
}



