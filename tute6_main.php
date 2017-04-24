<!DOCTYPE html>
<body>
<center>
<hr><h2>Products Management</h2><hr>
</center>
<h3 class="form1">Please login to the system</h3><!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<style>
.form1{
  display: block;
}
</style>

<script>
$(document).ready(function(){
  $(".btn1").click(function(){
    $(".form1").css({"display":"none"});
  });
});
</script>
-->
<?php
 $servername = "localhost";
 $username = "dwang14";
 $password = "455946";
 $dbname = "dwang14";


 $name = $_POST['username'];
 $pwd = $_POST['password'];
 // Session需要先启动。
 session_start();
 //判断uname和pwd是否赋值
/*
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    if($_POST['username'] == 'soonja' && $_POST['password'] == '123123'){
        






        //这里写跳转的语句 可以访问“控制器、统计表”
    }else{
        //这里写跳转的语句 不可以访问“控制器、统计表”
    }
}

*/



 if(isset($_POST['username']) && isset($_POST['password'])){

 //连接数据库
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }
 //验证内容是否与数据库的记录吻合。
 $sql = "SELECT * FROM users WHERE (username='$name') AND (password='$pwd') ";
 //$sql1 = "SELECT * FROM users where (access=1)";
 //执行上面的sql语句并将结果集赋给result。
 //$result1 = $con ->query($sql1);
 $result = $conn->query($sql);
 //判断结果集的记录数是否大于0
 if ($result->num_rows > 0) {
  $_SESSION['user_account'] = $name;
  // 输出每行数据
  while($row = $result->fetch_assoc()) {
  echo '<p><b>Welcome   ' . $row['username'].'  ';
  echo '<a href="login.php?action=logout">Log Out</a>';
  echo '<form action = "./tute6_insert.php">
<input type="submit" value="Insert">
</form>';
  echo '<form action = "./tute6_update.php">
<input type="submit" value="Update">
</form>';
  echo '<form action = "./tute6_delete.php">
<input type="submit" value="Delete">
</form>';
  echo '<form action = "./tute6_search.php">
<input type="submit" value="Search">
</form> ';
  }
 } 
 else {
  echo "您不是会员，请勿登陆";
 }
 $conn->close(); 
 }
?>


<?php
  // isset(xx) 测试xx是否设置了
  //if(isset($_SESSION['user_account'])){
 // echo '你好，' . $_SESSION['user_account'];
 // }
  //else{
  //echo '游客';
  //}
  //$conn->close();
/*
$username = 'soonja';
$password = '123123';
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) ||
($_SERVER['PHP_AUTH_PW'] != $password)){
 header('HTTP/1.1401 Unauthorized');
 header('WWW-Authenticate:Basic realm="Bad news"');
 exit('<h2>Guitar wars</h2>Sorry,you must enter a username and password to access this page.');
 }
 

session_start();
 if ($_SESSION['user_account']=='Jack'){
 echo "<script language=JavaScript>alert('您没有权限访问当前页面！');location.href='tute6_main.php'</script>";
 exit;
}
*/

?>


 




<form action = "login.php" method="post" class="form1">
Username:<input type="text" name="username" value=""><br/><br/>
Password:<input type="Password" name="password" value="">
<input type="submit" name="submit" value="Submit" class="btn1"><br/>
<a href="signup.php">Sign up</a>
</form>



</body>
</html>
