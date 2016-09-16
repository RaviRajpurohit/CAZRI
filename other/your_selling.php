<?php
    include("config.php");
    $user = $_GET['user'];
?>
<html>
    <head>
	    <title>Selling</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>   
	<body style="background-color:rgba(78, 107, 78, 0.44);margin:5%;">
        <div>
            <h1>Please Submit Query</h1>
            <form action="" method="post">
                <br><br>
                <br><lable>Please Selcet Date Duration</lable><br><br>
                <label>From Date</label><input type="date" name="from_date" required="required" placeholder="yyyy/mm/dd" required="required"/>
                <lable>To Date</lable><input type="date" name="to_date" required="required" placeholder="yyyy/mm/dd"/>
                <button type="submit" >Submit</button>
            </form>
        </div>
        <div id="report">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {
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
                    $f_date = $_POST['from_date'];
                    $t_date = $_POST['to_date'];
		    $date_f = date("Y-m-d", strtotime($f_date));
		    $date_t = date("Y-m-d", strtotime($t_date));
                    $con=mysqli_connect("localhost","root","internet","cazri");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                   
                    $sql = /*mysqli_query($con,*/("SELECT `Date`, `Name of plant`, `price`, `total sell` FROM `$user` WHERE `Date` BETWEEN '$date_f' AND '$date_t'");
                    $result = $con->query($sql) or die("Sql Error :" . $con->error);
                    echo "<table id='t01' border='1'>
                        <tr>
                            <th>Date of selling</th>
                            <th>Name of Plant</th>
                            <th>Price per plant</th>
                            <th>Number of sell</th>
                        </tr>";

                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['Date'] . "</td>";
                        echo "<td>" . $row['Name of plant'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['total sell'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo $result;
                    mysqli_close($con);
                    
                }
            ?>
        </div>
        <!--button onclick="print_page()">Print</button-->
    </body>
</html>



