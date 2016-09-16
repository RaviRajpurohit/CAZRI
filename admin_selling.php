<?php
    include("config.php");
    $t_date = date('d/m/y');
?>
<html>
    <head>
	    <title>Report</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>   
	<body style="background-color:rgba(78, 107, 78, 0.44);margin:5%;">
        <div>
            <h1>Please Submit Query</h1>
            <form action="" method="post">
                <label>Plaes Select Nursery</label>
                <select name="n_name">
                    <option value="all">All Nurseries</option>
                    <option value="test1">test1</option>
                    <option value="test2">test2</option>
                    <option value="test3">test3</option>
                </select> <br><br>
                <br><lable>Please Selcet Date Duration</lable><br><br>
                <label>From Date</label><input type="date" name="from_date" required="required" placeholder="yyyy/mm/dd" required="required"/>
                <lable>To Date</lable><input type="date" name="to_date" required="required" placeholder="yyyy/mm/dd"/>
                <button type="submit" >Submit</button>
            </form>
        </div>
        <div id="report">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $f_date = $_POST['from_date'];
                    $t_date = $_POST['to_date'];
                    $n_name = $_POST['n_name'];
		    $date_f = date("Y-m-d", strtotime($f_date));
		    $date_t = date("Y-m-d", strtotime($t_date));
                    if ($n_name == "test1") {
                        $table = "test1";
                    }
                    elseif ($n_name == "test2") {
                        $table = "test2";
                    } 
                    elseif ($n_name == "test3") {
                        $table = "test3";
                    } 
                    
                    $con=mysqli_connect("localhost","root","internet","cazri");
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    if($n_name != "all"){
                        $sql = /*mysqli_query($con,*/("SELECT * FROM `selling` WHERE `UserName`= '$table'AND `Date` BETWEEN '$date_f' AND '$date_t'");
                    }
                    else{
                        $sql = /*mysqli_query($con,*/("SELECT * FROM `selling` WHERE `Date` BETWEEN '$date_f' AND '$date_t'");
                    }
                    $result = $con->query($sql) or die("Sql Error :" . $con->error);
                    echo "<table id='t01' border='1'>
                        <tr>
                            <th>Owner of Nursery</th>
                            <th>Date of selling</th>
                            <th>Name of Plant</th>
                            <th>Price per plant</th>
                            <th>Number of sell</th>
                        </tr>";

                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['UserName'] . "</td>";
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

    </body>
</html>



