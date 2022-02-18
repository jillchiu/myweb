<?php
	session_start();
?>
<html>
<head>

	<title>all booking records</title>
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
	
	$result2 = $mysqli->query("select * from book order by check_in_date");
	
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
			
			<b>Booking records:</b><br/><br/>
			
				<table width='700'>
					<tr>
					<td bgcolor="#003366"><span style="color:yellow">Booking ID </span></td>
					<td bgcolor="#003366"><span style="color:yellow">User ID </span></td>
					<td bgcolor="#003366"><span style="color:yellow">Room number </span></td>
					<td bgcolor="#003366"><span style="color:yellow">Swimming pool </span></td>
					<td bgcolor="#003366"><span style="color:yellow">Spa </span></td>
					<td bgcolor="#003366"><span style="color:yellow">Buffet </span></td>
					<td bgcolor="#003366"><span style="color:yellow">Date to check in</span></td>
					<td bgcolor="#003366"><span style="color:yellow">Booked at</span></td>
					<td bgcolor="#003366"><span style="color:yellow">Number of people</span></td>
					<td bgcolor="#003366"><span style="color:yellow">Paid</span></td>
					<td bgcolor="#003366"><span style="color:yellow">Update</span></td>
					<td bgcolor="#003366"><span style="color:yellow">Delete</span></td>
					</tr>
					
				<?php
					
					while($row2 = $result2->fetch_object()){
						
						echo "<tr><td><FONT COLOR='BEFF54'>".$row2->bid."</FONT></td>";
						
						echo "<td><FONT COLOR='BEFF54'>".$row2->uid."</FONT></td>";
						
						$result3 = $mysqli->query("select room_number from room where rid='".$row2->rid."'");
						$row3 = $result3->fetch_object();
						
						echo "<td><FONT COLOR='BEFF54'>".$row3->room_number."</FONT></td>";
						
						if(($row2->eid)>'0'){
							echo "<td><FONT COLOR='BEFF54'>yes</FONT></td>";
						}else{
							echo "<td><FONT COLOR='BEFF54'>no</FONT></td>";
						}
						
						if(($row2->eid2)>'0'){
							echo "<td><FONT COLOR='BEFF54'>yes</FONT></td>";
						}else{
							echo "<td><FONT COLOR='BEFF54'>no</FONT></td>";
						}
						
						if(($row2->eid3)>'0'){
							echo "<td><FONT COLOR='BEFF54'>yes</FONT></td>";
						}else{
							echo "<td><FONT COLOR='BEFF54'>no</FONT></td>";
						}
							
						echo "<td><FONT COLOR='BEFF54'>".$row2->check_in_date."</FONT></td>
								<td><FONT COLOR='BEFF54'>".$row2->book_date."</FONT></td>
								<td><FONT COLOR='BEFF54'>".$row2->people."</FONT></td>";
						
						if(($row2->payment)=="y"){
							echo "<td><FONT COLOR='BEFF54'>yes</FONT></td>";
						}else{
							echo "<td><FONT COLOR='BEFF54'>no</FONT></td>";
							
						}
						
						echo "<td><a href=booking_update2.php?bid=".$row2->bid." ><FONT COLOR='FFFFFF'>Edit</FONT></a></td>";
						echo "<td><a href=booking_delete2.php?bid=".$row2->bid." ><FONT COLOR='FFFFFF'>Delete</FONT></a></td></tr>";
						
					}
					
					$mysqli->close();
				?>
				
				</table><br/>
				
				Click <a href="book_manager.php"><FONT COLOR="FFFFFF">here</FONT></a> to back to front page.
		</div>
	
	</div>
</body>
</html>