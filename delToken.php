<?php
include_once 'dbfun.php';

$query="delete from token where id='{$_GET["id"]}'";

executeDML($query);

$_SESSION["msg"]="Token deleted successfully";

header("location: createtoken.php");