<?php


class FloydAlgorithm{
	public $arcs;
	public $vers = [];

	public function __construct($vers,$arcs){
		$this->vers = $vers;
		$this->arcs = $arcs;
		
	}

	public function flody(){
		for ($k = 0; $k < count($this->vers); $k++) { 
			for ($m = 0; $m < count($this->vers); $m++) { 
				for ($n = 0; $n < count($this->vers); $n++) { 
					if($this->arcs[$m][$k] + $this->arcs[$k][$n] < $this->arcs[$m][$n]){
						$this->arcs[$m][$n] = $this->arcs[$m][$k] + $this->arcs[$k][$n];
					}
				}
			}
			
		}
	}

	public function show(){
		for ($k = 0; $k < count($this->vers); $k++) { 
			var_dump($this->arcs[$k]);
			
		}
	}
}

$prim = new FloydAlgorithm(['A','B','C','D','E','F','G'],[[100000,5,7,100000,100000,100000,2],[5,100000,100000,9,100000,100000,3],[7,100000,100000,100000,8,100000,100000],[100000,9,100000,100000,100000,4,100000],[100000,100000,8,100000,100000,5,4],[100000,100000,100000,4,5,100000,6],[2,3,100000,100000,4,6,100000]]);

$prim->flody();
$prim->show();