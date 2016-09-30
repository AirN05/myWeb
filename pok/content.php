<?php
class Content
{
public $pages = array(
 1=>'assets/start.html',
 2=>'assets/about.html',
 3=>'assets/top.html'
 );

 static function getPage($p)
 {
	 $a=$pages[$key]
	 $page=get_file_content($a);
	 return $page;
 }
 }


?>