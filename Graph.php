<?php

class Graph{
	public $vers = [];
	public $arcs = [];
	public $visited = [];

	public function __construct($vers){
		$this->vers = $vers;
		for ($i = 0; $i < count($vers); $i++) { 
			$this->visited[$i] = 0;
			for ($j = 0; $j < count($vers); $j++) { 
				$this->arcs[$i][$j] = 0;
			}
		}
	}

	public function addEdge($a, $b){
		$this->arcs[$a][$b] = 1;
		$this->arcs[$b][$a] = 1;
	}

	public function bfs(){
		$point = [];
		for ($i = 0; $i < count($this->vers); $i++) { 
			if($this->visited[$i] == 0){
				$this->visited[$i] = 1;
				var_dump($this->vers[$i]);
				$point[] = $i;
				while (count($point)) {
					$cur = array_shift($point);
					for ($j = 0; $j < count($this->vers); $j++) { 
						if($this->visited[$j] == 0 && $this->arcs[$cur][$j] == 1){
							$point[] = $j;
							$this->visited[$j] = 1;
							var_dump($this->vers[$j]);
						}
					}
				}
			}
		}
	}

	public function traves($i){
		$this->visited[$i] = 1;
		var_dump($this->vers[$i]);
		for ($j = 0; $j < count($this->arcs[$i]); $j++) { 
			if($this->visited[$j] == 0 && $this->arcs[$i][$j] == 1){
				$this->traves($j);
			}
		}
	}

	public function dfs(){
		for ($j = 0; $j < count($this->vers); $j++) { 
			if($this->visited[$j] == 0){
				$this->traves($j);
			}
		}
	}
}

$vertices = ['景点0', '景点1', '景点2', '景点3', '景点4', '景点5', '景点6', '景点7', '景点8', '景点9', '景点10'];
$graph = new Graph($vertices);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(0, 3);
$graph->addEdge(0, 4);
$graph->addEdge(1, 4);
$graph->addEdge(1, 7);
$graph->addEdge(1, 9);
$graph->addEdge(3, 5);
$graph->addEdge(3, 6);
$graph->addEdge(4, 5);
$graph->addEdge(7, 8);
$graph->addEdge(7, 10);
    $graph->bfs();