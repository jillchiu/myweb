<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<!-- animate.css -->
<link href="https://unpkg.com/animate.css@3.5.2/animate.min.css" rel="stylesheet" />
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- fullpage -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js"></script>
<script src="script.js"></script>
<header>
	<div class="navbar_head">
		
		<div class="h_from_left_dropdown">
			
			<a href="index.php" class="dropdown_btn">
				<img src="logo.jpg" title="Home" width="50" height="50" />
			</a>
				
			<div class="dropdown_content">
				<a href="about.php">About&nbsp;me</a>
				<a href="update.php">Update</a>
				<a href="portfolio.php">Portfolio</a>
				<a href="profile.php">Profile</a>
				<a href="contact.php">Contact&nbsp;me</a>
			</div>
				
		</div>
		
		
		<div class="h_from_right">			
			<p id="clock">Loading</p>
		</div>
		
		<div class="h_from_right">
			<p>Welcome, 

<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){

	$submit = $_POST["submit"];
	
	if($submit=="Submit"){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$login_or_register = $_POST["login_or_register"];
		
		//即使input設定required, 純空格仍然能通過條件
		if(str_replace(" ", "", $username)==null){
			echo "<script>alert('Please enter your user name!');</script>";
			echo "<script>$(function(){ $('#username').css('box-shadow', '0 0 3px #CC0000');
										$('#login').attr('class', 'btn_action_unselect');
										$('#register').attr('class', 'btn_action_select');
										$('#login_or_register').attr('value', 'register');
										$('#register_or_login_form').slideDown();
			});</script>";
		}else{
			//connect DB
			try{
				$db = "localhost";
				$user_name = "root";
				$user_pw = "";
				$dbname = "myweb";
				date_default_timezone_set("UTC");
				
				//處理DB連接跟INSERT錯誤
				if(! $connect_db = new mysqli($db, $user_name, $user_pw, $dbname)){
					throw exception ($e);
				}else if($login_or_register=="register"){
					$sql = "select user_id from user where user_name='$username'";
					$result = $connect_db->query($sql);
					$row = $result->fetch_array(MYSQLI_ASSOC);
					
					if(!isSet($row["user_id"])){
						$sql = "insert into user (user_name, user_password, user_type) values ('$username', '$password', 'n')";
						
						if(!$register = $connect_db->query($sql)){
							throw new exception ($e);
						}else{
							echo "<script>alert('Success to register!')</script>";
						}
					}else{
						echo "<script>alert('Sorry! User name is existed, please choose another user name!')</script>";
					}
				}else if($login_or_register=="login"){
					$sql = "select * from user where user_name='$username' and user_password='$password'";
					$result = $connect_db->query($sql);
					$row = $result->fetch_array(MYSQLI_ASSOC);
					
					if(!isSet($row["user_id"])){
						echo "<script>alert('Sorry! User name or password is incorrect, please confirm and try again!')</script>";
					}else{
						$_SESSION["login"] = "true";
						$_SESSION["username"] = $username;
						
						//auto redirect now position
						if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){  
							$url = "https://";
						}else{
							$url = "http://";
						}
						
						$url.= $_SERVER['HTTP_HOST'];
						$url.= $_SERVER['REQUEST_URI'];
						
						header("location: ".$url, true, 505);
						
						echo "<script>alert('Login successful!')</script>";
					}
				}
				
			}catch (exception $e){
				echo "<script>alert('Sorry! Error occurred! Please contact me by mail and tell me that you met an error.')</script>";
			}
			
		}
		
	}else if($submit=="Update"){
		
		$db = "localhost";
		$user_name = "root";
		$user_pw = "";
		$dbname = "myweb";
		date_default_timezone_set("UTC");
		
		$connect_db = new mysqli($db, $user_name, $user_pw, $dbname);
		
		$now_username = $_SESSION["username"];
		$message = "No record has been updated!";
		
		if($_POST["update_username"]!=null){
			$update_username = $_POST["update_username"];
			
			if(str_replace(" ", "", $update_username)!=null){
				$sql = "select * from user where user_name='$update_username'";
				$result = $connect_db->query($sql);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				
				if(isset($row["user_name"])){
					$message = "User name has been existed! Please choose another user name! \u000a";
				}else{
					$now_username = $_SESSION["username"];
					$sql = "update user set user_name='$update_username' where user_name='$now_username'";
					$result = $connect_db->query($sql);
					
					$message = "User name has been updated! \u000a";
					$now_username = $update_username;
					$_SESSION["username"] = $update_username;
				}
			
			}
			
		}
		
		if($_POST["update_password"]!=null){
			$update_password = $_POST["update_password"];
			
			$sql = "update user set user_password='$update_password' where user_name='$now_username'";
			$result = $connect_db->query($sql);
			
			if($message != "No record has been updated!"){
				$message = $message."Password has been updated! \u000a";
			}else{
				$message = "Password has been updated! \u000a";
			}
			
		}
		
		if($_POST["update_email"]!=null){
			$update_email = $_POST["update_email"];
			
			$reg_email = "/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/";
			//清除奇怪的東西
			$email_first_tier = filter_var($update_email, FILTER_SANITIZE_EMAIL);
			
			if(!preg_match($reg_email, $email_first_tier) || filter_var($email_first_tier, FILTER_VALIDATE_EMAIL) === false){
				if($message != "No record has been updated!"){
					$message = $message."Please enter valid email!";
				}else{
					$message = "Please enter valid email!";
				}
				
			}else{
				$sql = "select * from user where user_email='$update_email'";
				$result = $connect_db->query($sql);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				
				if(isset($row["user_email"])){
					if($message != "No record has been updated!"){
						$message = $message."This mail has been used! Please use another email!";
					}else{
						$message = "This mail has been used! Please use another email!";
					}
					
				}else{
					$sql = "update user set user_email='$update_email' where user_name='$now_username'";
					$result = $connect_db->query($sql);
					
					if($message != "No record has been updated!"){
						$message = $message."Email has been updated!";
					}else{
						$message = "Email has been updated!";
					}
					
				}
			
			}
			
		}
		
		echo "<script>alert('$message')</script>";
		
	}else if($submit=="Reset Password"){
		$db = "localhost";
		$user_name = "root";
		$user_pw = "";
		$dbname = "myweb";
		date_default_timezone_set("UTC");
		
		$connect_db = new mysqli($db, $user_name, $user_pw, $dbname);
		
		$message = "";
		
		if($_POST["forget_password_username"]!=null && $_POST["forget_password_email"]!=null){
			
			$forget_password_email = $_POST["forget_password_email"];
			
			$reg_email = "/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/";
			//清除奇怪的東西
			$email_first_tier = filter_var($forget_password_email, FILTER_SANITIZE_EMAIL);
			
			if(!preg_match($reg_email, $email_first_tier) || filter_var($email_first_tier, FILTER_VALIDATE_EMAIL) === false){
				$message = "Please enter valid email!";
			}else{
				
				$forget_password_username = $_POST["forget_password_username"];
			
				if(str_replace(" ", "", $forget_password_username)!=null){
					$sql = "select * from user where user_name='$forget_password_username' and user_email='$forget_password_email'";
					$result = $connect_db->query($sql);
					$row = $result->fetch_array(MYSQLI_ASSOC);
					
					if(isset($row["user_name"])){
						//popup window enter password->update
						//$message = "";
						
						//generate a randow password (10 word)
						function generateRandomString($length = 10) {
							$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
							$charactersLength = strlen($characters);
							$randomString = "";
							for ($i = 0; $i < $length; $i++) {
								$randomString .= $characters[rand(0, $charactersLength - 1)];
							}
							return $randomString;
						}
						
						$new_password = generateRandomString();
						
						$sql = "update user set user_password='$new_password' where user_name='$forget_password_username' and user_email='$forget_password_email'";
						$result = $connect_db->query($sql);
					
						$message = "Password was changed! \u000aYour new password is ".$new_password;
	
					}else{
						$message = "User name or email is incorrect! Please try again!";
					}
				
				}else{
					$message = "Please enter valid user name!";
				}
				
			}
			
		}
		
		if($message=="Please enter valid email!" || $message=="User name or email is incorrect! Please try again!" || $message=="Please enter valid user name!"){
			echo "<script>alert('$message')</script>";
		}else{
			//using primit to pop up window to let user enter new password->php update DB->alert response
			echo "<script>alert('$message')</script>";
		}
		
	}else if($submit=="Logout"){
		session_destroy();
		
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){  
			$url = "https://";
		}else{
			$url = "http://";
		}
		
		$url.= $_SERVER['HTTP_HOST'];
		$url.= $_SERVER['REQUEST_URI'];
		
		header("location: ".$url);
		
	}
}

