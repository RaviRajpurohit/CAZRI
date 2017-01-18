<?php
    include("../session/config.php");
    $user = $_GET['user'];
	$nursery= $_GET['nursery'];
?>
<html>
    <head>
	    <title>Inventory</title>
		<link href="../css/1/js-image-slider.css" rel="stylesheet" type="text/css" />
		<script src="../css/1/js-image-slider.js" type="text/javascript"></script>
		<link href="../css/generic.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		
    </head>   
	<body <body style="background-color:#177840;margin:5%;">
		<div id="sliderFrame">
			<div id="slider">
				<img src="../img/1.jpg" height="50%"width="50%" alt="Welcome to CAZRI Nuersery Inventory" />
				<img src="../img/2.jpg" height="100%"width="100%" />
				<img src="../img/3.jpg" alt="" height="100%"width="100%"/>
				<img src="../img/4.jpg" height="100%"width="100%"/>
				<img src="../img/5.jpg" height="100%"width="100%"/>
			</div> 
		</div><br><br><br>
        
        <div id="report">
			<div>
				<h3 align="center">Today's Price and Available Stock in Your Nursery</h3>
			</div>
            <?php
				echo '<button onclick="printdiv(\'report\')">Print</button>
                    <script>
                        function printdiv(printpage)
                        {
                            var headstr = "<html><head><title>Selling</title><style>table {width:100%;}table, th, td {border: 1px solid black;    border-collapse: collapse;}th, td {    padding: 5px;    text-align: left;}table#t01 tr:nth-child(even) {    background-color: #eee;}table#t01 tr:nth-child(odd) {    background-color:#fff;}table#t01 th {    background-color: White;    color: Black;}</style></head><body>";
                            var footstr = "</body>";
                            var newstr = document.all.item(printpage).innerHTML;
                            var oldstr = document.body.innerHTML;
                            document.body.innerHTML = headstr+newstr+footstr;
                            window.print();
                            document.body.innerHTML = oldstr;
                            return false;
                        }
                    </script><br><br><br>';
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
			   
				$sql = ("SELECT `Species Name`, `".$nursery."_price`, `$nursery` FROM `plant_list`");
				$result = $db->query($sql) or die("Sql Error :" . $db->error);
				echo "<table id='t01' border='1'>
					<tr>
						<th>Name of Plant</th>
						<th>Price</th>
						<th>Stock in Your Nursery</th>
					</tr>";

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['Species Name'] . "</td>";
					echo "<td>" . $row[$nursery.'_price'] . "</td>";
					echo "<td>" . $row[$nursery] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
				mysqli_close($db);
            ?>
        </div>

    </body>
</html>



