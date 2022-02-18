<?php
	session_start();
?>
<html>
<head>

	<title>home page</title>
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
						
			echo "<FONT COLOR='BEFF54'>You haven't login!!!</FONT><p><br/>";
			echo '<a href="index.php"><FONT COLOR="FFFFFF">Click here to login</FONT></a>';
			
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
						
			echo "<FONT COLOR='BEFF54'>You haven't login!!!</FONT><p><br/>";
			echo '<a href="index.php"><FONT COLOR="FFFFFF">Click here to login</FONT></a>';
			
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
	
	$result = $mysqli->query("select * from user where login_name='$login_name'");
	$row = $result->fetch_object();
	
	$type = $row->type;
	$uid = $row->uid;
	

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
					<td><h2><b><FONT COLOR='BEFF54'>Welcome!</FONT></b><h2></td>
				</tr>
			
				<tr>
					<td><b><FONT COLOR='BEFF54'>You can use functions of this system now.</FONT></b></td>
				</tr>
				
				<tr>
				<tr/>
				
				<tr>
					<td><FONT COLOR='BEFF54'>You may though the menu at the left to:</FONT></td>
				</tr>
				
			</table>	
			
				<ul>
				
					<?php
						
						if($type=="u"){
							echo "<li>
						view the news of the hotel
					</li>
					<li>
						view the services which supported by hotel
					</li>
					<li>
						booking and maintain booking
					</li>
					<li>
						view the address of the hotel
					</li>
					<li>
						view the information of this system
					</li>
					<li>
						modify and view your own data
					</li>";
			}else{
				echo "<li>
						view the news of the hotel
					</li>
					<li>
						maintain the status of the services
					</li>
					<li>
						maintain the bookings
					</li>
					<li>
						view the address of the hotel
					</li>
					<li>
						view the information of this system
					</li>
					<li>
						view the user list of this system
					</li>
					<li>
						backup the booking in xml format
					</li>";
			}
			
					?>
					
					
		</div>
	
	</div>
	
</body>
</html>