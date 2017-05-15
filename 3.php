<?php
//the number from user
$number = 600851475143; $maxFactor = 1;
//get the suitable max factor of the number
$maxFtr = sqrt($number);
echo "\n\tWorking . . .\n";
for($i = 2; $i <= $maxFtr; $i++){
	if(isPrime($i) && $number % $i == 0){
		if($i > $maxFactor){
			$maxFactor = $i;
		}
	}
}

echo "\n\tThe largest factor of $number is : $maxFactor \n";

function isPrime($num){
	//check edge cases
	if($num < 1){ return false;}
	if($num < 3){ return true; }

	//we dont need to loop all the way to the number only upto the square root of the number would be sufficient
	$maxFactor = sqrt($num);
	//actually we can check if the $maxfactor is an integer and not a float
	if($num % $maxFactor == 0){ return false; }

	for($i = 2; $i < $maxFactor; $i++){
	if($num % $i == 0){ return false; }
	}
	return true;
}


