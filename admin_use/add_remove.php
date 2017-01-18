<?php
	include("../session/config.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if(!isset($_POST['add_p_name'])){
			$remove_p_name = $_POST['remove_p_name'];
			$sql = "DELETE FROM `plant_list` WHERE `Species Name` = '$remove_p_name'";
			$result_remove = mysqli_query($db,$sql);
			if($result_remove){
				echo '<br><br><div width=100% align="center" class="login"><h2 style="color:wheat">Removed</h2></div>';
			}
		}
		else{
			$add_p_name = mysqli_real_escape_string($db,$_POST['add_p_name']);
			$add_price = mysqli_real_escape_string($db,$_POST['add_price']);
			$sql = "INSERT INTO `plant_list`(`Species Name`, `CAZRI_price`, `Bujawar_price`, `Chandan_price`) VALUES ('$add_p_name','$add_price','$add_price','$add_price')";
			$result = mysqli_query($db,$sql);
			if($result){
				echo '<br><br><div width=100% align="center"class="login"><h2 style="color:wheat">Added</h2></div>';
			}
		}
	}
?>
<html>
    <head>
        <title>Add or Remove Plants</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		
		<style>
		body{
		background : url(../img/ab7.jpg) ;}
		  
}
		
		
		
		</style>
    </head>
    <body style="background-color:rgba(78, 107, 78, 0.44);margin-left:5%;"><br>
        <b><div><br><br>
           <center> <h1>Please give plant Name and price to add in database</h1></center>
            <center><form action="" method="POST">
                <h3><label>Species Name</label> &nbsp; <input type="text" name="add_p_name" placeholder="Enter Species Name"/><h3>
                &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;  <label>Price</label>&nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="add_price" placeholder="Please Enter Price" />
                <br><br><b>&nbsp; &nbsp;<button type="submit" >Add Species</button></b>
				
            </form></center>
        </div><br><br><br>
        <div>
            <center><h1>Please select plant Name to remove from database</h1>
            <form action="" method="post"><h3><h3><label>Species Name</label>&nbsp;
                <select id="plant_name" name="remove_p_name"> 
                    <option>--select--</option>
                    <?php			
                        $sql = ("SELECT `Species Name` FROM `plant_list`");
                        $result = $db->query($sql) or die("Sql Error :" . $db->error);
                        while ($row = mysqli_fetch_array($result)) 
                        {
                            $Title=$row["Species Name"];
                            echo "<option>$Title</option>";
                        }
                    ?>
                </select><br><br>
                <button type="submit">Remove Species</button></h3>
            </form></center>
        </div>
    </body> 
</html>