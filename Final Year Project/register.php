<h2><FONT COLOR='BEFF54'>User Register:</FONT></h2>
<FONT COLOR='BEFF54'>Please fill in all fills</FONT><br/><br/>
<form action="register_process.php" method="post">
	<FONT COLOR='BEFF54'>User ID: </FONT><input type="text" name="id" placeholder="Use for login" required="required" /><br/>
	<FONT COLOR='BEFF54'>Name: </FONT><input type="text" name="name" placeholder="real name" required="required" /><br/>
	<FONT COLOR="FFFFFF">**Please enter correct name, it is not permit to check in if your name is not exactly to your passport or ID card.</FONT><br/>
	<FONT COLOR='BEFF54'>Password: </FONT><input type="password" name="pass" placeholder="password" required="required" /><br/>
	<FONT COLOR='BEFF54'>Confirm Password: </FONT><input type="password" name="pass2" placeholder="Enter the same password again" required="required" size="30"/><br/>
	<FONT COLOR='BEFF54'>Sex:</FONT>
		<input type="radio" name="sex" value="m"/><FONT COLOR='BEFF54'>Male</FONT>
		<input type="radio" name="sex" value="f"/><FONT COLOR='BEFF54'>Female</FONT><br/>
	<FONT COLOR='BEFF54'>Email address:</FONT> <input type="email" name="mail" placeholder="example@example.com" required="required" /><br/>
	<input type="submit" name="action" value="register">
</form>