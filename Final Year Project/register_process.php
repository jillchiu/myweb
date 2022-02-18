<?php

	session_start();
	
	//Connect to the DB
	include("sql.php");
	$mysqli = ConnectDB();
	
	//Perform action
	extract($_POST); 

	/*
	$id;
	$name;
	$pass;
	$pass2;
	$sex;
	$mail;
	*/
	
	//check is the id existed in the user table
	$result = $mysqli->query ("select * from user 
								where login_name = '$id'");
	
	//check is the email existed in the user table
	$result2 = $mysqli->query ("select * from user 
								where mail = '$mail'");
								
	/*
	//if not exists, executed register
	if ((!$row = mysqli_fetch_array($result)) && (!$row2 = mysqli_fetch_array($result2)) && (($pass).equal(($pass2)))) { 
	
		$_SESSION['login'] = "true";
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
		
		$result3 = $mysqli->query ("insert into user
									values ('$id', '$name', '$pass', '$sex', '$mail')");
		
		echo "You have successfully register !";
		
	} 
	//if exists, back to register page
	else { 
		
		echo "<html>\n<head>\n<title>nil</title>";
       	echo "<meta http-equiv=\"refresh\" content=\"0; ";
       	echo "URL=index.php\">\n";
       	echo "</head>\n </html>";
		
		$_SESSION['login'] = "false";
		
	}
	
	*/
	
	//check ID
	if(isSet($id) && isSet($name) && isSet($pass) && isSet($pass2) && isSet($sex) && isSet($mail)){
		if (!$row = mysqli_fetch_array($result)){
			
			//check email
			if (!$row2 = mysqli_fetch_array($result2)){
				
				//check passwords		
				if(($pass)==($pass2)){ 
	
					$_SESSION['login'] = "true";
				
					$_SESSION['type'] = "u";
					$_SESSION['login_name'] = $id;
					$_SESSION['pass'] = $pass;
		
					$md5pass = md5($pass);
					
					$result3 = $mysqli->query ("insert into user
											values ( '', '$id', '$name', '$md5pass', '$sex', '$mail', 'u')");
		
					header('Location:main.php');
				
				} else {
					
					echo "<html>
						<head>

						<title>Register fail</title>
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
		
					echo "<FONT COLOR='BEFF54'>Passwords that you entered are not same, please confirm and enter again.</FONT><br/>";
				
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
			
			}else {
			
				echo "<html>
						<head>

						<title>Register fail</title>
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
						
				echo "<FONT COLOR='BEFF54'>Email that you entered are existed, please enter another Email Address.</FONT><br/>";
			
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
			
		}else {
		
			echo "<html>
						<head>

						<title>Register fail</title>
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
						
			echo "<FONT COLOR='BEFF54'>ID that you entered is existed, please enter another ID.</FONT><br/>";
		
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
	}else{
		
		echo "<html>
						<head>

						<title>Register fail</title>
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
						
			echo "<FONT COLOR='BEFF54'>Sorry, register fail since you haven't fill in all fills. Please ensure fill in all fills in register table.</FONT><br/>";
		
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