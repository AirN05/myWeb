<!DOCTYPE html>
<html>
	<head>
		<title> POKEMON GO </title>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
		<link rel= "stylesheet" type="text/css" href="css/style.css">
	</head>
	
	<body>
	<div>
		<div class="logo">
		<a href="index.php"> <img src="pic/log.png"></a>
		</div>
		
		<div class="up">
		
			<ul  class="menu">
				<?php include 'menu.php'; //все тут плохо, знаю
				echo Menu::f(0); 
				echo Menu::f(1); 
				echo Menu::f(2)?>
				<li><a href="start.html">Start</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="top.html">Top List</a></li>
			</ul>
		</div>
	</div>
		
	</body>
</html>