$guest = "<button id='guest' title='click here to register/login' ><FONT color='red'>Guest</FONT>";

if (isset($_SESSION["login"])) {
	if ($_SESSION["login"] <> "true") {
		echo $guest;
	}else{
		echo "<button id='user' title='click here to update/logout' ><FONT color='red'>".$_SESSION["username"]."</FONT>";
	}
}else{
	echo $guest;
};

?>
			</p>
		</div>
				
	</div>
		
	<div class="register_or_login_form" id="register_or_login_form">
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="register_or_login_form_container">
			<input type="button" name="login" id="login" class="btn_action_select" value="Login" /><input type="button" name="register" id="register" class="btn_action_unselect" value="Register" /><br/>
			<input type="hidden" name="login_or_register" id="login_or_register" value="login" />
			
			<label for="username"><b>User name</b></label>
			<input type="text" name="username" placeholder="Enter your user name (required)" id="username" maxlength="12" required />
			
			<label for="password"><b>Password</b></label>
			<input type="password" name="password" placeholder="Enter your password (required)" id="password" maxlength="12" required />
		
			<a href="javascript:void(0)" id="forget_password" name="forget_password"><FONT size="2">Forget password</FONT></a>
			
			<input type="submit" class="btn" name="submit" id="submit" value="Submit" onclick="return confirm('Are you sure submit ?')" />
		
		</form>
	</div>
	
	<div class="update_or_logout_form" id="update_or_logout_form">
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="update_or_logout_form_container">
			<label for="update_username"><b>User name</b></label>
			<input type="text" name="update_username" placeholder="Enter your new user name (option)" id="update_username" maxlength="12" autocomplete="off" />
			
			<label for="update_password"><b>Password</b></label>
			<input type="password" name="update_password" placeholder="Enter your new password (option)" id="update_password" maxlength="12" autocomplete="off" />
			
			<label for="update_email"><b>Email</b></label>
			<input type="email" name="update_email" placeholder="Enter your new email (option)" id="update_email" maxlength="20" autocomplete="off" />
			
			<p><FONT size="2">*Data will not be updated if you not enter anything.</FONT></p>
			<p><FONT size="2">*Email will be used for reset password, therefore it is recommended to enter.</FONT></p>
			
			<input type="submit" class="btn_green" name="submit" id="submit" value="Update" onclick="return confirm('Are you sure update your information?')" />
			<input type="submit" class="btn_red" name="submit" id="submit" value="Logout" onclick="return confirm('Are you sure logout?')" />
		
		</form>
	</div>
	
	<div class="forget_password_form" id="forget_password_form">
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="forget_password_form_container">
			<label for="forget_password_username"><b>User name</b></label>
			<input type="text" name="forget_password_username" placeholder="Enter your user name (required)" id="forget_password_username" maxlength="12" required />
			
			<label for="forget_password_email"><b>Email</b></label>
			<input type="email" name="forget_password_email" placeholder="Enter your email (required)" id="forget_password_email" maxlength="20" required />
			
			<p>*Please enter all columns.</p>
			
			<input type="submit" class="btn_green" name="submit" id="submit" value="Reset Password" onclick="return confirm('Are you ensure data you entered are correct?')" />
		
		</form>
	</div>
	
