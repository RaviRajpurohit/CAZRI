<?php
	include("../config.php");
	$u_name = $_GET['u_name'];

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 

		$p_name = mysqli_real_escape_string($db,$_POST['p_name']);
		$price = mysqli_real_escape_string($db,$_POST['price1']); 
        $availability = mysqli_real_escape_string($db,$_POST['new_availability']);
        $selling = mysqli_real_escape_string($db,$_POST['sell1']);
        $income = mysqli_real_escape_string($db,$_POST['today_income']);
        $date = date('y/m/d');
        
 
		$sql = "INSERT INTO `selling`(`UserName`, `Date`, `Name of plant`, `price`, `total sell`) VALUES ('$u_name','$date','$p_name','$price','$selling')";
		$sql1 = "UPDATE `plant_list` SET `$u_name`= '$availability' WHERE `Name of plant`='$p_name'";
		$result = mysqli_query($db,$sql);
		$result1 = mysqli_query($db,$sql1);
		if($result && $result1){
            echo '<head><link rel="stylesheet" type="text/css" href="../css/index.css"></head><body><div width=100% class="login"><h2 style="color:wheat">Submited</h2></div><body>';
        }
	}
?>

