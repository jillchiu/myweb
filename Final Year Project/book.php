<?php
	session_start();
?>
<html>
<head>

	<title>Booking related</title>
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
			
			<ul> 
			
				<li>
					<a href="booking.php"><FONT COLOR="BEFF54">Booking services</FONT></a>
				</li>
				<li>
					<a href="book_record.php"><FONT COLOR="BEFF54">View and modify the booking record</FONT></a>
				</li>
				
			</ul>
		
		</div>
		
	</div>
</body>
</html>