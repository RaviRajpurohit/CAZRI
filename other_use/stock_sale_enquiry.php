<?php
    include("../session/config.php");
    $user = $_GET['user'];
	$nursery = $_GET['nursery'];
	$t_date = date('y/m/d');
?>
<html>
    <head>
	    <title>Selling</title>
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
                <h2><label>Please Select Date Duration</label><br><br><h2>
                <label>From Date</label> <input type="date" name="from_date" required="required" placeholder="dd/mm/yyyy" required="required"/>
                <label>To Date</label> <input type="date" name="to_date" required="required" placeholder="dd/mm/yyyy"/><br>
                <br><button type="submit">Submit</button>
            </form>
        </div>
		</center>
        <div id="report" >
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
                    </script><br>';
                if($_SERVER["REQUEST_METHOD"] == "POST") { 
                    $f_date = $_POST['from_date'];
                    $t_date = $_POST['to_date'];
					$date_f = date("y/m/d", strtotime($f_date));
					$date_t = date("y/m/d", strtotime($t_date));
					
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $sql = ("SELECT * FROM `transaction details` WHERE `Nursery`= '$nursery' AND `Date of Sale` BETWEEN '$date_f' AND '$date_t'");
                    $result = $db->query($sql) or die("Sql Error :" . $db->error);
                    echo "<table id='t01' border='1'>
                        <tr>
                            <th>Date of Sale</th>
                            <th>Species</th>
                            <th>Price per plant</th>
                            <th>No of Seedling</th>
                        </tr>";

                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
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
                    $sql = ("SELECT * FROM `transaction details` WHERE `Nursery`= '$nursery' AND `Date of Sale` BETWEEN '$t_date' AND '$t_date'");
                    $result = $db->query($sql) or die("Sql Error :" . $db->error);			
					$count = mysqli_num_rows($result);
					if($count>0){
						echo '<h1 align="center">Todays Selling</h1>';
						
						echo "<table id='t01' border='1'>
							<tr>
								<th>Species</th>
								<th>Price per plant</th>
								<th>No of Seedling</th>
							</tr>";

						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
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
        </div>
    </body>
</html>



