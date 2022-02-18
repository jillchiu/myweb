<?php
	session_start();
?>
<html>
<head>

	<title>Booking result</title>
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
	
	
	$room = $_POST["room"];
	$date = $_POST["date"];
	
	if(isset($_POST["extra1"])){
		$extra1 = $_POST["extra1"];
	}else{
		$extra1 = '0';
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
	
	//checking
	if($room == '2'){
		
		$res1 = $mysqli->query("select * from book where rid='1' and check_in_date='$date'");
		if(!$rr1 = mysqli_fetch_array($res1)){
			$r1 = '0';
		}else{
			$r1 = '1';
		}
		$res2 = $mysqli->query("select * from book where rid='2' and check_in_date='$date'");
		if(!$rr2 = mysqli_fetch_array($res2)){
			$r2 = '0';
		}else{
			$r2 = '1';
		}
		$res3 = $mysqli->query("select * from book where rid='3' and check_in_date='$date'");
		if(!$rr3 = mysqli_fetch_array($res3)){
			$r3 = '0';
		}else{
			$r3 = '1';
		}
		$res4 = $mysqli->query("select * from book where rid='4' and check_in_date='$date'");
		if(!$rr4 = mysqli_fetch_array($res4)){
			$r4 = '0';
		}else{
			$r4 = '1';
		}
		$res5 = $mysqli->query("select * from book where rid='5' and check_in_date='$date'");
		if(!$rr5 = mysqli_fetch_array($res5)){
			$r5 = '0';
		}else{
			$r5 = '1';
		}
		/*
		$res = $mysqli->query("select rid from book where (rid='1' or rid='2' or rid='3' or rid='4' or rid='5') and check_in_date='$date'");
		$r1 = '0';
		$r2 = '0';
		$r3 = '0';
		$r4 = '0';
		$r5 = '0';
		
		while($rr = $res->fetch_object()){
			$rd = $rr->rid;
			
			if($rd = '1'){
				$r1 = '1';
				break;
			}elseif($rd = '2'){
				$r2 = '1';
				break;
			}elseif($rd = '3'){
				$r3 = '1';
				break;
			}elseif($rd = '4'){
				$r4 = '1';
				break;
			}elseif($rd = '5'){
				$r5 = '1';
				break;
			}
		}*/
	}else{
		
		$res6 = $mysqli->query("select * from book where rid='6' and check_in_date='$date'");
		if(!$rr6 = mysqli_fetch_array($res6)){
			$r6 = '0';
		}else{
			$r6 = '1';
		}
		$res7 = $mysqli->query("select * from book where rid='7' and check_in_date='$date'");
		if(!$rr7 = mysqli_fetch_array($res7)){
			$r7 = '0';
		}else{
			$r7 = '1';
		}
		$res8 = $mysqli->query("select * from book where rid='8' and check_in_date='$date'");
		if(!$rr8 = mysqli_fetch_array($res8)){
			$r8 = '0';
		}else{
			$r8 = '1';
		}
		$res9 = $mysqli->query("select * from book where rid='9' and check_in_date='$date'");
		if(!$rr9 = mysqli_fetch_array($res9)){
			$r9 = '0';
		}else{
			$r9 = '1';
		}
		$res10 = $mysqli->query("select * from book where rid='10' and check_in_date='$date'");
		if(!$rr10 = mysqli_fetch_array($res10)){
			$r10 = '0';
		}else{
			$r10 = '1';
		}
		/*
		$res2 = $mysqli->query("select uid from book where (rid='6' or rid='7' or rid='8' or rid='9' or rid='10') and check_in_date='$date'");
		$r6 = '0';
		$r7 = '0';
		$r8 = '0';
		$r9 = '0';
		$r10 = '0';
		
		while($rr2 = $res2->fetch_object()){
			$rd2 = $rr2->rid;
			
			if($rd2 = '6'){
				$r6 = '1';
				break;
			}elseif($rd2 = '7'){
				$r7 = '1';
				break;
			}elseif($rd2 = '8'){
				$r8 = '1';
				break;
			}elseif($rd2 = '9'){
				$r9 = '1';
				break;
			}elseif($rd2 = '10'){
				$r10 = '1';
				break;
			}
		}*/
	}
	
	//$result2 = $mysqli->query("select * from room where room_number='$room'");
	//$row2 = $result2->fetch_object();
	
	//$rid = $row2->rid;
	
	if($room == '2'){
		$t_price= '200';
	}else{
		$t_price= '400';
	}
	
	if($extra1>'0'){
		$t_price += ('30');
	}
	
	if($extra2>'0'){
		$t_price += ('50');
	}
	
	if($extra3>'0'){
		$t_price += ('60');
	}
	
	//check
	//$result3 = $mysqli->query("select uid from book where rid='$rid' and check_in_date='$date'");
	
	
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
			
			<b>Booking result:</b><br/><br/>
			
				<?php
					
					$fi1 = $mysqli->query("select status from room where rid='1'");
					$fc1 = $fi1->fetch_object();
					$st1 = $fc1->status;
					
					$fi2 = $mysqli->query("select status from room where rid='2'");
					$fc2 = $fi2->fetch_object();
					$st2 = $fc2->status;
					
					$fi3 = $mysqli->query("select status from room where rid='3'");
					$fc3 = $fi3->fetch_object();
					$st3 = $fc3->status;
					
					$fi4 = $mysqli->query("select status from room where rid='4'");
					$fc4 = $fi4->fetch_object();
					$st4 = $fc4->status;
					
					$fi5 = $mysqli->query("select status from room where rid='5'");
					$fc5 = $fi5->fetch_object();
					$st5 = $fc5->status;
					
					$fi6 = $mysqli->query("select status from room where rid='6'");
					$fc6 = $fi6->fetch_object();
					$st6 = $fc6->status;
					
					$fi7 = $mysqli->query("select status from room where rid='7'");
					$fc7 = $fi7->fetch_object();
					$st7 = $fc7->status;
					
					$fi8 = $mysqli->query("select status from room where rid='8'");
					$fc8 = $fi8->fetch_object();
					$st8 = $fc8->status;
					
					$fi9 = $mysqli->query("select status from room where rid='9'");
					$fc9 = $fi9->fetch_object();
					$st9 = $fc9->status;
					
					$fi10 = $mysqli->query("select status from room where rid='10'");
					$fc10 = $fi10->fetch_object();
					$st10 = $fc10->status;
					
					if($room == '2'){
						if($r1 == '0' && $st1 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '1', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 2a for $date.</FONT>";
						}elseif($r2 == '0' && $st2 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '2', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 2b for $date.</FONT>";
						}elseif($r3 == '0' && $st3 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '3', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 2c for $date.</FONT>";
						}elseif($r4 == '0' && $st4 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '4', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 2d for $date.</FONT>";
						}elseif($r5 == '0' && $st5 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '5', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 2e for $date.</FONT>";
						}else{
							
							echo "<FONT COLOR='00FFFF'>Sorry, 2 people rooms are all booked at $date.</FONT>";
						
						}
					}else{
						if($r6 == '0' && $st6 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '6', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 4a for $date.</FONT>";
						}elseif($r7 == '0' && $st7 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '7', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 4b for $date.</FONT>";
						}elseif($r8 == '0' && $st8 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '8', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 4c for $date.</FONT>";
						}elseif($r9 == '0' && $st9 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '9', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 4d for $date.</FONT>";
						}elseif($r10 == '0' && $st10 == 'o'){
							date_default_timezone_set('Hongkong');
						
							$record = date("y-m-d h:i:s");
						
							$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '10', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
							echo "<FONT COLOR='00FFFF'>You have success to booking room 4e for $date.</FONT>";
						}else{
							
							echo "<FONT COLOR='00FFFF'>Sorry, 4 people rooms are all booked at $date.</FONT>";
						
						}
					}
					/*
					if(!$row3 = mysqli_fetch_array($result3)){
						
						date_default_timezone_set('Hongkong');
						
						$record = date("y-m-d h:i:s");
						
						$result4 = $mysqli->query("insert into book 
													values ('', '$uid', '$rid', '$extra1', '$extra2', '$extra3', '$date', '$record', '$number', '$t_price', 'n')"); 
						
						echo "<FONT COLOR='BEFF54'>You have success to booking.</FONT>";
						
					}else{
						
						echo "<FONT COLOR='BEFF54'>Sorry, ".$date." for room ".$room." has been booked, please select another room or date. It is suggested to check the status of room before submit.</FONT>";
						
					}*/
					
					$mysqli->close();
					
				?>
			<br/><br/>
			You can click <a href="booking.php"><FONT COLOR="FFFFFF">here</FONT></a> to booking another room.<br/>
			Or<br/>
			You can click <a href="book_record.php"><FONT COLOR="FFFFFF">here</FONT></a> to check the booking record.
			
		</div>
		
	</div>
</body>
</html>