<!DOCTYPE html>
<body>
<center>
<hr><h2>Products Management</h2><hr>
<hr>
<h3>Please login to the system</h3>
</center>
<?php
 $servername = "localhost";
 $username = "dwang14";
 $password = "455946";
 $dbname = "dwang14";
 //判断uname和pwd是否赋值

if(!isset($_POST['submit'])){
 	exit('非法访问！');
}
 if(isset($_POST['username']) && isset($_POST['password'])){
     $name = $_POST['username'];
     $pwd = $_POST['password'];
      //连接数据库
    $conn = new mysqli($servername, $username, $password, $dbname);
     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      //验证内容是否与数据库的记录吻合。
     $results=mysqli_query($conn, "SELECT access FROM users WHERE username='$name' AND password='$pwd'");
        //执行上面的sql语句并将结果集赋给result。
     //$result = $conn->query($sql);
         //判断结果集的记录数是否大于0
           //if ($result->num_rows > 0) {
             //$_SESSION['user_account'] = $name;
             //$_SESSION['password']=$password;
                    // 输出每行数据
      //$row = $result->fetch_assoc(MYSQLI_ASSOC); 

      $row = mysqli_fetch_array($results);
        
          session_start();
          $_SESSION['username']= $row['username'];
          $_SESSION['access']=$row['access'];
          switch($row['access']){
            case 2:
            echo '<p><b>Welcome   ' . $name.'  ';
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
            break;
            case 1:
            echo '<p><b>Welcome   ' . $name.'  ';
            echo '<form action = "./tute6_search.php">
            <input type="submit" value="Search">
            </form> ';
            break;
            default:
             echo '<b>Invalid username/password</b><br/>';
            echo '<br>';
            echo '<form action = "login1.php" method="post">';
            echo 'Username:<input type="text" name="username" value=""><br/><br/>';
            echo 'Password:<input type="Password" name="password" value="">';
            echo '<input type="submit" name="submit" value="Submit"><br/>';
            echo '<a href="signup.php">Sign up</a>
             </form>';
          }
          
       }    
        
       
  
unset($_SESSION['username']);
unset($_SESSION['access']);
mysqli_free_result($results);
mysqli_close($conn); 
?>
<!--
<form action = "./tute6_insert.php">
<input type="submit" value="Insert">
</form>
<form action = "./tute6_update.php">
<input type="submit" value="Update">
</form>
<form action = "./tute6_delete.php">
<input type="submit" value="Delete">
</form>
<form action = "./tute6_search.php">
<input type="submit" value="Search">
</form> 
-->
</body>
</html>