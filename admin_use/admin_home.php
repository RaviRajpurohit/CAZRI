<?php 
	include('../session/config.php');
?>
<html>
	<head>
		<link href="../css/1/js-image-slider.css" rel="stylesheet" type="text/css" />
		<script src="../css/1/js-image-slider.js" type="text/javascript"></script>
		<link href="../css/generic.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="../css/main.css">
	</head>
	<body style="background-color:#177840;margin:5%;">
		<div id="sliderFrame">
			<div id="slider">
				 <img src="../img/1.jpg" height="50%"width="50%" alt="Welcome to CAZRI Nuersery Inventory" />
				<img src="../img/2.jpg" height="100%"width="100%" />
				<img src="../img/3.jpg" alt="" height="100%"width="100%"/>
				<img src="../img/4.jpg" height="100%"width="100%"/>
				<img src="../img/5.jpg" height="100%"width="100%"/>
			</div> 
		</div><br><br><br>
		<div id="nersuries_list" align="center">
			<h2>Nurseries Information</h2>
			<?php
				$table = 'login';
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				$sql = ("SELECT * FROM `$table` ");
				$result = $db->query($sql) or die("Sql Error :" . $db->error);
				echo "<table id='t01' border='1'>
					<tr>
						<th>Nursery</th>
						<th>Contact Person</th>
						<th>Location</th>
						<th>Contact No.</th>
					</tr>";

				while($row = mysqli_fetch_array($result))
				{
					if($row['UserName']!='admin'){
						echo "<tr>";
						echo "<td>" . $row['Name of Nursery'] . "</td>";
						echo "<td>" . $row['Name of owner'] . "</td>";
						echo "<td>" . $row['Location'] . "</td>";
						echo "<td>" . $row['contact no'] . "</td>";
						echo "</tr>";
					}
				}
				echo "</table>";
				mysqli_close($db);
            ?>
		</div>
	</body>
</html>