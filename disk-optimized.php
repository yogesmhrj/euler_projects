<?php

$poles = [[],[1,2,3,4],[],[]];

$checkSumPole = [1,2,3,4];

$sorted = false;

$lastMovedDisk = 0;

$diskMoveTracker  = [];

$poleCount = count($poles);

$counter = 1;

/**
 * Check if the arrays are same
 */ 
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

/**
 * Will print the numeric array to readable format
 */ 
function printArray($a){
	$map = ["","A","B","C","D"];
	$msg = "[";
	foreach ($a as $key => $value) {
		$msg .= $map[$value].",";
	}
	$msg .= "]";
	return $msg;
}

/**
 * Extract the value with the key from array, otherwise return 0
 */ 
function extractFromArray($array,$key){
	if(array_key_exists($key,$array)){
		return $array[$key];
	}
	return 0;
}

/**
 * Check if pole is elegible for disk handling.
 * 
 * The pole should have disks and should not be the pole where we last moved the disk to.
 */ 
function attemptDiskMovesOnPole($pole){	
	global $poles;
	global $poleCount;
	global $lastMovedDisk;


	$topDiskOnPole = end($poles[$pole]);

	if($topDiskOnPole && ($topDiskOnPole != $lastMovedDisk)){
		for($poleNumber = 1; $poleNumber < $poleCount; $poleNumber++){
			if($poleNumber != $pole){			
				$diskMoved = attemptDiskMove($pole,$poleNumber);	
				if($diskMoved){
					return $diskMoved;
				}
			}
		}
	}

	return false;
}

/**
 * Attempts to move disks to alternate poles.
 * 
 * The target pole should be either empty or should have disk smaller than the disk from the source pole
 * 
 * The disk should not be placed back in the last pole it was taken out from
 */ 
function attemptDiskMove($sourcePole,$targetPole){
	global $poles;
	global $lastMovedDisk;
	global $diskMoveTracker;

	$diskMoved = false;

	$targetDiskEnd = end($poles[$targetPole]);
	$sourceDiskEnd = end($poles[$sourcePole]);

	if(!$targetDiskEnd || ($targetDiskEnd < $sourceDiskEnd)){
		$lastMovedTo = extractFromArray($diskMoveTracker,$sourceDiskEnd);

		if($lastMovedTo != $targetPole){

			$disk = array_pop($poles[$sourcePole]);
			$poles[$targetPole][] = $disk;
		
			$diskMoveTracker[$disk] = $sourcePole;
			$lastMovedDisk = $disk;
			$diskMoved = true;		
		}
	}

	return $diskMoved;
}

while(!$sorted){

	for($pole = 1; $pole < $poleCount; $pole++){	
		if(attemptDiskMovesOnPole($pole)){
			break;
		}
	}

	echo $counter." => ".printArray($poles[1])." ".printArray($poles[2])." ".printArray($poles[3]);
	echo "\n";

	$counter++;

	//check the last disk
	if(sameArray($checkSumPole,$poles[3])){
		$sorted = true;
	}
}