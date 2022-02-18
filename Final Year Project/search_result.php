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
	//$type = $_SESSION['type'];
	
	//Connect to the DB
	include("sql.php");
	$mysqli = ConnectDB();
	
	$result = $mysqli->query("select type from user where login_name='$login_name'");
	$row = $result->fetch_object();
	
	$type = $row->type;
	
	
	//Perform action
	extract($_POST); 
	
	//find id from name and email
	
	$result2 = $mysqli->query ("select * from room
								where room_number like '%$name%'");
	
?>
<html>
<head>

	<title>search result</title>
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
			<b><FONT COLOR='BEFF54'>Searching result for key word "</FONT><FONT COLOR="00FFFF"><?php echo $name; ?></FONT><FONT COLOR='BEFF54'>" : </FONT></b><br/><br/>
			<table>
				
				<?php
					
					if (($result2->num_rows) > 0){
		
						while($row2 = $result2->fetch_object()){
		
							$rid = $row2->rid;
							
							$st = $row2->status;
							
							$rn = $row2->room_number;
							
							if(($st)=="o"){
								echo "<tr><td><FONT COLOR='BEFF54'>Room ".$rn." is accept booking now.</FONT></td></tr>";
							}else{
								echo "<tr><td><FONT COLOR='BEFF54'>Sorry, room ".$rn." is not accept booking now.</FONT></td></tr>";
							}
							
							$re = $mysqli->query ("select * from book
										where rid='$rid'");
							
							if (($re->num_rows) > 0){
			
								echo "<tr><td><FONT COLOR='BEFF54'>Following date for room ".$rn." has been booked.</FONT></td></tr>";
								
								while($ro2 = $re->fetch_object()){
								
									echo "<tr><td><FONT COLOR='#00FFFF'>".$ro2->check_in_date."</FONT></td></tr>";
								
								}
							}else{
								
								echo "<tr><td><FONT COLOR='BEFF54'>Room ".$rn." has not any booking record.</FONT></td></tr>";
								
							}
							
							echo "<tr><td></td></tr><tr><td></td></tr>";
						}
		
					}else {
		
						echo "<tr><td><FONT COLOR='BEFF54'>No any related room can be found, please enter another keyword.</FONT></td></tr>";
						
					}
					
					$mysqli->close();
				?>
				
			</table>
			
		</div>
	
	</div>
</body>
</html>