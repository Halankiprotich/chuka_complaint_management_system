<?php

include ('header.php'); 
//include our database connection
include ('../database/connect.php');
echo $Uid=$_GET['Uid'];

//create sql query to delete data from the database
$sql="DELETE FROM tbl_admin WHERE Uid=$Uid";
//execute the query
$res=mysqli_query($conn, $sql);

if ($res==TRUE)
 {
	# code...
//echo "Admin Deleted Successfully";
 	$_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
 	header('location:'.SITEURL.'Admin/manage-admin.php');
}
else
{
//echo "Failed to Delete Admin";
	$_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again.</div>";
	header('location:'.SITEURL.'Admin/manage-admin.php');
}

?>