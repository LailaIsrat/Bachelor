<?php
require_once 'DB_Functions.php';
$db=new DB_Functions();

//json response array
$response=array("error"=>FALSE);

if(isset($_GET['Total_Meal'])&&isset($_GET['Total_cost'])&& isset($_GET['Total_Lunch']) && isset($_GET['Total_Dinner'])&&isset($_GET['Meal_Rate'])&&isset($_GET['To_Pay'])&& isset($_GET['Paid_Amount'])&& isset($_GET['User_ID'])){
    
    

//receiving   the post params
	$Total_Meal=$_GET['Total_Meal'];
	$Total_cost=$_GET['Total_cost'];
	$Total_Lunch=$_GET['Total_Lunch'];
	$Total_Dinner=$_GET['Total_Dinner'];
	$Meal_Rate=$_GET['Meal_Rate'];
	$To_Pay=$_GET['To_Pay'];
	$Paid_Amount=$_GET['Paid_Amount'];
	$User_ID=$_GET['User_ID'];
	$Order_ID=$_GET['Order_ID'];
	
//	echo"$Order_ID";
	//*******************************************
	
	  /*  $servername = "localhost";
		$username = "techkarkhana_bachelor";
		$password = "techkarkhana_bachelor@p";
		$dbname = "techkarkhana_bachelor";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			 die("Connection failed: " . $conn->connect_error);
		}
		
		$sql="SELECT * FROM b_order WHERE Order_ID = (SELECT max(Order_ID) FROM b_order WHERE User_ID = User_ID";
                  // $sql = "select * FROM user_info WHERE MobileNumber=$MobileNumber AND Password=$Password";
		$result = $conn->query($sql);
             if ($result->num_rows > 0) {
			 while($user = $result->fetch_assoc()) {*/
                   
	
	
	//***************************************************

	$order = $db->getOrderByPaymentStatus($Total_Meal,$Total_cost,$Total_Lunch,$Total_Dinner,$Meal_Rate,$To_Pay,$Paid_Amount,$User_ID,$Order_ID);


	if($order!=false){

	
//user is found
	$response["error"] = FALSE;
	$response["b_order"]["Order_ID"]=$order["Order_ID"];
	$response["b_order"]["Lunch_Amount"]= $order["Lunch_Amount"];
	$response["b_order"]["Guest_Lunch_Amount"]= $order["Guest_Lunch_Amount"];
	$response["b_order"]["Dinner_Amount"]= $order["Dinner_Amount"];
	$response["b_order"]["Guest_Dinner_Amount"]= $order["Guest_Dinner_Amount"];
	$response["b_order"]["Total_Lunch"]=$order["Total_Lunch"];
	$response["b_order"]["Total_Dinner"]= $order["Total_Dinner"];
	$response["b_order"]["Total_Meal"]=$order["Total_Meal"];
	$response["b_order"]["Total_cost"]= $order["Total_cost"];
	$response["b_order"]["Meal_Rate"]= $order["Meal_Rate"];
	$response["b_order"]["To_Pay"]= $order["To_Pay"];
	$response["b_order"]["Paid_Amount"]= $order["Paid_Amount"];
	$response["b_order"]["Date"]= $order["Date"];
	$response["b_order"]["Time"]=$order["Time"];
	$response["b_order"]["User_ID"]=$order["User_ID"];
//	$response["user_info"]["User_ID"]= $order["User_ID"];
	
//	echo "6";
//echo "<br>";


	echo json_encode($response);
  }
 //********************************************** 
/*  else{

$response["error"]=TRUE;
$response["error_msg"]="Login credentials are Wrong.Please try again!";
echo json_encode($response);
}
				 
			 }
		} */
//*********************************************************		
  

else{
//user is not found with the credentials

$response["error"]=TRUE;
$response["error_msg"]="payment status are Wrong.Please try again!";
echo json_encode($response);

   }
  }
else{
   // echo "7";
//echo "<br>";
//required post params is missing
$response["error"]=TRUE;
$response["error_msg"]="Required parameters Total_Meal Total_Cost Total_Lunch Total_Dinner Meal_Rate To_Pay Paid_Amount is missing!";

echo json_encode($response);
}

?>

	
