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
		
				<? include 'menu.php'; 
				echo Menu::getMenu($_GET['page']); 
				
				?>
		</div>
		<? echo Menu::getPage($_GET['page']);?>
	</div>
		
	</body>
</html>