
<?php

 
$hostname="localhost";
$username="techkarkhana_bachelor";
$password="techkarkhana_bachelor@p";
$dbname="techkarkhana_bachelor";

if($conn=new mysqli($hostname,$username,$password,$dbname))
//if($conn=new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE))
{
    echo"Connection success";
}
else
{
    echo "not connected";
}

return $conn;

?>
