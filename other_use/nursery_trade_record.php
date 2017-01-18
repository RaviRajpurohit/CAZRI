<?php 
	$nursery = $_GET['nursery'];
    $user = $_GET['user'];
	include('../session/config.php');
	if(!$db)
	{
		die("Connection failed: " . $db->error);
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
		<h1 align="center">Nursery Trade Record</h1> <br>
        <br><label>Date </label><input type="text" name="date" required="required" value="<?php echo date('d/m/y');?>" readonly/> <br/><br/> 
        <form action="other/submit.php?u_name=<?php echo $user;?>&nursery=<?php echo $nursery;?>" onchange="new_trade()" method="POST">
            <table id="t01">
                <tr>
                    <th>Species Name</th>
					<th>Price</th>
					<th>Number of Seedling Sold</th>
					<th>Total Revenue</th>
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
						echo "<td><input type='text' id='".$id."_plant' name='".$id."_plant' value='" . $row['Species Name'] . "' readonly></td>";
						echo "<td><input type='number' id='".$id."_price' name='".$id."_price' value='" . $row[$nursery.'_price'] . "' readonly></td>";
						echo "<td><input type='number' id='".$id."_seedling_sold' name='".$id."_seedling_sold' value=0 ></td>";
						echo "<td><input type='number' id='".$id."_total_revenue' name='".$id."_total_revenue' value='0' readonly></td>";
						echo "<td><input type='number' id='".$id."_new_available' name='".$id."_new_available' value='".$row[$nursery]."' readonly></td>";
						echo "</tr>";
						echo "<script>available[".$id."] = ".$row[$nursery].";</script>";
					}
					echo "</table>";
					echo "<input type='hidden' id='id_value' name='id_value' value=".$id.">";
				?>
            </table>
			<input type="hidden" name="new_availability" id="new_availability">
            <br><br><input type="submit" value="submit">
        </form>
    </body> 
</html>

<script>
    function new_trade(){
		var i;
		for(i=1;i<=document.getElementById('id_value').value;i++){
			document.getElementById(i+'_total_revenue').value = (+document.getElementById(i+'_price').value)*(+document.getElementById(i+'_seedling_sold').value);
			document.getElementById(i+'_new_available').value = (available[i])-(+document.getElementById(i+'_seedling_sold').value);
		}
	}
</script>