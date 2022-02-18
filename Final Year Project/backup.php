<?php
	session_start();
?>
<html>
<head>

	<title>backup</title>
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
						
			echo "<FONT COLOR='BEFF54'>You haven't login!!!</FONT><p><br/>";
			echo '<a href="index.php"><FONT COLOR="FFFFFF">Click here to login</FONT></a>';
			
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
						
			echo "<FONT COLOR='BEFF54'>You haven't login!!!</FONT><p><br/>";
			echo '<a href="index.php"><FONT COLOR="FFFFFF">Click here to login</FONT></a>';
			
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
			
				<table>
				<tr>
					<td><b><FONT COLOR='BEFF54'>Click the following button to select the format of booking record and start download</FONT></b></td>
				</tr>
				</table>
				
				<table>
				<tr>
				</tr>
				<tr>
					
					<td>
					<form method="get" action="export_csv.php"> 
						<input type="submit" name="exportcsv" value="export csv"/>
					</form>
					</td>
					<td>
					<form method="get" action="export_xml.php"> 
						<input type="submit" name="exportxml" value="export xml"/>
					</form>
					</td>
					<td>
					<form method="get" action="export_json.php"> 
						<input type="submit" name="exportjson" value="export json"/>
					</form>
					</td>
				</tr>
				</table>
					
					
		</div>
	
	</div>
	
</body>
</html>