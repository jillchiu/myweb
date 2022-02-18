<?php
	session_start();
?>
<html>
<head>

	<title>User Profile</title>
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
	
	//search the user in the database and return the current row of a result set as an object
	$result2 = $mysqli->query("select * from user where login_name='$login_name'");
	$row2 = $result2->fetch_object();
	
	$mysqli->close();

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
		
			<b><FONT COLOR='BEFF54'>User Profile</FONT></b><br/><br/>
			<FONT COLOR='BEFF54'>You can view your own profile and modify your data.</FONT><br/><br/>
			
			<?php
				
				echo "<form method='post' action='update.php'>
							<table>
								<tr>
									<td><FONT COLOR='BEFF54'>User ID : </FONT></td>
									<td><FONT COLOR='00FFFF'>".$row2->login_name."</FONT></td>
								</tr>
								
								<tr>
									<td><FONT COLOR='BEFF54'>Real name : </FONT></td>
									<td><input type='text' name='name' value='".$row2->real_name."' required='required'  /></td>
								</tr>
								
								<tr>
									<td><FONT COLOR='BEFF54'>Password : </FONT></td>
									<td><input name='pass' type='password' placeholder='enter old/new password' required='required' /></td>
								</tr>
								
								<tr>
									<td><FONT COLOR='BEFF54'>Sex : </FONT></td>
									<td><FONT COLOR='00FFFF'>".$row2->sex."</FONT></td>
								</tr>
								
								<tr>
									<td><FONT COLOR='BEFF54'>Email address : </FONT></td>
									<td><FONT COLOR='00FFFF'>".$row2->mail."</FONT></td>
								</tr>
								
								<tr>
								<td><input type='submit' name='update' value='update' />
								</tr>
							</table>
					</form>"
				
			?>
		
		</div>
	</div>
</body>
</html>