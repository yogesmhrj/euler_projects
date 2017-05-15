<?php

//the problem has its scope for 3 digit numbers, but lets make it dynamic anyways

$digits = 3;
$maxPalindromeNumber = 0;
//default is 1 digits , so it should run from 1 to 9
$startCounter = 1; $endCounter = 10;
for($i = 0; $i < $digits-1; $i++){ $startCounter *= 10; $endCounter *= 10; }
echo "\n Working ... \n";
//then loop from start to end
for($i = $startCounter; $i < $endCounter; $i++){
for($j = $startCounter; $j < $endCounter; $j++){
//get the multiple
$num = $i * $j;
//we need a logic to test the palindrome
if(checkPalindromeOptimized($num)){
if($num > $maxPalindromeNumber){$maxPalindromeNumber = $num; }
}
}
}

echo "The max palindrome number is $maxPalindromeNumber \n";

/** 
 * Previous  palindrome checker
 */
function checkPalindrome($string){
$string = (string) $string;
$charCount = strlen($string);
if($charCount < 1){
return false;
}
if($charCount % 2 == 0){
$charCount = $charCount/2;
}else{
$charCount = ((int)($charCount/2)) + 1;
}
for($i = 0; $i < $charCount; $i++){
if($string[$i] != $string[strlen($string)-($i+1)]){
return false;
}

}
return true;
}

/**
 * New optimized palindrome checker
 */
function checkPalindromeOptimized($string){
//ensure the string is string after all
$string = (string) $string;

return ($string == strrev($string));

}