</header>
<script>
//login function control
$(function(){
	$("#login").click(function(){
		if($("#login").attr("class")=="btn_action_unselect"){
			$("#login").attr("class", "btn_action_select");
			$("#register").attr("class", "btn_action_unselect");
			$("#username").attr("autocomplete", "");
			$("#password").attr("autocomplete", "");
			$("#login_or_register").attr("value", "login");
			$("#username").css("box-shadow", "");
		};
	});
});

//register function control
$(function(){
	$("#register").click(function(){
		if($("#register").attr("class")=="btn_action_unselect"){
			$("#register").attr("class", "btn_action_select");
			$("#login").attr("class", "btn_action_unselect");
			$("#username").attr("autocomplete", "off");
			$("#password").attr("autocomplete", "off");
			$("#login_or_register").attr("value", "register");
		};
	});
});

//click the identity and show the form
$(function(){
	$("#guest").click(function(){
		if($("#forget_password_form").css("display")!="none"){
			$("#forget_password_form").slideUp();
			$("#guest").attr("title", "click here to register/login");
		}else if($("#register_or_login_form").css("display")==="none"){
			$("#register_or_login_form").slideDown();
			$("#guest").attr("title", "click here to close the pop up window");
		}else{
			$("#register_or_login_form").slideUp();
			$("#guest").attr("title", "click here to register/login");
		};
	});
});

