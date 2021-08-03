<?php

class AvlTree{
	public $root;

	public function addNode($node){
		if($this->root == null){
			$this->root = $node;
		}else{
			$this->root->add($node);
		}
	}

	public function pre(){
		$this->root->pre();
	}
}

class Node{
	public $val;
	public $left = null;
	public $right = null;

	public function __construct($val){
		$this->val = $val;
	}	

	public function add($node){
		if($node->val > $this->val){
			if($this->right == null){
				$this->right = $node;
			}else{
				$this->right->add($node);
			}
		}else{
			if($this->left == null){
				$this->left = $node;
			}else{
				$this->left->add($node);
			}
		}
		//左边高 右旋
		if($this->leftHeight() > $this->rightHeight() - 1){  
			if($this->left != null && ($this->left->rightHeight() >  $this->left->leftHeight())){  //如果左节点的右边高度大于左节点的左高度先  左旋
				$this->left->leftRote();
				$this->rightRote();
			}else{
				$this->rightRote();
			}
			return;
		}

		//右边高 左旋
		if($this->rightHeight() > $this->leftHeight() - 1){  
			if($this->right != null && ($this->right->leftHeight() >  $this->right->rightHeight())){  //如果右节点的左边高度大于右节点的左高度先  右旋
				$this->right->rightRote();
				$this->leftRote();
			}else{
				$this->leftRote();
			}
			
		}
	}

	public function height(){
		return max($this->left == null ? 0 : $this->left->height(),$this->right == null ? 0 : $this->right->height()) + 1;
	}

	public function leftHeight(){
		if ($this->left == null) {
			return 0;
		}
		return $this->left->height();
	}

	public function rightHeight(){
		if ($this->right == null) {
			return 0;
		}
		return $this->right->height();
	}
	//左旋
	public function leftRote(){
		$new = new self($this->val);
		$new->left = $this->left; 
		$new->right = $this->right->left;
		$this->val = $this->right->val;
		$this->left = $new;
		$this->right = $this->right->right;
	}
	//右旋
	public function rightRote(){
		$new = new self($this->val);
		$new->right = $this->right;
		$new->left = $this->left->right;
		$this->val = $this->left->val;
		$this->right = $new;
		$this->left = $this->left->left;
	}
	//前序遍历
	public function pre(){
		var_dump($this->val);
		if($this->left != null){
			$this->left->pre();
		}
		
		if($this->right != null){
			$this->right->pre();
		}
		
	}
}

$avlTree = new AvlTree;
$arr = [18, 14, 20, 12, 16, 1, -1];  	
//添加结点
for($i=0; $i < count($arr); $i++) {
	$avlTree->addNode(new Node($arr[$i]));
}
		

$avlTree->pre();