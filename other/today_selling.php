<?php 
    //include('../config.php');
    $user = $_GET['user'];
    define('DB_HOST', '127.0.0.1');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'internet');
	define('DB_NAME', 'cazri');
	$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if(!$mysqli)
	{
		die("Connection failed: " . $mysqli->error);
	}
    
    
    
?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>
    <body style="background-color:rgba(78, 107, 78, 0.44);margin:5%;">
        <br><label>Date </label><input type="text" name="date" required="required" value="<?php echo date('d/m/y');?>" readonly/> <br/><br/> 
        <form action="submit.php?u_name=<?php echo $user;?>" onchange="select_price()" method="POST">
            <table id="t01">
                <tr>
                    <th>Name of plant</th>
                    <th>Price</th>
		    <th>Available Stock</th>
                    <th>Incoming plants</th> 
                    <th>Number of Sell</th>
                    <th>Today Income</th>
                </tr>
                <tr>
                    <td>
                        <select id="plant_name" name="p_name"> 
                            <option>--select--</option>
                            <?php			
                                $query = sprintf("SELECT `Name of plant` FROM `plant_list`");
                                $result = $mysqli->query($query);
                                while ($row=mysqli_fetch_array($result)) 
                                {
                                    $Title=$row["Name of plant"];
                                    echo "<option>$Title</option>";
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input id="price1_id" type="number" name="price1" value=0 readonly/>
                    </td>
		    <td>
                        <input id="available" type="number" name="available" value=0 readonly/>
                    </td>
                    <td>
                        <input id="incoming1" type="number" name="incoming1" value=0 placeholder="0"/>
                    </td>
                    <td>
                        <input id="sell1" type="number" name="sell1" value=0 placeholder="0"/>
                    </td>
                    <td>
                        <input id="incoming_income1" type="number" name="today_income" value=0 readonly/>
                    </td>
                </tr>
            </table>
	    <input type="hidden" name="new_availability" id="new_availability">
            <input type="submit" value="submit">
        </form>
    </body> 
</html>

<script>
    var price1;
    var available;
    function select_price(){
   
        var name = document.getElementById('plant_name').value;
        $.ajax({

            url: 'get_price.php?u_name=<?php echo $user?>&p_name='+name,
            method : "GET",
            success: function(data) {
                    if(data[0]){
                        price1 = data[0].price;
			available = data[0].<?php echo $user?>;
			
                    }
                    else{
                        price1 = 0;
                    }
		    document.getElementById('available').value = +available;
                    document.getElementById('price1_id').value = +price1;
                    document.getElementById('incoming_income1').value = ((+price1)*(+(document.getElementById('sell1').value)));
		    document.getElementById('new_availability').value = (+available)+(+(document.getElementById('incoming1').value))-(+(document.getElementById('sell1').value));

            },
            error: function(data) {
                    console.log(data);
                }

        });
	};
</script>
