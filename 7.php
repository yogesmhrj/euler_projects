<?php
//position must be greater than 2
$position = 10001;
$prevPrimes = array(2,3);
echo "\nWorking...\n";
//just untill the position as we will get the prime number at the postion in the adjacent loop
for($i=4; count($prevPrimes) < $position ;$i++){
	if($i == 1000000){ echo "Reached 1 million mark.\n"; }
	if($i == 1000000000){ echo "Reached 1 billion mark. \n"; }
	//check if the number is prime
	$isPrime = true;
	foreach($prevPrimes as $prime){
		if($i % $prime == 0){ $isPrime= false; break; }
	}
	if($isPrime){
		$prevPrimes[] = $i;
	}
}
//get the number
echo "\nThe prime number at $position th postion is ".$prevPrimes[$position-1].".\n";
