<?php
	include('../session/config.php');
	$id = 0;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
		$i = $_POST['id_value'];
		while($i>0){
			$p_name = $_POST[$i.'_plant'];
			$CAZRI_price = $_POST[$i.'_CAZRI_price'];
			$Bujawar_price = $_POST[$i.'_Bujawar_price'];
			$Chandan_price = $_POST[$i.'_Chandan_price'];
			$sql = "UPDATE plant_list SET `CAZRI_price` = '$CAZRI_price', `Bujawar_price`='$Bujawar_price', `Chandan_price`='$Chandan_price' WHERE `Species Name` = '$p_name'";
			$db->query($sql);
			$i = $i-1;
		}
    }
?>
<html>
        <head>
        <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		
	<style>
		body{
		background : url(../img/ab7.jpg);
		}
		</style>
    </head>
    <body style="background-color:rgba(78, 107, 78, 0.44);margin:5%;">
        <b><h2 align="center">Set Price of Listed Plant</h2>
        <form action="" method="POST">
			<?php
				$sql = ("SELECT * FROM `plant_list`");
				$result = $db->query($sql) or die("Sql Error :" . $db->error);
				echo "<table id='t01' border='1'>
					<tr>
						<th>Sr. No.</th>
						<th>Species Name</th>
						<th>Price in Central Nursery</th>
						<th>Price in Bujawar Nursery</th>
						<th>Price in Chandan Nursery</th>
					</tr>";

				while($row = mysqli_fetch_array($result))
				{
					$id = $id + 1;
					echo "<tr>";
					echo "<td>" . $id . "</td>";
					echo "<td><input type='text' name='".$id."_plant' value='" . $row['Species Name'] . "' readonly></td>";
					echo "<td><input type='text' name='".$id."_CAZRI_price' value='" . $row['CAZRI_price'] . "' /></td>";
					echo "<td><input type='text' name='".$id."_Bujawar_price' value='" . $row['Bujawar_price'] . "' /></td>";
					echo "<td><input type='text' name='".$id."_Chandan_price' value='" . $row['Chandan_price'] . "' /></td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<input type='hidden' name='id_value' value=".$id.">";
			?>
			<br><br><button type="submit">Update Price</button>
        </form>
    	</b> 
    </body>
</html>