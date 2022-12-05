<?php
include_once 'dbfun.php';
extract($_POST);

$prodid=executeProc("AddBook", true, $pname,$pcat,$price,$disc_price,$author,$publisher,$year,$isbn,$descr);

$photofile=$_FILES["pic"]["tmp_name"];
$pdffile=$_FILES["pdf"]["tmp_name"];

move_uploaded_file($photofile, "books/$prodid.jpg");
move_uploaded_file($pdffile, "PDFs/$prodid.pdf");

$_SESSION["msg"]="Book added successfully";

header("location: products.php");