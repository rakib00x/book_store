<?php
include_once 'dbfun.php';

$query="delete from category where catid='{$_GET["catid"]}'";

executeDML($query);

$_SESSION["msg"]="category deleted successfully";

header("location: categories.php");