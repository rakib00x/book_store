<?php

include_once 'dbcon.php';
ob_start();
session_start();
date_default_timezone_set("Asia/Calcutta");
setlocale(LC_MONETARY, 'en_IN');

function connect() {
    $link = mysqli_connect(HOST, USER, PASSWORD, DBNAME) or die("Error " . mysqli_connect_error());
    return $link;
}

function singledata($query) {
    $link = connect();
    $result = mysqli_query($link, $query) or die("Error " . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row;
}

function alldatasql($query) {
    $link = connect();
    $result = mysqli_query($link, $query) or die("Error " . mysqli_error($link));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($link);
    return $rows;
}

function allrecords($table) {
    $link = connect();
    $result = mysqli_query($link, "SELECT * FROM $table") or die("Error " . mysqli_error($link));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($link);
    return $rows;
}

function single($table, $condition) {
    $link = connect();
    $result = mysqli_query($link, "SELECT * FROM $table WHERE $condition")
            or die("Error " . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row;
}

function findall($table, $condition) {
    $link = connect();
    $result = mysqli_query($link, "SELECT * FROM $table WHERE $condition")
            or die("Error " . mysqli_error($link));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    mysqli_close($link);
    return $rows;
}

function countrecords($table) {
    $link = connect();
    $result = mysqli_query($link, "SELECT count(*) as total FROM $table") or die("Error " . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row["total"];
}

function countifrecords($table, $condition) {
    $link = connect();
    $result = mysqli_query($link, "SELECT count(*) as total FROM $table WHERE $condition") or die("Error " . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
    return $row["total"];
}

function executeDML($query) {
    $link = connect();
    mysqli_query($link, $query);
    mysqli_close($link);
}

function executeProc($procname, $hasoutput = true, ...$params) {
    $link = connect();
    $count = count($params);
    $types = str_repeat("s", $count);
    $args = join(",", array_fill(0, $count, "?"));
    if ($hasoutput) {
        echo "call $procname($args,@output)";
        $stmt = mysqli_prepare($link, "call $procname($args,@output)");
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        mysqli_stmt_execute($stmt) or die("Error ". mysqli_error($link));        
        $result = mysqli_query($link, "select @output as output");
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        return $row["output"];
    }
    else{
        $stmt = mysqli_prepare($link, "call $procname($args)");
        mysqli_stmt_bind_param($stmt, $types, ...$params);
        mysqli_stmt_execute($stmt);
        mysqli_close($link);
    }
}

function is_logged_in() {
    if (isset($_SESSION['userid'])) {
        return true;
    }
    return false;
}

function login_error_redirect($url = 'login.php') {
    $_SESSION['error'] = 'You must be logged in to access that page';
    header('LOCATION: ' . $url);
}

function permission_error_redirect($url = 'login.php') {
    $_SESSION['error'] = 'You do not have permission to access that page';
    header('LOCATION: ' . $url);
}

function pretty_date($date) {
    return date("M d, Y", strtotime($date));
}

function money($number) {
    return number_format($number, 2);
}

function numberToRoman($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if ($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
