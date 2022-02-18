<?php
	session_start();

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
	
	
	$name = $_POST["name"];
	$pass2 = $_POST["pass"];
	
	//Connect to the DB
	include("sql.php");
	$mysqli = ConnectDB();
	
	$result3 = $mysqli->query("select type from user where login_name='$login_name'");
	$row = $result3->fetch_object();
	
	$type = $row->type;
	
	//update the user data in the database
	if($pass2<>""){
	
		if($name<>""){
			
			$_SESSION['pass'] = $pass2;
			
			$md5pass = md5($pass2);
			
			$result = $mysqli->query ("update user 
										set password='$md5pass', real_name='$name'
										where login_name='$login_name'");
		
		}else{
			
			$_SESSION['pass'] = $pass2;
			
			$md5pass = md5($pass2);
			
			$result = $mysqli->query ("update user 
										set password='$md5pass'
										where login_name='$login_name'");
			
		}
		
	}else{
		
		if($name<>""){
			
			$result = $mysqli->query ("update user 
										set real_name='$name'
										where login_name='$login_name'");
		
		}else{
			
			$result2 = "nothing to do";
		
		}
	}
	
?>

<html>
<head>

	<title>update result</title>
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
		
			<?php
	
				if ($result){
					echo "<h2><FONT COLOR='BEFF54'>User Update Success!</FONT></h2><p>";
				}else{
					echo "<FONT COLOR='BEFF54'>User Update Failed</FONT><p>";
				}
		
				$mysqli->close();
	
			?>
		<br/><a href="user.php"><FONT COLOR="FFFFFF">Back to User Profile</FONT></a>
		
		</div>
	
	</div>
</body>
</html>
