<?php class Menu{
	
public static $items = array(

1=>array(
'title'=>'Start',
'href'=>'index.php?page=1',
'content'=>'assets/start.html'
),

2=>array(
'title'=>'About',
'href'=>'index.php?page=2',
'content'=>'assets/about.html'
),

3=>array(
'title'=>'Top List',
'href'=>'index.php?page=3',
'content'=>'assets/top.html'
)
);

public  static function getPage($p)
 {
	if (array_key_exists ( $p , self::$items)==true){
	 $page=file_get_contents(self::$items[$p]['content']);
	}
	 return $page;
 }

public static function getMenu($a)
{
	$q="<ul class=\"menu\">";
	foreach(self::$items as $key => $value){
		if ($a==$key)
		{
           $q.="<li><a href=".$value['href']." class=\"disabled\">".$value['title']."</a></li>";
		}
		else
			$q.="<li><a href=".$value['href'].">".$value['title']."</a></li>";
	}
	$q.="</ul>";
	return $q;
}
}


?>