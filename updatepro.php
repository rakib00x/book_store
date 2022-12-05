<?php
include_once 'dbfun.php';
extract($_POST);

executeProc("UpdateBook", false, $pname,$pcat,$price,$disc_price,$author,$publisher,$year,$isbn,$descr,$prodid);

$_SESSION["msg"]="Book updated successfully";

header("location: products.php");