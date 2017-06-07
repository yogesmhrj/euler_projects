<?php

$limit = 4000000;//4 million

$a = 1;
$b = 2;
$c = 0; // we shall set this later
$sum = 2;//since we dont have any even terms yet

do{

	//generate the next fibonacci term
	$c = $a + $b;
	if($c % 2 == 0){
		$sum += $c;
	}
	$a = $b;
	$b = $c;

}while($c <= $limit);

//print the answer
echo "Sum of even fibinacci series upto $limit is $sum .";

