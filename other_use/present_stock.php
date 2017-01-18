<?php 
	$nursery = $_GET['nursery'];
    $user = $_GET['user'];
    include('../session/config.php');
	if(!$db)
	{
		die("Connection failed: " . $db->error);
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
        
		$i = $_POST['id_value'];
		while($i>0){
			$p_name = $_POST[$i.'_plant'];
			$price = $_POST[$i.'_price'];
			$new_available = $_POST[$i.'_new_available'];
			$sql = "UPDATE plant_list SET `".$nursery."_price` = '$price', `$nursery` = '$new_available' WHERE `Species Name` = '$p_name'";
			$db->query($sql);
			$i = $i-1;
		}
    }
?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
		<script>var available = [];</script>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		
		<style>
		body{
		background : url(../img/ab7.jpg);
		
		
		}
		</style>
    </head>
    <body>
        <h1 align="center">Present Stock</h1> <br><br>
        <form action="" onchange="update_avaiblity()" method="POST">
            <table id="t01">
                <tr>
					<th>Sr. No.</th>
                    <th>Species Name</th>
					<th>New Seedling Produced</th>
                    <th>Price</th>
					<th>Available Stock</th>
                </tr>
				<?php
					$sql = ("SELECT * FROM `plant_list`");
					$result = $db->query($sql) or die("Sql Error :" . $db->error);
					$id=0;
					while($row = mysqli_fetch_array($result))
					{
						$id = $id + 1;
						echo "<tr>";
						echo "<td>" . $id . "</td>";
						echo "<td><input type='text' id='".$id."_plant' name='".$id."_plant' value='" . $row['Species Name'] . "' readonly></td>";
						echo "<td><input type='number' id='".$id."_new_seedling' name='".$id."_new_seedling' value=0 ></td>";
						echo "<td><input type='text' id='".$id."_price' name='".$id."_price' value='" . $row[$nursery.'_price'] . "' ></td>";
						echo "<td><input type='number' id='".$id."_new_available' name='".$id."_new_available' value='".$row[$nursery]."' readonly></td>";
						echo "</tr>";
						echo "<script>available[".$id."] = ".$row[$nursery].";</script>";
					}
					echo "</table>";
					echo "<input type='hidden' id='id_value' name='id_value' value=".$id.">";
				?>
			<br><br><button type="submit">Update Stock</button>
        </form>
            </table>
        </form>
    </body> 
</html>

<script>
    function update_avaiblity(){
		var i;
		for(i=1;i<=document.getElementById('id_value').value;i++){
			document.getElementById(i+'_new_available').value = (available[i])+(+document.getElementById(i+'_new_seedling').value);
		}
	}
</script>