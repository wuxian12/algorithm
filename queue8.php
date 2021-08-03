<?php

//8皇后问题
//检查第n个皇后是否可放
class Queue{
	public $count = 0;
	public function judge($arr ,$n){
		for ($i = 0; $i < $n; $i++) { 
			if($arr[$i] == $arr[$n] || abs($i - $n) == abs($arr[$i] - $arr[$n])){
				return false;
			}
		}
		return true;
	}

	public function check($arr,$n){
		if($n >= 8){
			var_dump($arr);
			var_dump(++$this->count);
			return $arr;
		}

		for ($i = 0; $i < 8; $i++) { 
			$arr[$n] = $i;
			if($this->judge($arr ,$n)){
				$this->check($arr,$n+1);
			}
		}
	}
}

(new Queue)->check([],0);
