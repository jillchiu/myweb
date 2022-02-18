<html>
<head>

	<title>find data page</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	
</head>
<body>
	<div id="container">
	
		<div id="head">
	
			<?php
				include 'head.php';
			?>
		
		</div>
		
		<hr>
		
		<div id="welcome">
		
			<b><FONT COLOR='BEFF54'>You may find your id or change the new password in this page.</FONT></b>
			
		</div>
		
		<br/>
		
		<table>
			<tr>
				<td>
					
					
						<b><FONT COLOR='BEFF54'>For forget ID, please fill in below fills</FONT></b><br/><br/>
						
						<form action="findID_process.php" method="post">
						
							<table>
								<tr>
									<td>
										<FONT COLOR='BEFF54'>Real name: </FONT>
									</td>
									<td>
										<input type="text" name="name" required="required" />
									</td>
								</tr>
								<tr>
									<td>
										<FONT COLOR='BEFF54'>Email address: </FONT>
									</td>
									<td>
										<input type="email" name="mail" required="required" />
									</td>
								</tr>
							</table>
							
							<input type="submit" name="action" value="find"><br/>
					
						</form>
						
						<br/>
				
			
						<b><FONT COLOR='BEFF54'>For forget password, please fill in below fills</FONT></b><br/><br/>
						
						
						<form action="findPA_process.php" method="post">
						
							<table>
								<tr>
									<td>
										<FONT COLOR='BEFF54'>Real name: </FONT>
									</td>
									<td>
										<input type="text" name="name" required="required" />
									</td>
								</tr>
									<td>
										<FONT COLOR='BEFF54'>UserID: </FONT>
									</td>
									<td>
										<input type="text" name="id" required="required" />
									</td>
								</tr>
							</table>
							
							<input type="submit" name="action" value="find">
					
						</form>
			
						<br/>
				</td>
			</tr>
			<tr>
				<td>
					<FONT COLOR="FFFFFF"><h2>**Please ensure data you entered are corrected !</h2></FONT>
				</td>
			</tr>
		</table>
		
		<hr>
	
		<div id="foot">
			
			<?php
				include 'foot.php';
			?>
			
		</div>
	
	</div>
</body>
</html>