<?php include "header.php" ?>
<?php
	//submit->confirm button->checking name & email ->true -> connect db; false ->error message+no del record 
	
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		
		$name = $_POST["name"];
		$email = $_POST["email"];
		$message = $_POST["message"];
		
		$reg_email = "/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/";
		//清除奇怪的東西
		$email_first_tier = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		//即使input設定required, 純空格仍然能通過條件
		if(str_replace(" ", "", $name)==null){
			echo "<script>alert('Please enter your name!');</script>";
			echo "<script>$(function(){ callback('$name', '$email', '$message'); });</script>";
			//^分2行會沒反應
			echo "<script>$(function(){ $('#name').css('box-shadow', '0 0 3px #CC0000'); });</script>";
		}else if(!preg_match($reg_email, $email_first_tier) || filter_var($email_first_tier, FILTER_VALIDATE_EMAIL) === false){
			//prevent spam mail
			echo "<script>alert('Please enter valid email!');</script>";
			echo "<script>$(function(){ callback('$name', '$email', '$message'); });</script>";
			echo "<script>$(function(){ $('#email').css('box-shadow', '0 0 3px #CC0000'); });</script>";
		}else if (str_replace(" ", "", $message)==null){
			echo "<script>alert('Please enter message!');</script>";
			echo "<script>$(function(){ callback('$name', '$email', '$message'); });</script>";		
			echo "<script>$(function(){ $('#message').css('box-shadow', '0 0 3px #CC0000'); });</script>";
		}else{
			//connect DB
			try{
				$db = "localhost";
				$user_name = "root";
				$user_pw = "";
				$dbname = "myweb";
				date_default_timezone_set("UTC");
				$date = date("Y-m-d h:i:sa");
				
				//處理DB連接跟INSERT錯誤
				if(! $connect_db = new mysqli($db, $user_name, $user_pw, $dbname)){
					throw exception ($e);
				}else{
					$insert = "insert into contact (name, email, message, date) values ('$name', '$email', '$message', '$date')";

					if(!$send = $connect_db->query($insert)){
						throw new exception ($e);
					}else{
						echo "<script>alert('Success to send me message!')</script>";
					}
				}
				
			}catch (exception $e){
				echo "<script>alert('Sorry! Error occurred! Please contact me by mail and tell me that you met an error.')</script>";
			}
			
		}
		
	}
	
?>
<title>Contact me</title>
<div class="background_layer_1">
	<div class="background_layer_2">
		<div class="background_layer_3">
			<div class="background_layer_4">
			</div>
		</div>
	</div>
</div>

<div class="common_main" style="background-color: black;">
	<div class="form_detail">
		<h1><b><i>Contact me</i></b></h1>
		<p>You can contact me through the following form or by <a href="mailto:jillll0329@gmail.com">Email</a>.</p>
		<p>I will reply your message through email you filled in following form.</p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="contact" class="form" >
			<input type="text" name="name" id="name" size="42" placeholder="Name (required)" class="name" required autocomplete="off" /><br/>
			<input type="email" name="email" id="email" size="42" placeholder="Email (required)" required autocomplete="off" /><br/>
			<textarea name="message" id="message" rows="5" cols="30" placeholder="Message (required)" required autocomplete="off" ></textarea><br/>
			<input type="submit" name="submit" id="submit" value="SEND" class="contact_form_button" onclick="return confirm('Are you sure submit ?')" />
			<input type="button" name="reset" id="reset" value="RESET" class="contact_form_button" onclick="reset_confirm()" />
		</form>
	</div>
</div>

<?php include "footer.php" ?>