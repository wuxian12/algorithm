<?php

$w = [1,4,3];
$m = 4;
$val = [1500,3000,2000];
$v = [];
$path = [];

for ($i = 0; $i <= count($w); $i++) { 
	for ($j = 0; $j <= $m; $j++) { 
		$v[$i][$j] = 0;
		$path[$i][$j] = 0;
	}
}

for ($i = 1; $i < count($v); $i++) { 
	for ($j = 1; $j < count($v[$i]); $j++) { 
		if($w[$i -1] > $j){
			$v[$i][$j] = $v[$i -1][$j];
		}else{
			if($v[$i-1][$j - $w[$i-1]] + $val[$i-1] > $v[$i-1][$j]){
				$path[$i][$j] = 1;
				$v[$i][$j] = $v[$i-1][$j - $w[$i-1]] + $val[$i-1];
			}else{
				$v[$i][$j] = $v[$i -1][$j];
			}
		}
	}
}

$i = count($path) - 1;
$j = count($path[0]) - 1;

while ($i > 0 && $j > 0) {
	if($path[$i][$j] == 1){
		var_dump($i);
		$j = $j - $w[$i-1];
	}
	$i--;
	
}