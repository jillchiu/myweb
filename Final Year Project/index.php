<html>
<head>

	<title>index page</title>
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
		
			<h2><b><FONT COLOR='BEFF54'>Welcome!</FONT></b></h2>
			<b><FONT COLOR='BEFF54'>Please register or login before using this system.</FONT></b>
			
		</div>
			
		<table>
			<tr>
				<td>
					<div id="register">
			
					<?php
						include 'register.php';
					?>
			
					</div>
				</td>
				<td>
					<div id="login">
			
						<?php
							include 'login.php';
						?>
			
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<FONT  COLOR="FFFFFF">ps: If you forget your username/password, please click <a href="forget.php">here</a> to find these information.</FONT>
				</td>
			</tr>
		</table>
		
		<hr>
	
		<div id="foot">
			
			<?php
				include 'foot.php';
			?>
			
		</div>
	
	</div>
</body>
</html>