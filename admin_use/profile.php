<?php 
	include('../session/config.php');
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<style>
		body{
		background : url(../img/ab7.jpg);
		
		
		}
		</style>
	</head>
	
	<body>
		<br>
		<form action="" method="post">
			<input type="hidden" name="update" value="admin">
			<button type="submit">Change Own Information</button>
		</form>
		<div style="" align="center">
		<br><h2 style='color:White;'>
			To Update The Nurser's Information Select One 
		</h2><br>
		<form action="" method="POST">
			<?php
				$sql = ('SELECT * FROM `login`');
				$result = $db->query($sql) or die("Sql Error :" . $db->error);
				echo "<table id='t01' border='1'>
					<tr>
						<th>UserName</th>
						<th>Nursery</th>
						<th>Contact Person</th>
						<th>Location</th>
						<th>Contact No.</th>
					</tr>";

				while($row = mysqli_fetch_array($result))
				{
					if($row['UserName']!='admin'){
						echo "<tr>";
						echo "<td><label><input type='radio' name='update' value=".$row['UserName']."> ".$row['UserName']."</label></td>";
						echo "<td>" . $row['Name of Nursery'] . "</td>";
						echo "<td>" . $row['Name of owner'] . "</td>";
						echo "<td>" . $row['Location'] . "</td>";
						echo "<td>" . $row['contact no'] . "</td>";
						echo "</tr>";
					}
				}
				echo "</table>";
			?><br>
			<button type="submit">Let It Update!</button>
		</form></div>
	</body>
	<?php
			if($_SERVER["REQUEST_METHOD"]=='POST'){
				if(isset($_POST['update'])){
					$update=$_POST['update'];
					echo "<br><br><center><div><label>";
					$sql = ("SELECT * FROM `login` WHERE `UserName` = '$update'");
					$result = $db->query($sql) or die("Sql Error :" . $db->error);
					echo "<form action='update.php' method='POST'>";
					$row = mysqli_fetch_array($result);
					if($update!='admin'){
						echo "<table id='t01' border='1'>
						<tr><th>Nursery(can't change): <input type='text' name='nursery_name' value='" . $row['Name of Nursery'] . "'readonly></th></tr>
						<tr></tr>
						<tr>
							<th>UserName</th>
							<th>Password</th>
							<th>Contact Person</th>
							<th>Location</th>
							<th>Contact No.</th>
						</tr>";
						echo "<tr>";
						echo "<td><input type='text' name='username' value='".$row['UserName']."'></td>";
						echo "<td><input type='password' name='password' value='".$row['Password']. "'></td>";
						echo "<td><input type='text' name='contact_person' value='" . $row['Name of owner'] . "'></td>";
						echo "<td><input type='text' name='location' value='" . $row['Location'] . "'></td>";
						echo "<td><input type='number' name='contact_no' value='" . $row['contact no'] . "'></td>";
						echo "</tr>";
					}
					else{
						echo "<table id='t01' border='1'>
						<tr>
							<th>UserName (can't change)</th>
							<th>Password</th>
							<th>Contact Person</th>
							<th>Location</th>
							<th>Contact No.</th>
						</tr>";
						echo "<tr>";
						echo "<td><input type='text' name='username' value='".$row['UserName']."'readonly></td>";
						echo "<td><input type='password' name='password' value='".$row['Password']. "'></td>";
						echo "<td><input type='text' name='contact_person' value='" . $row['Name of owner'] . "'></td>";
						echo "<td><input type='text' name='location' value='" . $row['Location'] . "'></td>";
						echo "<td><input type='number' name='contact_no' value='" . $row['contact no'] . "'></td>";
						echo "</tr>";
					}
					echo "</table><br><button type='submit'>Update</button>";
					echo "</form>";
					echo "</div></center>";
				}
				else{
					echo "<h2 align='center' style='color:red;'>Please select one nursery";
				}
			}
		?>
		
</html>