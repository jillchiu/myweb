<?php
	session_start();
?>
<html>
<head>

	<title>booking records</title>
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
	
	extract($_GET); 
					
	if(isset($search)) { 
						
		$result4 = $mysqli->query("select * from book where check_in_date='$date' order by rid");
	
		$result5 = $mysqli->query("select * from book where check_in_date='$date' order by rid");
	
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
			
		<form method="get" action="<?php print $_SERVER['PHP_SELF']; ?>"> 
		
				<table>
				<tr><td><FONT COLOR="F7FF00">Select the date to check the booking: </FONT></td>
					<td><input type="date" name="date" min="<?=date('Y-m-d') ?>" value="<?=date('Y-m-d') ?>" max="<?=date('Y-m-d', strtotime("+30 day", time())) ?>" value="<?=date('Y-m-d')?>" required="required" /></td></tr>
				<tr><td>	
					<input type="submit" name="search" value="search"/> 
					</td>
					</tr>
					</table>
					
		</form>	
		
				
				
				
				<?php 
					
					if(isset($search)) { 
					
						if(!$row4 = mysqli_fetch_array($result5)){
							
							$output = "<FONT COLOR='F7FF00'>".$date." has not any booking record.</FONT><br/><br/>";
							print $output; 
							
						}else{
							echo "<FONT COLOR='F7FF00'>Booking records for the ".$date.".</FONT><br/>";
							echo "<table width='700'>
					<tr>
					<td bgcolor='#003366'><span style='color:yellow'>Booking ID </span></td>
					<td bgcolor='#003366'><span style='color:yellow'>User ID </span></td>
					<td bgcolor='#003366'><span style='color:yellow'>Room number </span></td>
					<td bgcolor='#003366'><span style='color:yellow'>Swimming pool </span></td>
					<td bgcolor='#003366'><span style='color:yellow'>Spa </span></td>
					<td bgcolor='#003366'><span style='color:yellow'>Buffet </span></td>
					<td bgcolor='#003366'><span style='color:yellow'>Date to check in</span></td>
					<td bgcolor='#003366'><span style='color:yellow'>Booked at</span></td>
					<td bgcolor='#003366'><span style='color:yellow'>Number of people</span></td>
					<td bgcolor='#003366'><span style='color:yellow'>Paid</span></td>
					</tr>";
					
							while ($row6 = $result4->fetch_object()){
								
								
					
								echo "<tr><td><FONT COLOR='BEFF54'>".$row6->bid."</FONT></td>";
						
								echo "<td><FONT COLOR='BEFF54'>".$row6->uid."</FONT></td>";
						
						$result8 = $mysqli->query("select room_number from room where rid='".$row6->rid."'");
						$row8 = $result8->fetch_object();
						
						echo "<td><FONT COLOR='BEFF54'>".$row8->room_number."</FONT></td>";
						
						if(($row6->eid)>'0'){
							echo "<td><FONT COLOR='BEFF54'>yes</FONT></td>";
						}else{
							echo "<td><FONT COLOR='BEFF54'>no</FONT></td>";
						}
						
						if(($row6->eid2)>'0'){
							echo "<td><FONT COLOR='BEFF54'>yes</FONT></td>";
						}else{
							echo "<td><FONT COLOR='BEFF54'>no</FONT></td>";
						}
						
						if(($row6->eid3)>'0'){
							echo "<td><FONT COLOR='BEFF54'>yes</FONT></td>";
						}else{
							echo "<td><FONT COLOR='BEFF54'>no</FONT></td>";
						}
							
						echo "<td><FONT COLOR='BEFF54'>".$row6->check_in_date."</FONT></td>
								<td><FONT COLOR='BEFF54'>".$row6->book_date."</FONT></td>
								<td><FONT COLOR='BEFF54'>".$row6->people."</FONT></td>";
						
						if(($row6->payment)=="y"){
							echo "<td><FONT COLOR='BEFF54'>yes</FONT></td></tr>";
						}else{
							echo "<td><FONT COLOR='BEFF54'>no</FONT></td></tr>";
							
						}
								
							}
							
						echo "</table><br/>";
							
					}
					}
					$mysqli->close();
				?> 
				
				Click <a href="book_manager.php"><FONT COLOR="FFFFFF">here</FONT></a> to back to front page.
		</div>
	
	</div>
</body>
</html>