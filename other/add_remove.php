<?php
	include("../config.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
                $add_p_name = null;
                $add_p_name = mysqli_real_escape_string($db,$_POST['add_p_name']);
                $remove_p_name = mysqli_real_escape_string($db,$_POST['remove_p_name']);
                $add_price = mysqli_real_escape_string($db,$_POST['add_price']); 
                if($add_p_name != null)
                {
                    $sql = "INSERT INTO `plant_list`(`Name of plant`, `price`) VALUES ('$add_p_name','$add_price')";
                    $result = mysqli_query($db,$sql);
                    if($result){
                        echo '<div width=100% class="login"><h4id="add_remove" style="color:wheat">Added</h4></div>';
                    }
                }
                elseif($remove_p_name != "--select--"){
                    $sql = "DELETE FROM `plant_list` WHERE `Name of plant` = '$remove_p_name'";
                    $result_remove = mysqli_query($db,$sql);
                    if($result_remove){
                        echo '<div width=100% class="login"><h4 id="add_remove" style="color:wheat">Removed</h4></div>';
                    }
                }
            }
?>
<html>
    <head>
        <title>Add or Remove Plants</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>
    <body style="background-color:rgba(78, 107, 78, 0.44);margin-left:5%;"><br><br><br>
        <b><div>
            <h3>Please give plant Name and price to add in database</h3>
            <form action="" method="POST">
                <lable>Name of plant</lable><input type="text" name="add_p_name" placeholder="Plaese Entre Plant Name"/>
                <lable>Price</lable><input type="text" name="add_price" placeholder="plaese Entre Price" />
                <button type="submit" >Add Plant</button>
            </form>
        </div><br><br><br>
        <div>
            <h3>Please select plant Name to remove from database</h3>
            <form action="" method="post">
                <select id="plant_name" name="p_name"> 
                    <option>--select--</option>
                    <?php			
                        $query = sprintf("SELECT `Name of plant` FROM `plant_list`");
                        $result = $db->query($query);
                        while ($row=mysqli_fetch_array($result)) 
                        {
                            $Title=$row["Name of plant"];
                            echo "<option>$Title</option>";
                        }
                    ?>
                </select>
                <button type="submit">Remove Plant</button>
            </form>
        </div>
        <div width=100% class="login"><p id="add_remove" style="color:wheat"></p></div>
    </b></body> 
</html>



