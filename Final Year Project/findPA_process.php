<?php

	session_start();
	
	//Connect to the DB
	include("sql.php");
	$mysqli = ConnectDB();
	
	//Perform action
	extract($_POST); 
	
	//find id from id and name
	$result = $mysqli->query ("select password from user 
								where real_name = '$name' and login_name = '$id'");
	
	if(isset($update)){
	
		$md5pass = md5($pass);
		
		$result2 = $mysqli->query("update user set password='$md5pass' where login_name = '$login_name'");	
	
		header('Location:index.php');
		
	}
	
	if(isSet($name) && isSet($id)){
		
		if ($result->num_rows > 0){
		
			$row = $result->fetch_object();
		
			echo "<html>
						<head>

						<title>Success</title>
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
						
			echo "<FONT COLOR='BEFF54'>Please enter the new password : </FONT><form action='findPA_process.php' method='post'>
			<input type='password' name='pass' required='required' /><br/>
			<input type='hidden' name='login_name' value='$id' /><br/>";
			echo "<input type='submit' name='update' value='update' /></form>";
			
			echo "</div><hr>
	
						<div id='foot'>";
			
				include 'foot.php';
				
			echo "</div>
	
					</div>
					</body>
					</html>";
					
		
		}else {
		
			echo "<html>
						<head>

						<title>Fail</title>
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
						
			echo "<FONT COLOR='BEFF54'>ID and name are not correct or match, hence no password can be found.</FONT><br/>";
			echo "<FONT COLOR='FFFFFF'>You may click <a href='forget.php'>here</a> to try again or <a href='index.php'>here</a> to login.</FONT>";
			
			echo "</div><hr>
	
						<div id='foot'>";
			
				include 'foot.php';
				
			echo "</div>
	
					</div>
					</body>
					</html>";
			
		}
		
	}else{
		
		echo "<html>
						<head>

						<title>Fail</title>
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
						
			echo "<FONT COLOR='BEFF54'>Please enter your real name and user ID to find your password.</FONT><br/>";
		
			echo "<a href='forget.php'><FONT COLOR='FFFFFF'>Back to front page</FONT></a>";
		
			echo "</div><hr>
	
						<div id='foot'>";
			
				include 'foot.php';
				
			echo "</div>
	
					</div>
					</body>
					</html>";
					
	}
	
	$mysqli->close();
	
?>