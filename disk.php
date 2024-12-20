<?php
/**
 * @yogesh 2024-12-20
 * 
 * Moving discks from pole 1 to pole 3
 * Rules: 
 * 1. can move only one disk at a time
 * 2. larger disk cannot be on top of smaller disk
 * 
 * 
 *     _|_D        |          |
 *    __|__C       |          |
 *   ___|___B      |          |
 *  ____|____A     |          |
 * _____|__________|__________|__________
 *      1          2          3
 * 
 */ 

$disk1  = [1,2,3,4];
$disk2  = [];
$disk3  = [];

$checkSumDisk = [1,2,3,4];

$sorted = false;

function sameArray($a,$b){
	if(count($a) != count($b)){
		return false;
	}
	foreach ($a as $key => $value) {
		if(!array_key_exists($key, $b)){
			return false;
		}
		if($value != $b[$key]){
			return false;	
		}
	}
	return true;
}

function printArray($a){
	$map = ["","A","B","C","D"];
	$msg = "[";
	foreach ($a as $key => $value) {
		$msg .= $map[$value].",";
	}
	$msg .= "]";
	return $msg;
}

function extractFromArray($array,$key){
	if(array_key_exists($key,$array)){
		return $array[$key];
	}
	return 0;
}

$lastMovedDisk = 0;
$diskMoveTracker = [];

$counter = 1;

while(!$sorted){

	$diskMoved = false;

	//check the last items on each of the disk
	$lastItemDisk1 = end($disk1);
	$lastItemDisk2 = end($disk2);
	$lastItemDisk3 = end($disk3);

	//check possible positions to place the disk
	if($lastItemDisk1 && ($lastItemDisk1 != $lastMovedDisk)){
		//check if the disk can be placed on other disks
		if(!$lastItemDisk2 || ($lastItemDisk2 < $lastItemDisk1)){
			$lastMovedTo = extractFromArray($diskMoveTracker,$lastItemDisk1);
			if($lastMovedTo != 2){
				$disk = array_pop($disk1);
				$disk2[] = $disk;
				$diskMoveTracker[$disk] = 1;
				$lastMovedDisk = $disk;
				$diskMoved = true;		
			}
		}

		if(!$diskMoved && (!$lastItemDisk3 || ($lastItemDisk3 < $lastItemDisk1))){
			$lastMovedTo = extractFromArray($diskMoveTracker,$lastItemDisk1);
			if($lastMovedTo != 3){
				$disk = array_pop($disk1);
				$disk3[] = $disk;
				$diskMoveTracker[$disk] = 1;
				$lastMovedDisk = $disk;
				$diskMoved = true;
			}
		}
	}

	if(!$diskMoved && $lastItemDisk2 && ($lastItemDisk2 != $lastMovedDisk)){	
		//check if the disk can be placed on other disks
		if(!$lastItemDisk1 || ($lastItemDisk1 < $lastItemDisk2)){
			$lastMovedTo = extractFromArray($diskMoveTracker,$lastItemDisk2);
			if($lastMovedTo != 1){
				$disk = array_pop($disk2);
				$disk1[] = $disk;
				$diskMoveTracker[$disk] = 2;
				$lastMovedDisk = $disk;
				$diskMoved = true;	
			}	
		}
		//check if the disk can be placed on other disks
		if(!$diskMoved && (!$lastItemDisk3 || ($lastItemDisk3 < $lastItemDisk2))){
			$lastMovedTo = extractFromArray($diskMoveTracker,$lastItemDisk2);
			if($lastMovedTo != 3){
				$disk = array_pop($disk2);
				$disk3[] = $disk;
				$diskMoveTracker[$disk] = 2;
				$lastMovedDisk = $disk;
				$diskMoved = true;	
			}	
		}		
	}

	if(!$diskMoved && $lastItemDisk3 && ($lastItemDisk3 != $lastMovedDisk)){	
		//check if the disk can be placed on other disks
		if(!$lastItemDisk1 || ($lastItemDisk1 < $lastItemDisk3)){
			$lastMovedTo = extractFromArray($diskMoveTracker,$lastItemDisk3);
			if($lastMovedTo != 1){
				$disk = array_pop($disk3);
				$disk1[] = $disk;
				$diskMoveTracker[$disk] = 3;
				$lastMovedDisk = $disk;
				$diskMoved = true;	
			}	
		}
		//check if the disk can be placed on other disks
		if(!$diskMoved && (!$lastItemDisk2 || ($lastItemDisk2 < $lastItemDisk3))){
			$lastMovedTo = extractFromArray($diskMoveTracker,$lastItemDisk3);
			if($lastMovedTo != 2){
				$disk = array_pop($disk3);
				$disk2[] = $disk;
				$diskMoveTracker[$disk] = 3;
				$lastMovedDisk = $disk;
				$diskMoved = true;	
			}	
		}		
	}

	echo $counter." => ".printArray($disk1)." ".printArray($disk2)." ".printArray($disk3);
	echo "\n";
	$counter++;

	//check the last disk
	if(sameArray($checkSumDisk,$disk3)){
		$sorted = true;
	}
}