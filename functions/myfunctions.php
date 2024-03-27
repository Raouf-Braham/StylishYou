<?php

session_start();
include('../Admin_dashbord/config/dbcon.php');

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getProductByrate($table,$rate)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $rate >='$rate'";
    return $query_run = mysqli_query($con, $query);
}


?>