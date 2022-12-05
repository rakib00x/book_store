<?php
include_once 'dbfun.php';

$prodid=$_GET["prodid"];
$userid=$_SESSION["userid"];

$query="delete from cart where userid='$userid' and prodid='$prodid'";

executeDML($query);

$_SESSION["msg"]="Item removed from cart";
header("location: index.php");

