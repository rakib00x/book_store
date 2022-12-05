<?php
include_once 'dbfun.php';

if (!isset($_SESSION["userid"])) {
    $_SESSION["error"] = "Please login first.";
    header("location: login.php");
} else {

$query="insert into review(product_id,userid,name,review_star,review_details) values('{$_POST["prodid"]}','{$_POST["userid"]}','{$_POST["username"]}','{$_POST["rating"]}','{$_POST["review_message"]}')";

executeDML($query);

$_SESSION["msg"]="Review Sent to successfully";

header("location: index.php");
}
