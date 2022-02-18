<?php

	session_start();
	
	//Connect to the DB
	include("sql.php");
	$mysqli = ConnectDB();
	
	//Perform action
	extract($_POST); 
	
	$md5pass = md5($pass);
	
	//check is the id, email existed in the user table
	$result = $mysqli->query ("select * from user 
								where login_name = '$id' and password = '$md5pass'");
	
	if(isSet($id) && isSet($pass)){
	//if no user exists, display the login form again
		
		if (!$row = mysqli_fetch_array($result)){
		
			echo "<html>
						<head>

						<title>Login fail</title>
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
		
					echo "<FONT COLOR='BEFF54'>ID or password is incorrect, please confirm and enter again.</FONT><br/>";
				
					echo "<a href='index.php'><FONT COLOR='FFFFFF'>Back to front page</FONT></a>";
				
					echo "</div><hr>
	
						<div id='foot'>";
			
					include 'foot.php';
				
					echo "</div>
	
					</div>
					</body>
					</html>";
						
					$_SESSION['login'] = "false";
					
		
		} 
	//if user exists, login and go to main page
		else { 
		
			$row2 = $result->fetch_object();
		
			$_SESSION['login'] = "true";
		
			$_SESSION['login_name'] = $id;
			$_SESSION['pass'] = $pass;
		
			$_SESSION['type'] = $row->type;
		
			header('Location:main.php');
		
			
		
		
		
		}
	}else{
		
		echo "<html>
						<head>

						<title>Login fail</title>
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
						
			echo "<FONT COLOR='BEFF54'>Please enter ID and password to login.</FONT><br/>";
		
			echo "<a href='index.php'><FONT COLOR='FFFFFF'>Back to front page</FONT></a>";
		
			echo "</div><hr>
	
						<div id='foot'>";
			
				include 'foot.php';
				
			echo "</div>
	
					</div>
					</body>
					</html>";
					
			$_SESSION['login'] = "false";
			
	}
	
	$mysqli->close();
	
?>
	