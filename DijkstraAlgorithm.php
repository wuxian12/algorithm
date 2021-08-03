<?php

class DijkstraAlgorithm{
	public $arcs;
	public $vers = [];
	public $visited = [];
	public $dis = [];

	public function __construct($vers,$arcs){
		$this->vers = $vers;
		$this->arcs = $arcs;
		for ($i = 0; $i < count($vers); $i++) { 
			$this->visited[$i] = 0;
			$this->dis[$i] = 999999;
		}
	}

	public function dsj($i){
		$this->dis[$i] = 0;
		$this->update($i);
		for ($i = 1; $i < count($this->vers); $i++) { 
			$index = $this->getNext();
			$this->update($index);
		}
	}

	public function update($i){
		$this->visited[$i] = 1;
		for ($j = 0; $j < count($this->arcs[$i]); $j++) { 
			if(($this->visited[$j] == 0) && ($this->dis[$j] > $this->arcs[$i][$j] + $this->dis[$i])){
				$this->dis[$j] = $this->dis[$i] + $this->arcs[$i][$j];
			}
		}
	}

	public function getNext(){
		$index = 0;
		$min = 999999;
		for ($i = 0; $i < count($this->vers); $i++) { 
			if(($this->visited[$i] == 0) && ($this->dis[$i] < $min)){
				$min = $this->dis[$i];
				$index = $i;
			}
		}
		$this->visited[$i] = 1;
		return $index;
	}

	public function show(){
		var_dump($this->dis);
	}
}

$prim = new DijkstraAlgorithm(['A','B','C','D','E','F','G'],[[999999,5,7,999999,999999,999999,2],[5,999999,999999,9,999999,999999,3],[7,999999,999999,999999,8,999999,999999],[999999,9,999999,999999,999999,4,999999],[999999,999999,8,999999,999999,5,4],[999999,999999,999999,4,5,999999,6],[2,3,999999,999999,4,6,999999]]);

$prim->dsj(0);
$prim->show();