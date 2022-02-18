<?php
	session_start();
?>
<html>
<head>

	<title>booking modify result</title>
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
	
	$result = $mysqli->query("select * from user where login_name='$login_name'");
	$row = $result->fetch_object();
	
	$type = $row->type;
	$uid = $row->uid;
	
	
	$bid = $_POST["bid"];
	$room = $_POST["room"];
	
	$date = $_POST["date"];
	
	if(isset($_POST["extra1"])){
		$extra = $_POST["extra1"];
	}else{
		$extra = '0';
	}
	
	if(isset($_POST["extra2"])){
		$extra2 = $_POST["extra2"];
	}else{
		$extra2 = '0';
	}
	
	if(isset($_POST["extra3"])){
		$extra3 = $_POST["extra3"];
	}else{
		$extra3 = '0';
	}
	
	$number = $_POST["number"];
	
	$pay = $_POST["pay"];
	
	$result2 = $mysqli->query("select * from room where room_number='$room'");
	$row2 = $result2->fetch_object();
	
	$rid = $row2->rid;
	
	$t_price= $row2->price;
	
	if($extra>'0'){
		$t_price += ('30');
	}
	
	if($extra2>'0'){
		$t_price += ('50');
	}
	
	if($extra3>'0'){
		$t_price += ('60');
	}
	
	//check
	$result3 = $mysqli->query("select uid from book where rid='$rid' and check_in_date='$date'");
	
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
			
			<b><FONT COLOR='BEFF54'>Booking modify result :</FONT></b><br/><br/>
			
			<?php
			
				if(!$row3 = mysqli_fetch_array($result3)){
						
						$result4 = $mysqli->query("update book set rid='$rid', eid='$extra', eid2='$extra2', eid3='$extra3', check_in_date='$date', people='$number', total_price='$t_price' where bid='$bid'");
					
						echo "<FONT COLOR='BEFF54'>You have success to modify the booking.</FONT><br/>";
						echo "<FONT COLOR='BEFF54'>You can click <a href='book_record.php' /><FONT COLOR='FFFFFF'>here</FONT></a> to view the booking record.</FONT>";
						
					}else{
						
						$result5 = $mysqli->query("select * from book where rid='$rid' and check_in_date='$date'");
						
						$row4 = $result5->fetch_object();
	
						$checkid = $row4->uid;
						
						$delete = $row4->bid;
						
						if(($checkid)==($uid)){
							
							$result4 = $mysqli->query("update book set rid='$rid', eid='$extra', eid2='$extra2', eid3='$extra3', check_in_date='$date', people='$number', total_price='$t_price' where bid='$bid'");
							
							$result7 = $mysqli->query("delete from book where bid='$delete'");
							
							echo "<FONT COLOR='BEFF54'>You have success to modify the booking.</FONT><br/>";
							echo "<FONT COLOR='BEFF54'>You can click <a href='book_record.php' /><FONT COLOR='FFFFFF'>here</FONT></a> to view the booking record.</FONT>";
						
						}else{
							
							echo "<FONT COLOR='BEFF54'>Sorry, ".$date." for room ".$room." has been booked, please select another room or date.</FONT><br/>";
							echo "<FONT COLOR='BEFF54'>You can click <a href=booking_update.php?bid=".$bid." ><FONT COLOR='FFFFFF'>here</FONT></a> to back to front page.</FONT>";
						
						}
						
					}
					
				$mysqli->close();
				
			?>
			
		</div>
	
	</div>
</body>
</html>