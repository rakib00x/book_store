<?php
include_once 'dbfun.php';

$query="insert into category(category) values('{$_POST["catname"]}')";

executeDML($query);

$_SESSION["msg"]="Category added successfully";

header("location: categories.php");
