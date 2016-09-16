<?php
	include('session.php');
    $user = $_SESSION['login_user'];
?>
<html>

	<head>
		<title>Welcome </title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
        
        
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <style>
            
        </style>
	</head>

	<body>
		<div id="top" >
            <b>CAZRI NURSERIES</b>
            <a href = "logout.php">
                <img id ="logout" alter="logout" src="img/logout.png">
            </a>
		</div>
		<?php 
            echo "<div id=\"left\"><br>";
            if ($_SESSION['login_user'] == "admin")
			{
                echo "<button type=\"submit\" onclick=\"window.location = 'login.php'\" class=\"left\">HOME</button><br />
                <button type=\"submit\" onclick=\"return admin_today_selling()\" class=\"left\">Total Selling</button><br />
                <button type=\"submit\" onclick=\"return price()\" class=\"left\">Set Price</button><br />
                <button type=\"submit\" onclick=\"return add_remove()\" class=\"left\">Add or Remove Plant</button><br />
		<button type=\"submit\" onclick=\"return inventory()\" class=\"left\">Inventory</button><br />";
			}
			else
			{
				echo "<button type=\"submit\" onclick=\"window.location = 'login.php'\" class=\"left\">HOME</button><br />
                <button type=\"submit\" onclick=\"today_selling()\" class=\"left\">Today Selling</button><br />
                <button type=\"submit\" onclick=\"your_sell()\" class=\"left\">Your Sell Report</button><br />";
            } 
            echo "</div>";
        ?>
        <script> var login_user = "<?php echo $_SESSION['login_user'];?>"</script>
        <div id="main">
            <iframe id="myIframe" style="border:0px solid;" <?php if($_SESSION['login_user'] != "admin"){echo "src='other/welcome.php?user=$user'";}else{echo 'src=""';}?> >Welcome</iframe>
        </div>
        <script type="text/javascript" src="js/admin.js"></script>
        <div id="creat">Created by <a style="color:white" href="http://www.linkedin.com/in/ravirajpurohit" target="_blank"><i>Ravi Rajpurohit</i></a></div>
	</body>

</html>

