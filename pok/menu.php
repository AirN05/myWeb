<?php class Menu{
	
public $items = array(

array(
'title'=>'Start',
'href'=>'start.php',
'id'=>'1'
),

array(
'title'=>'About',
'href'=>'about.php',
'id'=>'2'
),

array(
'title'=>'Top List',
'href'=>'top.php',
'id'=>'3'
)
);

static function f($a)
{
	///все тут плохо, знаю
	
	$q="<li><a href=".$items[$a]['href'].">".$items[$a][title]."</a></li>";
	
	return $q;
}
}

?>