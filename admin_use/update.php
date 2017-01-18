<?php
	include('../session/config.php');
	if($_SERVER["REQUEST_METHOD"]=='POST'){
		if($_POST['username']=='admin'){
			$username = $_POST['username'];
			$pass = $_POST['password'];
			$contcat_person = $_POST['contact_person'];
			$location = $_POST['location'];
			$contact_no = $_POST['contact_no'];
			$sql = ("UPDATE login SET `Password` = '$pass', `Name of owner` = '$contcat_person', `Location` = '$location', `contact no` = '$contact_no' WHERE `UserName` = '$username'");
		}
		else{
			$nursery = $_POST['nursery_name'];
			$username = $_POST['username'];
			$pass = $_POST['password'];
			$contcat_person = $_POST['contact_person'];
			$location = $_POST['location'];
			$contact_no = $_POST['contact_no'];
			$sql = ("UPDATE login SET `UserName` = '$username', `Password` = '$pass', `Name of owner` = '$contcat_person', `Location` = '$location', `contact no` = '$contact_no' WHERE `Name of Nursery` = '$nursery'");
		}
		$result = $db->query($sql) or die("Sql Error :" . $db->error);
		if($result){
            echo '<head><link rel="stylesheet" type="text/css" href="../css/index.css"></head><body><div width=100% class="login"><h2 style="color:wheat">Submited</h2></div><body>';
        }
	}
?>