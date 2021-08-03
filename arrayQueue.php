<?php

class ArrayQueue{
	public $max = 10;
	public $font = 0;
	public $rear = 0;
	public $arr = [];

	public function push($num){

		if(($this->rear + 1 + $this->max - $this->font) % $this->max == 0){
			return '队满';
		}
		$this->arr[$this->rear] = $num;
		$this->rear = ($this->rear + 1) % $this->max;
	}

	public function pop(){
		if($this->rear == $this->font){
			return '队已空';
		}
		$val = $this->arr[$this->font];
		$this->font = ($this->font + 1) % $this->max;
		return $val;
	}

	public function list(){
		$size = ($this->rear + $this->max - $this->font) % $this->max;
		for ($i = $this->font; $i < $this->font + $size; $i++) { 
			var_dump($this->arr[$i]);
			
		}
	}

}

$stack = new ArrayQueue;
$stack->push(3);
$stack->push(7);
$stack->push(2);
$stack->push(6);
$stack->list();
var_dump('===');
var_dump($stack->pop());
var_dump('==');
$stack->list();