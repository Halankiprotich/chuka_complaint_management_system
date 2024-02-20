<?php

//Authorization - access control
//check whether the admin is logged in or out

if (!isset($_SESSION['admin'])) //if log is not set
 {
 	# code...user is not logged in
 	//redirect to login page with a message
 	$_SESSION['no-login-message']="<div class='error text-center'>Please Login to acesss Admin Panel.</div>";
 	//redirect to login page
 	header('location:'.SITEURL.'Admin/login.php');
 } 
?> 