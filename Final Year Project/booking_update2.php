<?php
	session_start();
?>
<html>
<head>

	<title>booking update</title>
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
	
	$bid = $_GET["bid"];
	
	$result2 = $mysqli->query("select * from book where bid='$bid'");
	$row2 = $result2->fetch_object();
	
	$re2 = $mysqli->query("select * from room where status='o' order by rid");
	
	$re6 = $mysqli->query("select * from room where status='o' order by rid");
	
	$rid= $row2->rid;
	$result8 = $mysqli->query("select * from room where rid='$rid'"); 
	$row8 = $result8->fetch_object();
	
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
			
			<b>Booking update:</b><br/><br/>
			
			You may modify the booking in this page.<br/><br/>
			
			<table>
				<form method="post" action="booking_modify3.php">
					
					<tr><td><FONT COLOR="BEFF54">Booking ID : </td><td><?php echo "<FONT COLOR='BEFF54'>".$row2->bid."</FONT>"; ?></FONT></td></tr>
					<tr><td><FONT COLOR="BEFF54">Select the room : </FONT></td>
					<td>
					
					<?php
					
						echo "<select name='room'>";
						
						while ($ro2 = $re2->fetch_object()){
							
							echo "<option value='".$ro2->room_number."'>".$ro2->room_number."</option>";
							
						}
						
						echo "</select><br/>";
						
						
					?>
					
					</td>
					<td> <FONT COLOR="BEFF54">(Now, the room number is <?php echo $row8->room_number ?>.)</FONT></td>
					</tr>
					
					<tr><td><FONT COLOR="BEFF54">Date for check in : </FONT></td><td><input type="date" name="date" min="<?=date('Y-m-d') ?>" value="<?=date('Y-m-d') ?>" max="<?=date('Y-m-d', strtotime("+30 day", time())) ?>" value="<?=date('Y-m-d')?>" required="required" />
					</td>
					<td> <FONT COLOR="BEFF54">(Now, the date is <?php echo $row2->check_in_date ?>.)</FONT></td>
					</tr>
					
					<tr><td><FONT COLOR="BEFF54">Extra services : </FONT></td>
					
					<?php
					
						$result9 = $mysqli->query("select * from extra_service where status='o' order by eid");
						
						while ($row9 = $result9->fetch_object()){
							
							echo "<tr><td></td><td><input type='checkbox' name='extra".$row9->eid."' value='".$row9->eid."' ";
							
							if(($row2->eid)>'0' && ($row9->eid)=='1'){
									echo "checked";
								}
								
							if(($row2->eid2)>'0' && ($row9->eid)=='2'){
									echo "checked";
								}
							
							if(($row2->eid3)>'0' && ($row9->eid)=='3'){
									echo "checked";
								}
								
							echo "><FONT COLOR='BEFF54'>".$row9->service_name."</FONT></td></tr>";
							
						}
						
						$mysqli->close();
						
					?>
					
						
										
					<tr><td><FONT COLOR="BEFF54">Number of people : </FONT></td><td><input type="number" name="number" min="1" max="5" value="<?php echo $row2->people; ?>" required="required" /></td></tr>
					<tr><td><input type="submit" name="update" value="update" /></td></tr>
					
					<input type="hidden" name="bid" value="<?php echo $row2->bid; ?>" />
					<input type="hidden" name="pay" value="<?php echo $row2->payment; ?>" />					
				</form>
			</table>
			
			<br/><br/>
			
			
				<br/>Click <a href="booking_day.php"><FONT COLOR="FFFFFF">here</FONT></a> to back to front page.
		</div>
		
	</div>
</body>
</html>