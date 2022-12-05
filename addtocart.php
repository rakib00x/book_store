<?php

include_once 'dbfun.php';
if (!isset($_SESSION["userid"])) {
    $_SESSION["error"] = "Please login first.";
    header("location: login.php");
} else {
    $userid = $_SESSION["userid"];
    extract($_GET);
    $link = connect(); 

    $query = "insert into cart values('$userid','$prodid','$qty')";
    mysqli_query($link, $query);

    $_SESSION["msg"] = "Product added to cart successfully";

    header("location: filter-products.php");
}