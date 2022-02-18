<?php
	session_start();
?>
<html>
<head>

	<title>Extra services</title>
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
				echo "<div id='menu_user_extra'>";
				include 'menu_user.php';
				echo "</div>";
			}else{
				echo "<div id='menu_admin_extra'>";
				include 'menu_admin.php';
				echo "</div>";
			}
			
		?>
		
		<?php
		
			if($type=="u"){
				echo "<div id='content_extra_user'>";
			}else{
				echo "<div id='content_extra_admin'>";
			}
			
		?>
			
			Without living, services which buffet, swimming and spa are provided<br/><br/><br/>
			
			<table>
				<tr>
					<td>
						<img src="pic/buffet.jpg" style="width:200px;height:150px;" />
					</td>
					<td>
						<FONT COLOR="BEFF54">Buffet is provided for breakfast and dinner everyday.<br/>
						Its price is $60 per one day.</FONT>
					</td>
				</tr>
				<tr>
					<td>
						<img src="pic/pool2.jpg" style="width:200px;height:150px;" />
					</td>
					<td>
						<FONT COLOR="BEFF54">Swimming pool is provided to use in full day.<br/>
						Its price is $30 per one day.</FONT>
					</td>
				</tr>
				<tr>
					<td>
						<img src="pic/spa.jpg" style="width:200px;height:150px;" />
					</td>
					<td>
						<FONT COLOR="BEFF54">Spa is provided to use in full day.<br/>
						Its price is $50 per one day.</FONT>
					</td>
				</tr>
			</table>
		
		</div>
		
	
	</div>
</body>
</html>