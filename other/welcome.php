<?php
    include("config.php");
    $user = $_GET['user'];
?>
<html>
    <head>
	    <title>Inventory</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>   
	<body style="background-color:rgba(78, 107, 78, 0.44);margin:5%;">
        <div>
            <h4>Today's Price and Available Stcok in Your Nursery</h4>
        </div>
        <div id="report">
            <?php
                    echo '<button onclick="printdiv(\'report\')">Print</button>
                    <script>
                        function printdiv(printpage)
                        {
                            var headstr = "<html><head><title>Selling</title><link rel=\"stylesheet\" type=\"text/css\" href=\"../css/main.css\"></head><body>";
                            var footstr = "</body>";
                            var newstr = document.all.item(printpage).innerHTML;
                            var oldstr = document.body.innerHTML;
                            document.body.innerHTML = headstr+newstr+footstr;
                            window.print();
                            document.body.innerHTML = oldstr;
                            return false;
                        }
                    </script><br><br><br>';
                    $con=mysqli_connect("localhost","root","internet","cazri");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                   
                    $sql = /*mysqli_query($con,*/("SELECT `Name of plant`, `price`, $user FROM `plant_list`");
                    $result = $con->query($sql) or die("Sql Error :" . $con->error);
                    echo "<table id='t01' border='1'>
                        <tr>
                            <th>Name of Plant</th>
                            <th>Price</th>
                            <th>Stock in Your Nursery</th>
                        </tr>";

                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['Name of plant'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row[$user] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo $result;
                    mysqli_close($con);
                
            ?>
        </div>

    </body>
</html>



