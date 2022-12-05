<?php
include_once 'dbfun.php';

if (!isset($_SESSION["userid"])) {
    $_SESSION["error"] = "Please login first.";
    header("location: login.php");
} else {

$query="insert into token(number,amount,last_date) values('{$_POST["number"]}','{$_POST["amount"]}','{$_POST["last_date"]}')";

executeDML($query);

$_SESSION["msg"]="Token Generator to successfully";

header("location: createtoken.php");
}
