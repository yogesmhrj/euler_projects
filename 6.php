<?php

$sqSum = 0; $rSum = 0;

$limit = 100;

for($i = 1;$i <= $limit; $i++){

$rSum += $i;
$sqSum += ($i * $i);

}

//we have got the real sum, need to get the square of the sum
$rSumSq = $rSum * $rSum;

//then get the diference of the real sum square and the sum of the squares
echo "\n Difference is $rSumSq - $sqSum = ".($rSumSq - $sqSum)."\n";


