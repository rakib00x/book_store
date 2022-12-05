<?php

include_once 'dbfun.php';

extract($_POST);
$userid=$_SESSION["userid"];
$result=single("users","userid='$userid' and pwd='$opwd'");

if(isset($result)){
$link= connect();
$query="update users set pwd='$pwd' where userid='$userid'";
mysqli_query($link, $query) or die("Error ".mysqli_error($link));
mysqli_close($link);
$_SESSION["msg"]="Password updated successfully.";
}
else{
    $_SESSION["error"]="Invalid current password";
}
header("location: changepwd.php");
