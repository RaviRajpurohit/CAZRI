<?php
	include('session/session.php');
    $user = $_SESSION['login_user'];
	$nursery = $_SESSION['nursery'];
?>
<html>

	<head>
		<title>Welcome </title>
		
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <style>
            button{
				padding:5px;
			}
        </style>
	</head>

	<body>
		<div id="top" >
            <b>CAZRI NURSERIES</b>
            <a href = "session/logout.php">
                <img id ="logout" alter="logout" src="img/logout.png">
            </a>
		</div>
		<?php 
            echo "<div id=\"left\"><br>";
            if ($_SESSION['login_user'] == "admin")
			{
                echo "<button type=\"submit\" onclick=\"window.location = 'welcome.php'\" class=\"left\">HOME</button><br />
				<button type=\"submit\" onclick=\"return seedling_stock()\" class=\"left\">Seedling Stock</button><br />
				<button type=\"submit\" onclick=\"return seedling_price()\" class=\"left\"> Seedling Price</button><br />";
				echo "<button type=\"submit\" onclick=\"return transaction_details()\" class=\"left\">Transaction Details</button><br />
				<button type=\"submit\" onclick=\"return add_remove()\" class=\"left\">Add or Remove Plant Name</button><br />
				<button type=\"submit\" onclick=\"return profile()\" class=\"left\">Nurseries Profile</button><br />";
				echo "<script type=\"text/javascript\" src=\"js/admin.js\"></script>";
			}
			else
			{
				echo "<button type=\"submit\" onclick=\"window.location = 'welcome.php'\" class=\"left\">HOME</button><br />
                <button type=\"submit\" onclick=\"present_stock()\" class=\"left\">Present Stock</button><br />";
				echo "<button type=\"submit\" onclick=\"nursery_trade_record()\" class=\"left\">Nursery Trade Record</button><br />
                <button type=\"submit\" onclick=\"stock_sale_enquiry()\" class=\"left\">Stock Sale Enquiry</button><br />";
            } 
            echo "</div>";
        ?>
        <div id="main">
            <iframe id="myIframe" style="border:0px solid;" <?php if($_SESSION['login_user'] != "admin"){echo "src='other_use/others_home.php?user=$user&nursery=$nursery'";}else{echo 'src="admin_use/admin_home.php"';}?> >Welcome</iframe>
        </div>
        <script type="text/javascript" src="js/admin.js"></script>
	</body>
	<script> 
			var login_user = "<?php echo $_SESSION['login_user'];?>";
			var nursery = "<?php echo $_SESSION['nursery']?>";
		</script>

</html>

