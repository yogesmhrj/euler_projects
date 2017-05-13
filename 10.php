<?php

$limit = 2000000;//two million
$sum = 5;
$prevPrimes = array(2,3);
//need to get all the primes upto this point
echo  "\nWorking . . .\n";
//we will check only odd numbers as we know even numbers are never prime
for($i = 5; $i < $limit; $i += 2){
	if($i == 1000000){echo "\nhalf way there with $sum.\n";}
	$isPrime = true;
	foreach($prevPrimes as $prime){
		if($i % $prime == 0){$isPrime = false; break; }
	}
	if($isPrime){ $prevPrimes[] = $i; $sum += $i; }
}

echo "\nThe sum of all the primes upto $limit is $sum. \n";
