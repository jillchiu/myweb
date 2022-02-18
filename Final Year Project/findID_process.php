<?php

	session_start();
	
	//Connect to the DB
	include("sql.php");
	$mysqli = ConnectDB();
	
	//Perform action
	extract($_POST); 
	
	//find id from name and email
	$result = $mysqli->query ("select login_name from user 
								where real_name = '$name' and mail = '$mail'");
	
	if(isSet($name) && isSet($mail)){
		
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
						
			echo "<FONT COLOR='BEFF54'>Your ID is</FONT> <FONT COLOR='FFFFFF'><b>".$row->login_name."</FONT></b><br/><br/>";
			echo "<FONT COLOR='BEFF54'>Please record it and you can click <a href='index.php'>here</a> to login.</FONT>";
			
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
						
			echo "<FONT COLOR='BEFF54'>No any ID can be found by data you entered, please check data you entered are corrected.</FONT><br/>";
		
			echo "<a href='forget.php'><FONT COLOR='FFFFFF'>Back to front page</FONT></a>";
		
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
						
			echo "<FONT COLOR='BEFF54'>Please enter your real name and email address to find your ID.</FONT><br/>";
		
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