<?php
readline("Min range : ");
$minRange = trim(readline_info()['line_buffer']);
readline("Max range : ");
$maxRange = trim(readline_info()['line_buffer']);
if(!is_numeric($minRange) || !is_numeric($maxRange)){ echo "\n Min And Max Values are not valid. \n"; exit; }
//the range to look to
//$minRange = 1; $maxRange = 20;
if($minRange > $maxRange) {echo "\nRanges are not proper.\n";exit;}
$counter = $maxRange;
while($counter > $minRange){
	
	$success = true;
	for($i = $minRange; $i <= $maxRange; $i++){
		if($counter % $i != 0){
			$success = false;
			break;
		}
	}
	if($success){
		//we nullify the check condition for the while
		echo "\n Max positive number is : $counter \n";
		$counter = $minRange;

	}else{ $counter++; }
}
if($counter > $minRange){
	echo "\n Loop exhausted without any result . \n";
}



