<?php

class Josef{
	public $first = null;

	public function add($num){
		$cur = null;
		for ($i = 1; $i <= $num ; $i++) { 
			$boy = new Node($i);
			if($i == 1){
				$this->first = $boy;
				$boy->next = $this->first;
			}else{
				$cur->next = $boy;
				$boy->next = $this->first;
			}
			$cur = $boy;
			
		}
		
	}

	public function countBoy($n,$k){
		$helper = $this->first;
		while (1) {
			if($helper->next == $this->first){
				break;
			}
			$helper = $helper->next;
		}
		
		for ($i = 0; $i < $n; $i++) { 
			$this->first = $this->first->next;
			$helper = $helper->next;
		}
		while (1) {
			if ($helper == $this->first) {
				break;
			}

			for ($i = 0; $i < $k - 1; $i++) { 
				$this->first = $this->first->next;
				$helper = $helper->next;
			}
			var_dump($this->first->no);
			$this->first = $this->first->next;
			$helper->next = $this->first;
		}
		
	}
}

class Node{
	public $no;
	public $next = null;
	public function __construct($no)
	{
		$this->no = $no;
	}
}

$josef = new Josef;
$josef->add(8);
$josef->countBoy(3,2);