<?php
	session_start();
?>
<html>
<head>

	<title>Address</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	
</head>

<?php

	if (isset($_SESSION['login'])) {
		
		if ($_SESSION['login'] <> "true") {
			
			echo "<html>
						<head>

						<title>Error page</title>
						<link rel='stylesheet' type='text/css' href='css/css.css'>
	
						</head>
						<body>
						<div id='container'>
	
						<div id='head'>";
	
				include 'head.php';
					
			echo "</div>
		
						<hr>
						
						<div id='welcome'>
						";
						
			echo "You haven't login!!!<p><br/>";
			echo '<a href="index.php">Click here to login</a>';
			
			echo "</div><hr>
	
						<div id='foot'>";
			
				include 'foot.php';
				
			echo "</div>
	
					</div>
					</body>
					</html>";
					
			exit();
			
		}
		
	} else {
		
			echo "<html>
						<head>

						<title>Error page</title>
						<link rel='stylesheet' type='text/css' href='css/css.css'>
	
						</head>
						<body>
						<div id='container'>
	
						<div id='head'>";
	
				include 'head.php';
					
			echo "</div>
		
						<hr>
						
						<div id='welcome'>
						";
						
			echo "You haven't login!!!<p><br/>";
			echo '<a href="index.php">Click here to login</a>';
			
			echo "</div><hr>
	
						<div id='foot'>";
			
				include 'foot.php';
				
			echo "</div>
	
					</div>
					</body>
					</html>";
					
			exit();
			
	}
	
	$login_name = $_SESSION['login_name'];
	$pass = $_SESSION['pass'];
	
	//$type = $_SESSION['type'];
	
	//Connect to the DB
	include("sql.php");
	$mysqli = ConnectDB();
	
	$result = $mysqli->query("select type from user where login_name='$login_name'");
	$row = $result->fetch_object();
	
	$type = $row->type;
	
	$mysqli->close();

?>

<body>
	<div id="container">
	
		<div id="head">
	
		<?php
			include 'head.php';
		?>
		
		</div>
		
		<hr>
		
		<div id="search">
			
			<?php
				include 'search.php';
			?>
			
		</div>
		
		<hr>
		
		<?php
		
			if($type=="u"){
				echo "<div id='menu_user'>";
				include 'menu_user.php';
				echo "</div>";
			}else{
				echo "<div id='menu_admin'>";
				include 'menu_admin.php';
				echo "</div>";
			}
			
		?>
	
		<?php
		
			if($type=="u"){
				echo "<div id='content_user'>";
			}else{
				echo "<div id='content_admin'>";
			}
			
		?>
			
			<table>
				<tr>
					<td width="50%" align="left">
						
						<table>
						
							<FONT COLOR="BEFF54"><b>The Peninsula Hotels</b></FONT>
							<tr><td><FONT COLOR="BEFF54">The Peninsula Hong Kong Salisbury Road, Kowloon Hong Kong, SAR</FONT></td></tr>
							<tr><td><FONT COLOR="BEFF54">Tel: +852 2920 2888</td></tr></FONT>
							<tr><td><FONT COLOR="BEFF54">Email: phk@peninsula.com</td></tr></FONT>
							
						</table>
						
					</td>
					
					<td width="50%" align="right">
					
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.5480837321975!2d114.16966501495459!3d22.295102385326217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400f249551975%3A0xefa3d013e6ba94ab!2z5Y2K5bO26YWS5bqX!5e0!3m2!1szh-TW!2shk!4v1458552902429" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
					
					</td>
				</tr>
			</table>
			
		</div>
		
	</div>
</body>
</html>