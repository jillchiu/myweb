<?php
	session_start();
?>
<html>
<head>

	<title>user list</title>
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
	
	$re3 = $mysqli->query("select * from user where type='u' order by uid");
	
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
			
			<b><FONT COLOR='BEFF54'>User list:</FONT></b><br/><br/>
			
				<table width='700'>
					<tr>
					<td bgcolor="#003366"><span style="color:yellow">User ID </span></td>
					<td bgcolor="#003366"><span style="color:yellow">User name </span></td>
					<td bgcolor="#003366"><span style="color:yellow">Real name </span></td>
					<td bgcolor="#003366"><span style="color:yellow">sex </span></td>
					<td bgcolor="#003366"><span style="color:yellow">email </span></td>
					</tr>
					
				<?php
					
					while($ro3 = $re3->fetch_object()){
						
						echo "<tr><td><FONT COLOR='BEFF54'>".$ro3->uid."</FONT></td>";
						
						echo "<td><FONT COLOR='BEFF54'>".$ro3->login_name."</FONT></td>";
						
						echo "<td><FONT COLOR='BEFF54'>".$ro3->real_name."</FONT></td>";
						
						echo "<td><FONT COLOR='BEFF54'>".$ro3->sex."</FONT></td>";
						
						echo "<td><FONT COLOR='BEFF54'>".$ro3->mail."</FONT></td>";
						
					}
					
					$mysqli->close();
				?>
				
				</table><br/>
				
		</div>
	
	</div>
</body>
</html>