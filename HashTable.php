<?php

class HashTable{
	public $max = 7;
	public $arr;

	public function __construct(){
		for ($i = 0; $i < $this->max; $i++) { 
			$this->arr[$i] = new Link;
		}
	}
	public function hash($no){
		return $no % $this->max;
	}
	public function add($node){
		$index = $this->hash($node->no);
		$this->arr[$index]->add($node);
	}

	public function show(){
		for ($i = 0; $i < $this->max; $i++) { 
			$this->arr[$i]->show();
		}
	}
}

class Link{
	public $head = null;
	public function add($node){
		if(empty($this->head)){
			$this->head = $node;
		}else{
			$cur = $this->head;
			while ($cur->next) {
				$cur = $cur->next;
			}
			$cur->next = $node;
		}
	}

	public function show(){
		if(empty($this->head)){
			return;
		}
		$cur = $this->head;
		var_dump($cur->name);
		while ($cur->next) {
			$cur = $cur->next;
			var_dump($cur->name);
		}
		
		
	}
}

class Node{
	public $no;
	public $name;
	public $next = null;
	public function __construct($no,$name){
		$this->no = $no;
		$this->name = $name;
	}
}


$hashTable = new HashTable();

$node = new Node(1,'武松');
$node2 = new Node(2,'张顺');
$node3 = new Node(3,'林冲');
$node4 = new Node(4,'阮小二');
$node5 = new Node(9,'鲁智深');
$node6 = new Node(8,'杨志');
$node7 = new Node(7,'华荣');
$hashTable->add($node);
$hashTable->add($node2);
$hashTable->add($node3);
$hashTable->add($node4);
$hashTable->add($node5);
$hashTable->add($node7);
$hashTable->add($node6);
$hashTable->show();
