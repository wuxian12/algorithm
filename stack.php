<?php

class Stack{
	public $max = 10;
	public $top = -1;
	public $arr = [];

	public function push($num){
		if($this->top == $this->max -1){
			return '栈满';
		}
		$this->arr[++$this->top] = $num;
	}

	public function pop(){
		if($this->top == -1){
			return '栈已空';
		}
		$val = $this->arr[$this->top];
		$this->top--;
		return $val;
	}

	public function list(){
		for ($i = $this->top; $i >= 0; $i--) { 
			var_dump($this->arr[$i]);
		}
	}

}

$stack = new Stack;
$stack->push(3);
$stack->push(7);
$stack->push(2);
$stack->push(6);
$stack->list();
var_dump($stack->pop());
$stack->list();