$(function(){
	$("#user").click(function(){
		if($("#update_or_logout_form").css("display")==="none"){
			$("#update_or_logout_form").slideDown();
			$("#user").attr("title", "click here to close the pop up window");
		}else{
			$("#update_or_logout_form").slideUp();
			$("#user").attr("title", "click here to update/logout");
		};
	});
});

//forget password control
$(function(){
	$("#forget_password").click(function(){
		if($("#forget_password_form").css("display")==="none"){
			$("#forget_password_form").slideDown();
			$("#register_or_login_form").slideUp();
			$("#guest").attr("title", "click here to close the pop up window");
		}
	});
});
/*
window.onclick = function close(e) {
    if (e.target == modal) {
        $("#register_or_login_form").slideUp();
		$("#update_or_logout_form").slideUp();
		$("#forget_password_form").slideUp();
    }
}*/
/*
$(function(){
	$(window).click(function(e) {
    $("#register_or_login_form").slideUp();
		$("#update_or_logout_form").slideUp();
		$("#forget_password_form").slideUp();
})
});
*/
/*
$(function(){
	$(window).bind("click", function(){
		$("#register_or_login_form").slideUp();
		$("#update_or_logout_form").slideUp();
		$("#forget_password_form").slideUp();
});
});
*/
</script>
<style>
.register_or_login_form, .update_or_logout_form, .forget_password_form {
	display: none;
	position: fixed;
	top: 55px;
	right: 50px;
	z-index: 9;
}

.register_or_login_form_container, .update_or_logout_form_container, .forget_password_form_container {
	max-width: 300px;
	padding: 10px;
	background-color: white;
}

.register_or_login_form_container input[type=text], .register_or_login_form_container input[type=password], .update_or_logout_form_container input[type=text], .update_or_logout_form_container input[type=password], .update_or_logout_form_container input[type=email], .forget_password_form_container input[type=text], .forget_password_form_container input[type=email] {
	width: 100%;
	padding: 15px;
	margin: 5px 0 22px 0;
	border: none;
	background: #f1f1f1;
}

.register_or_login_form_container input[type=text]:focus, .register_or_login_form_container input[type=password]:focus, .update_or_logout_form_container input[type=text]:focus, .update_or_logout_form_container input[type=password]:focus, .update_or_logout_form_container input[type=email]:focus, .forget_password_form_container input[type=text]:focus, .forget_password_form_container input[type=email]:focus {
	background-color: #ddd;
}

.register_or_login_form_container .btn, .update_or_logout_form_container .btn_green, .forget_password_form_container .btn_green {
	background-color: #04AA6D;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 100%;
	margin-bottom:10px;
	opacity: 0.8;
}

.register_or_login_form_container .btn:hover, .update_or_logout_form_container .btn_green:hover, .forget_password_form_container .btn_green:hover {
	opacity: 1;
}

.update_or_logout_form_container .btn_red {
	background-color: red;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 100%;
	margin-bottom:10px;
	opacity: 0.8;
}

.update_or_logout_form_container .btn_red:hover {
	opacity: 1;
}

.btn_action_select {
	background-color: #04AA6D;
	color: white;
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 50%;
	margin-bottom:10px;
	opacity: 0.8;
}

.btn_action_unselect {
	padding: 16px 20px;
	border: none;
	cursor: pointer;
	width: 50%;
	margin-bottom:10px;
	opacity: 0.8;
}
</style>