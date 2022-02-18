<?php
    //logout
    session_start();
	session_destroy();
	
?>
<html>
<head>

	<title>logout page</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	
</head>
<body>

	<div id="container">
	
		<div id="head">
	
			<?php
				include 'head.php';
			?>
		
		</div>
		
		<hr>
		
		<div id="welcome">
		
			<FONT COLOR='BEFF54'>You have logout.</FONT><br/><br/>	
		
			<FONT COLOR='BEFF54'>Click <a href="index.php"><FONT COLOR='FFFFFF'>here</FONT></a> to go back index page.</FONT><br/>
		
		</div>
		
		<div id="foot">
			
			<?php
				include 'foot.php';
			?>
			
		</div>
	
	</div>
</body>
</html>