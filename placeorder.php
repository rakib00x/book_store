<?php
include_once 'dbfun.php';

$userid=$_SESSION["userid"];
$token_no = trim($_POST['token']);
$total_amount = trim($_POST['totalamount']);
$link=connect();
extract($_POST);

// $dataToken = mysqli_query($link,"select from token where token='$token_no'");
//  mysqli_fetch_assoc($dataToken);

$row = single("token", "number='$token_no'")["number"];

if($row){

   $amount = single("token", "number='$token_no'")["amount"];
 // $finalamount = $amount - $total_amount;
 $today = date('Y-m-d');
$last_date = single("token", "number='$token_no'")["last_date"];


if($last_date > $today){
 if($amount > $total_amount){

 $finalamount = $amount - $total_amount;


   mysqli_query($link,"insert into cust_address(userid,name,mobile,pin,state,city,address) 
values('$userid','$name','$mobile','$pin','$state','$city','$address')") or die(mysqli_error($link));
$addressid=mysqli_insert_id($link);



 $query="update token set amount='$finalamount' where number='$token_no'";
    mysqli_query($link, $query) or die(mysqli_error($link));



mysqli_query($link,"insert into orders(userid,addressid) values('$userid','$addressid')");
$orderid=mysqli_insert_id($link);


mysqli_query($link,"INSERT INTO order_details(prodid,qty,order_id) select prodid,qty,$orderid from cart c where c.userid='$userid'");

mysqli_query($link,"delete from cart where userid='$userid'");

$_SESSION["msg"] = "Order placed successfully orderid $orderid";

echo "<script type=\"text/javascript\">
    window.open('invoice.php?orderid=".$orderid."', '_blank');
    location.href='order-complete.php?orderid=".$orderid."';    
</script>";

 }else{
  $_SESSION["msg"] = "Amount Is Short in Product Price";
 header("location: checkout.php");
 }
}else{
   $_SESSION["msg"] = "Date Is Expire";
 header("location: checkout.php");
}

}else{
$_SESSION["msg"] = "$token_no Token is not match ";
 header("location: checkout.php");

}
?>
