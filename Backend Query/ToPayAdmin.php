<?php
if(isset($_POST['search']))
{
	
	$Search = $_POST['Search'];
	$query ="SELECT * FROM b_order WHERE (Order_ID = (SELECT max(Order_ID) FROM user_info JOIN b_order WHERE MobileNumber LIKE '%".$Search."%'";

if(   	$result = filterTable($query))
{
    echo "jony";
}
   
}
else{
	
	$query = "SELECT * FROM `user_info` join b_order where user_info.User_ID=b_order.User_ID";
	$result = filterTable($query);
	
}

function filterTable($query){
	$conn = mysqli_connect("localhost","techkarkhana_bachelor","techkarkhana_bachelor@p","techkarkhana_bachelor");
	$result = mysqli_query($conn, $query);
	return $result;
	
}

?>



<?php
/*$Paid_Amount=$_POST['Paid_Amount'];
	$conn = mysqli_connect("localhost","techkarkhana_bachelor","techkarkhana_bachelor@p","techkarkhana_bachelor");
	if(!$conn){
	   
	die("Database connection failed ".$conn->connect_error);
	}
	if(isset($_POST['submit']))
	{
	
    // $query="insert into b_order(Paid_Amount)values('$Paid_Amount')";

    $query="insert into b_order(Paid_Amount)values('$Paid_Amount') WHERE (Order_ID = (SELECT max(Order_ID) FROM b_order WHERE User_ID = ?))";
	}
    if(!mysqli_query($query,$conn)){
       die("Error in inserting records ".connect_error);
    
    }

    else{
        echo "1";
    }
echo "2";

//else {echo "2";}*/

?>





<style>
table,tr,th,td
{
	
	border: solid black;
}

</style>

<form action = "ToPayAdmin.php" method="POST">

<input type="text" name="Search" placeholder="Search"><br><br>
<input type="submit" name="search" value= "Submit"><br><br>


	<table>
		<tr>
		    <th>User ID</th>
			<th>Name</th>
			<th>Mobile number</th>
			<!--<th>Total Meal</th>
			<th>Total cost</th>
			<th>Meal rate</th>
			<th>To pay</th>
			<th>Paid amount</th>
			<th>Date</th>
			<th>Time</th>
			<th>Order ID</th>-->
			
		</tr>
		
		
		<?php 
		while($row= mysqli_fetch_array($result)):?>
	<tr>
		
		
		<td><?php echo $row['MobileNumber'];?></td>
	
		
		
	</tr>
	
	<?php endwhile;?>
	

	</table><br><br>
	
	

</form>




