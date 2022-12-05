<?php

include_once 'dbfun.php';
extract($_POST);

$result=single("users","userid='$userid' and pwd='$pwd' limit 1");

if(!empty($result)){
    $_SESSION["userid"]=$result["userid"];
    $_SESSION["uname"]=$result["fname"];
    $_SESSION["role"]=$result["role"];
    $_SESSION["ids"]=$result["id"];

    if($result["role"]=="Admin"){
        header("location: adminhome.php");
    }else{
        header("location: index.php");
    }
}
else{
    $_SESSION["error"]="Invalid username or password";
    header("location: login.php");
}

