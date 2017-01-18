<?php
	$error = " ";
	include("session/config.php");
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 

		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		$sql = "SELECT `Name of Nursery` FROM login WHERE UserName = '$myusername' and Password = '$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count == 1) {

			$_SESSION['login_user']= $myusername;  // Initializing Session with value of PHP Variable
			$_SESSION['nursery'] = $row['Name of Nursery'];
			//session_register("myusername");
            header("Location: welcome.php");
		}
		else {
			$error = "Your Login Name or Password is invalid";
		}
	}
?>

<html>
   
	   <head>
	      	<title>Login Page</title>
	      	<link rel="stylesheet" type="text/css" href="css/index.css">
	      	<link rel="stylesheet" type="text/css" href="css/main.css"> 
			
	   </head>   
	   <body>
		
	      	<div class="login" align="center">
				<img src="img/logo.gif" height="70%" width="70%">
				<h1>Login</h1>
				<form action="" method="post">
					<input type="text" id="username" name="username" placeholder="Username" required="required"
						<?php if($_GET['user_type']=='verifying_officer'){echo"value='admin' readonly";}?>
					/>
					<input type="password" id="password" name="password" placeholder="Password" required="required" />
					<button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
				</form>
					<div style = "font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>	
	      	</div>
			
	   </body>
</html>