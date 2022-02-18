<?php
	session_start();
?>
<html>
<head>

	<title>booking page</title>
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
	
	//$result2 = $mysqli->query("select * from sport where status='o' order by sid");
	$result2 = $mysqli->query("select * from room where status='o' order by rid");
	
	$result6 = $mysqli->query("select * from room where status='o' order by rid");
	
	$result3 = $mysqli->query("select * from extra_service where status='o' order by eid");
	
	//$mysqli->close();
	
	extract($_GET); 
					
					if(isset($check)) { // $calc exists as a variable 
						//$prod = $x + $y; 
						$result4 = $mysqli->query("select * from room where room_number='$room'");
						$row3 = $result4->fetch_object();
						$rid = $row3->rid;
						
						$result5 = $mysqli->query("select * from book where rid='$rid' order by check_in_date");
						$result7 = $mysqli->query("select * from book where rid='$rid' order by check_in_date");
						
						/*if(!$row4 = mysqli_fetch_array($result5)){
							$output = "Room ".$room." has not any booking record.";
						}else{
							
							$output="Following date of ".$room." has been booked: <br/>";
							while ($row6 = $result7->fetch_object()){
								$output = "Room ".$room." has been booked at ".$row6->check_in_date.".<br/>";
							}
							
						}*/
							
						
						
						/*if(isset($result5)){
							$output = "";
							
							while ($row4 = $result5->fetch_object()){
								$output += "Room ".$room." has been booked at ".$row4->check_in_date.".<br/>";
							}
							
						}else{
							$output = "Room ".$room." has not any booking record.";
						}*/
						
						
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
			
			<b>Please select and fill in all columns:</b><br/><br/>
			
				<table>
				<form action="booking_result2.php" method="post">
				
				<?php
				
					/*extract($_GET); 
	
					abstract class ans {
    
						public abstract function resu();
					}
	
					class proc extends ans {
   
						private $room;
		
						public function __construct($room) {
							$this->room =$room;
						}

						public function resu() {
							if(($this->op)=='1'){
							return $this->x + $this->y;
							}
						}
		
					}
				
					*/
					
					
					
				?>
				
				
					<tr><td>Select the room : </td>
					<td>
					
					<?php
					
						echo "<select name='room'>";
						
						while ($row2 = $result2->fetch_object()){
							
							echo "<option value='".$row2->room_number."'>".$row2->room_number."</option>";
							
						}
						
						echo "</select><br/>";
						
					?>
					
					<?php
					/*
					<option value='a'>2a</option>
										<option value='2b'>2b</option>
										<option value='2c'>2c</option>
										<option value='2d'>2d</option>
										<option value='2e'>2e</option>
										<option value='4a'>4a</option>
										<option value='4b'>4b</option>
										<option value='4c'>4c</option>
										<option value='4d'>4d</option>
										<option value='4e'>4e</option>
					</select>
					*/
					?>
					
					
					</td>
					</tr>
				
					
					
					<?php
					
						/*echo "<select name='sport'>";
						
						while ($row2 = $result2->fetch_object()){
							
							echo "<option value='".$row2->sport_name."'>".$row2->sport_name."</option>";
							
						}
						
						echo "</select><br/>";
						*/
					?>
					
					<FONT COLOR="FF0000">**2 means 2 peoples room, a is the room number. eg. 2a-> number a of the 2 peoples room
					
					<tr><td>Date for check in : </td><td><input type="date" name="date" min="<?=date('Y-m-d') ?>" value="<?=date('Y-m-d') ?>" max="<?=date('Y-m-d', strtotime("+30 day", time())) ?>" value="<?=date('Y-m-d')?>" required="required" /></td></tr>
					
					<?php
					//<tr><td>Time : </td><td><input type="number" name="time" min="10" max="20" required="required" />(1hour from xx:00 which you entered)(Time you can selected is 10:00-20:00)</td></tr>
					
					
					//<tr><td>Days expected to live : </td><td><input type="number" name="day" min="1" max="30" /></td></tr>
					?>

					<tr><td>Extra services : </td></tr>
										<?php //<input type="hidden" name="extra3" value="0"> ?>
					
					<?php
					
						$result9 = $mysqli->query("select * from extra_service where status='o' order by eid");
						
						while ($row9 = $result9->fetch_object()){
							
							echo "<tr><td></td><td><input type='checkbox' name='extra".$row9->eid."' value=".$row9->eid.">".$row9->service_name."</td></tr>";
							
						}
						
						$mysqli->close();
						
					?>
					
					<tr><td>Number of people : </td><td><input type="number" name="number" min="1" max="5" required="required" /></td></tr>
					<tr><td><input type="submit" name="submit" value="book" /></td></tr>
					
					
				
				</form>
				</table>
				
				<form method="get" action="<?php print $_SERVER['PHP_SELF']; ?>"> 
				<table>
				<tr><td><FONT COLOR="F7FF00">Select to check the room status: </FONT></td>
					<td>
					
					<?php
					
						echo "<select name='room'>";
						
						while ($row5 = $result6->fetch_object()){
							
							echo "<option value='".$row5->room_number."'>".$row5->room_number."</option>";
							
						}
						
						echo "</select><br/>";
						
					?>
					</td>
					<td>
					<input type="submit" name="check" value="check"/> 
					</td>
					</tr>
					</table>
				</form>
				
				<?php 
				
					/*if(isset($check)) { 
						$c = new proc($room);
						
						if(($op)=='1'){
							echo $x."+".$y."=".$c->resu();
						}
		
					}
					*/
					
					if(isset($check)) { 
					
						if(!$row4 = mysqli_fetch_array($result5)){
							$output = "<FONT COLOR='F7FF00'>Room ".$room." has not any booking record.</FONT>";
							print $output; 
						}else{
							
							while ($row6 = $result7->fetch_object()){
								$output = "<FONT COLOR='F7FF00'>Room ".$room." has been booked at ".$row6->check_in_date.".</FONT><br/>";
								print $output; 
							}
							
					}
					}
					
				?> 
				
		</div>
		
	</div>
</body>
</html>