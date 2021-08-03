<?php

/** 汉诺塔
  * n 圈圈的个数
  *	a 第一个柱子
  * b
  * c 
  */
function hanno($n, $a, $b, $c){
	if($n == 1){
		var_dump("第{$n}根柱子从{$a}移动到{$c}");
	}else{
		hanno($n-1, $a, $c, $b);
		var_dump("第{$n}根柱子从{$a}移动到{$c}");
		hanno($n-1, $b, $a, $c);
	}
}

hanno(2, 'a', 'b', 'c');