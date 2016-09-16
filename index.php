<?php
	include("config.php");
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 

		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']); 

		$sql = "SELECT `Name of owner` FROM login WHERE UserName = '$myusername' and Password = '$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		// If result matched $myusername and $mypassword, table row must be 1 row

		if($count == 1) {

			$_SESSION['login_user']= $myusername;  // Initializing Session with value of PHP Variable
            header("Location: login.php");
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
	   <body bgcolor = "#FFFFFF" >
		<!div align="center"><!/div>
		
	      	<div class="login" align="center">
			<img src="img/logo.gif" heigth="70%" width="70%">
		 	<h1>Login</h1>
			<form on_change="hashing()" action="" method="post">
				<input type="text" name="username" placeholder="Username" required="required" />
				<input type="password" id="password" name="password" placeholder="Password" required="required" />
				<button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
			</form>
	       		<div style = "font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>	
	      	</div>
		<div id="creat_index">Created by <a style="color:white" href="http://www.linkedin.com/in/ravirajpurohit" target="_blank"><i>Ravi Rajpurohit</i></a></div>
	   </body>
</html>
<!--script>
    function hashing(){
        var passtext = document.getElementById('password').value;
        var passhash = djb2Code(passtext);
        document.getElementById('password').value = passhash;
    }
    djb2Code = function(str){
        var hash = 5381;
        for (i = 0; i < str.length; i++) {
            char = str.charCodeAt(i);
            hash = ((hash << 5) + hash) + char; /* hash * 33 + c */
        }
        return hash;
    }
</script-->