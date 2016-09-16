<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $p_name = $_POST['p_name'];
        $price = $_POST['price'];
        $username = "root";
        $password = "internet";
        $dbname = "cazri";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE plant_list SET `price` = '$price' WHERE `Name of plant` = '$p_name'";

        if ($conn->query($sql) === TRUE) {
            echo '<div width=100% class="login"><h2 style="color:wheat">Record updated successfully</h2></div>';
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
?>
<html>
        <head>
        <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>
    <body style="background-color:rgba(78, 107, 78, 0.44);margin:5%;">
        <b><br><br><br/> <h3>Set Price of Listed Plant</h3>
        <form action="" onchange="select_price()" method="POST">
            <lable>Please Select Plant</lable>
            <select id="plant_name" name="p_name"> 
                <option>--select--</option>
                <?php
                    define('DB_HOST', '127.0.0.1');
                    define('DB_USERNAME', 'root');
                    define('DB_PASSWORD', 'internet');
                    define('DB_NAME', 'cazri');
                    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
                    if(!$mysqli)
                    {
                        die("Connection failed: " . $mysqli->error);
                    }
                    $query = sprintf("SELECT `Name of plant` FROM `plant_list`");
                    $result = $mysqli->query($query);
                    while ($row=mysqli_fetch_array($result)) 
                    {
                        $Title=$row["Name of plant"];
                        echo "<option>$Title</option>";
                    }
                ?>
            </select><br><br>
            <lable>Price</lable>
            <input id="price1_id" type="text" name="price" placeholder=0 >
            <input type="submit" value="submit">
        </form>
    	</b> 
    </body>
</html>
