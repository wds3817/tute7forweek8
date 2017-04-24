<?php
$pwd= $_POST['password'];
$rpwd= $_POST['rpassword'];
if($pwd==$rpwd){
	echo 'The password matched with the retyped password';
}elseif ($rpwd==$pwd) {
	echo 'The retype password matched with the password';
}else {
	echo 'the password is not match up with the retyped password';
}


?>