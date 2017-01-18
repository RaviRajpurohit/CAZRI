<?php
    include("../session/config.php");
    $t_date = date('y/m/d');
?>
<html>
    <head>
	    <title>Report</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		<style>
		body{
		background : url(../img/ab7.jpg);
		
		}
		</style>
    </head>   
	<body>
        <div>
          <br><br><br><br><center><h1>Please Submit Query</h1>
            <form action="" method="post">
                <label>Please Select Nursery
				<select name="n_name"> 
                    <option value="all">All Nurseries</option>
                    <?php			
                        $sql = ("SELECT `UserName`, `Name of Nursery` FROM `login`");
                        $result = $db->query($sql) or die("Sql Error :" . $db->error);
                        while ($row = mysqli_fetch_array($result)) 
                        {
							if($row['Name of Nursery']!=Null){
								$Title=$row["UserName"];
								echo "<option value='$Title'>$Title</option>";
							}
                        }
                    ?>
                </select>
                </label> <br><br>
                <br><label>Please Select Date Duration</label><br><br>
                <label>From Date</label><input type="date" name="from_date" required="required" placeholder="dd/mm/yyyy" required="required"/>
                <label>To Date</label><input type="date" name="to_date" required="required" placeholder="dd/mm/yyyy"/>
                <button type="submit" >Submit</button>
            </form>
			</center>
        </div>
        <center><div id="report">
            <?php
				echo '<br><br><button onclick="printdiv(\'report\')">Print</button>
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
                    </script><br>';
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $f_date = $_POST['from_date'];
                    $t_date = $_POST['to_date'];
                    $n_name = $_POST['n_name'];
					$date_f = date("y/m/d", strtotime($f_date));
					$date_t = date("y/m/d", strtotime($t_date));
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    if($n_name != "all"){
                        $sql = ("SELECT * FROM `transaction details` WHERE `Nursery`= '$n_name' AND `Date of Sale` BETWEEN '$date_f' AND '$date_t'");
                    }
                    else{
                        $sql = ("SELECT * FROM `transaction details` WHERE `Date of Sale` BETWEEN '$date_f' AND '$date_t'");
                    }
                    $result = $db->query($sql) or die("Sql Error :" . $db->error);
                    echo "<table id='t01' border='1'>
                        <tr>
                            <th>Nursery</th>
                            <th>Date of Sale</th>
                            <th>Species Name</th>
                            <th>Price per plant</th>
                            <th>No of Seedling</th>
                        </tr>";

                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['Nursery'] . "</td>";
                        echo "<td>" . $row['Date of Sale'] . "</td>";
                        echo "<td>" . $row['Species Name'] . "</td>";
                        echo "<td>" . $row['Price per Plant'] . "</td>";
                        echo "<td>" . $row['No of Seedling'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($db);
                }
				else{
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $sql = ("SELECT * FROM `transaction details` WHERE `Date of Sale` BETWEEN '$t_date' AND '$t_date'");
                    $result = $db->query($sql) or die("Sql Error :" . $db->error);			
					$count = mysqli_num_rows($result);
					if($count>0){
						echo '<h3 align="center">Todays Salling</h3>';
						echo "<table id='t01' border='1'>
							<tr>
								<th>Nursery</th>
								<th>Species Name</th>
								<th>Price per plant</th>
								<th>No of Seedling</th>
							</tr>";

						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>" . $row['Nursery'] . "</td>";
							echo "<td>" . $row['Species Name'] . "</td>";
							echo "<td>" . $row['Price per Plant'] . "</td>";
							echo "<td>" . $row['No of Seedling'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else{
						echo "<h2 >Sorry!!<br>No Seedling Sold Today</h2>";
					}
                    mysqli_close($db);
				}
            ?>
		</div></center>
    </body>
</html>



