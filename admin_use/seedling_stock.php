<?php
    include("../session/config.php");
?>
<html>
    <head>
	    <title>Seedling Stock</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		
		<style>
		body{
		background : url(../img/ab7.jpg);
		
		
		}
		</style>
    </head>   
	<body>
        <div id="report">
			<div>
				<h2 align="center">Price and Available Stcok in Nurseries</h2>
			</div>
            <?php
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                   
                    $sql = ("SELECT * FROM `plant_list`");
                    $result = $db->query($sql) or die("Sql Error :" . $db->error);
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
                    echo "<table id='t01' border='1'>
                        <tr>
                            <th>Species Name</th>
                            <th>Price in Central Nursery</th>
                            <th>Stock in Central Nursery</th>
							<th>Price in Bujawar Nursery</th>
                            <th>Stock in Bujawar Nursery</th>
							<th>Price in Chandan Nursery</th>
                            <th>Stock in Chandan Nursery</th>
                        </tr>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['Species Name'] . "</td>";
                        echo "<td>" . $row['CAZRI_price'] . "</td>";
                        echo "<td>" . $row['CAZRI'] . "</td>";
						echo "<td>" . $row['Bujawar_price'] . "</td>";
                        echo "<td>" . $row['Bujawar'] . "</td>";
						echo "<td>" . $row['Chandan_price'] . "</td>";
                        echo "<td>" . $row['Chandan'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($db);
                
            ?></div>
    </body>
</html>