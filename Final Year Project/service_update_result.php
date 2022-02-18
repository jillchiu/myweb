<?php
	session_start();
?>
<html>
<head>

	<title>services' status</title>
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
	
	extract($_POST);
	
	if(($service)=="swimming" || ($service)=="spa" || ($service)=="buffet"){
		
		$result2 = $mysqli->query("update extra_service set status='$status' where service_name='$service'");
		
	}else{
		
		$result2 = $mysqli->query("update room set status='$status' where room_number='$service'");
		
	}
	
	
	
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
			
			<b>Modify result : </b><br/><br/>
			
			<?php
			
				if($result2){
					
					echo "Success to modify the status of ";
					
					if(($service)=="swimming" || ($service)=="spa" || ($service)=="buffet"){
					
						echo $service." service to be ";
					
					}else{
						
						echo "room ".$service." to be ";
						
					}
					
					if($status=="o"){
						echo "open!";
					}else{
						echo "close!";
					}
					
				}else{
					
					echo "Sorry, it is fail to modify the status.";
					
				}
				
				$mysqli->close();
				
			?>
				
			<br/><br/><br/>
			<a href="service_manager.php"><FONT COLOR="FFFFFF">Go back to front page</FONT></a>
		</div>
	
	</div>
</body>
</html>