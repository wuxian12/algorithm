<?php

class PrimAlgorithm{
	public $arcs;
	public $vers = [];
	public $visited = [];

	public function __construct($vers,$arcs){
		$this->vers = $vers;
		$this->arcs = $arcs;
		for ($i = 0; $i < count($vers); $i++) { 
			$this->visited[$i] = 0;
		}
	}

	public function prim($i){
		$this->visited[$i] = 1;
		$h2 = -1;
		$h1 = -1;
		$min = 100000;
		for ($k = 1; $k < count($this->vers); $k++) { 
			for ($m = 0; $m < count($this->vers); $m++) { 
				for ($n = 1; $n < count($this->vers); $n++) { 
					if($this->visited[$n] == 0 && $this->visited[$m] == 1 && $min > $this->arcs[$m][$n]){
						$min = $this->arcs[$m][$n];
						$h2 = $n;
						$h1 = $m;
					}
				}
			}
			var_dump('找到最小边'.$this->vers[$h1].','.$this->vers[$h2]);
			$this->visited[$h2] = 1;
			$min = 100000;
		}
	}
}

$prim = new PrimAlgorithm(['A','B','C','D','E','F','G'],[[100000,5,7,100000,100000,100000,2],[5,100000,100000,9,100000,100000,3],[7,100000,100000,100000,8,100000,100000],[100000,9,100000,100000,100000,4,100000],[100000,100000,8,100000,100000,5,4],[100000,100000,100000,4,5,100000,6],[2,3,100000,100000,4,6,100000]]);

$prim->prim(0);