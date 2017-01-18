<?php
	$error="";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['user_type'])){
			$user_type = $_POST['user_type'];
			header('location: login.php?user_type='.$user_type);
		}
		else
			$error="Please Select one of the User Type!";
	}
?>

<html>
	<head>
	<!--<meta charset="UTF-8">-->
	<meta http-equiv="Content-Language" content="hi">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Entering in Session</title>
	<link rel="stylesheet" type="text/css" href="css/session_entry.css">
	</head>
	<body align="center" >
	
	<center><h1>CAZRI Nursery</h1></center>
	
		<center><div class="img"><img src="img/img11.png"></div></center>
		<div align="center">
		
			<form action="" method="POST">
			<div class="left"><nav><label><img src="img/11.png"><br><input type="radio" name="user_type" value="verifying_officer">&nbsp;&nbsp;Admin</label></nav><br></div>
			<div class="right">	<nav><label><img src="img/123.jpg"><br><input type="radio" name="user_type" value="entry_level">&nbsp;&nbsp;Entry Level</label></nav><br></div> 
				
				<button type="submit">Enter</button>
			</form>
			<div style = "font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
			
	</body>
</html>