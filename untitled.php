<?php

 $servername = "localhost";
 $username = "dwang14";
 $password = "455946";
 $dbname = "dwang14";
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }
//if(isset($_POST('submit'))){
$username=$_POST['username'];
$sql = "SELECT * from users where (username='$username')";
$result = $conn ->query($sql);
if ($result -> num_rows >0) {
	echo "username already exist";
}else{
	echo "the username is not existed";
}
$conn ->close();
//}


?>