<?php
//include database connection
include('../database/connect.php');

//destroy session
session_destroy();
//redirect to login page
header('location:'.SITEURL.'Admin/login.php');
?>