<?php

$con= new mysqli('localhost','root','','php_revision');

if(!$con){
    die(mysqli_error($con));
}
?>