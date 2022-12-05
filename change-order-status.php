<?php
include_once 'dbfun.php';

$oid=$_GET["oid"];
$status=$_GET["st"]=="y" ? "Confirmed" : "Cancelled";
if($status=="Cancelled"){
    executeProc("CancelOrder", false, $oid);
}
else{
    executeProc("ConfirmOrder", false, $oid);
}
$_SESSION["msg"] = "Order $status successfully for orderid $oid";
header("location: orders.php");

