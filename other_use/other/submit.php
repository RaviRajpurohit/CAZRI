<?php
	include("../../session/config.php");
	$nursery = $_GET['nursery'];
    $user = $_GET['u_name'];
	$chk=false;
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$i = $_POST['id_value'];
		while($i>0){
			$seedling_sold = mysqli_real_escape_string($db,$_POST[$i.'_seedling_sold']);
			if($seedling_sold>0){
				$p_name = mysqli_real_escape_string($db,$_POST[$i.'_plant']);
				$price = mysqli_real_escape_string($db,$_POST[$i.'_price']); 
				$available = mysqli_real_escape_string($db,$_POST[$i.'_new_available']);
				$date = date('y-m-d');
				
				$sql = "INSERT INTO `transaction details`(`Nursery`, `Date of Sale`, `Species Name`, `Price per Plant`, `No of Seedling`) VALUES ('$nursery','$date','$p_name','$price','$seedling_sold')";
				$sql1 = "UPDATE `plant_list` SET `$nursery`= '$available' WHERE `Species Name`='$p_name'";
				$result = mysqli_query($db,$sql);
				$result1 = mysqli_query($db,$sql1);
				$chk=true;
			}
		$i = $i-1;
		}
		
		if($chk){
            echo '<head><link rel="stylesheet" type="text/css" href="../../css/index.css"></head><body><div width=100% class="login"><h2 style="color:wheat">Submited</h2></div><body>';
        }
	}
?>

