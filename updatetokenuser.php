<?php
include_once 'dbfun.php';

$userid=trim($_POST['id']);
$token_no = trim($_POST['tok']);
$link=connect();
extract($_POST);
$query="update users set toke_id='$token_no' where id='$userid'";
    mysqli_query($link, $query) or die(mysqli_error($link));


 $_SESSION["msg"] = " Token Is assing user ";
 header("location: customers.php");




