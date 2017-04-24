<!DOCTYPE html>
<body>
<center>
<hr><h2>Sign Up</h2><hr>
<hr>
</center>
<form action = "regicheck.php" method="post">
Username:<input type="text" name="username" value="">
<?php
include('check.php');
?>
<br/>
Password:<input type="Password" name="password" value="">
<?php
include('check1.php');
?>
<br/>
Retype Password:<input type="Password" name="password1" value="">
<?php
include('check1.php');
?>
<br/>
<input type="submit" name="submit" value="Sign Up"><br/>
<a href="tute6_main.php">Back to main page</a>
</form>
</body>
</html>