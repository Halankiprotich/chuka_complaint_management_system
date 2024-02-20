<?php
include ('header.php'); 
//include our database connection
include ('../database/connect.php');

//echo "Delete page";
//check whether the id value is set or not
if (isset($_GET['Uid'])) 
{
	# code...get the value and delete
	//echo "get value and delete";
	$Uid=$_GET['Uid'];


	//delete data from database
	//SQL query to delete data from the database
	$sql="DELETE FROM tbl_category WHERE Uid=$Uid";

	//execute the query
	$res=mysqli_query($conn, $sql);

	//check whether the data is deleted from the database or not
	if ($res==true) 
	{
		# code...set the success message and redirect
		$_SESSION['delete']="<div class='success'>Category Deleted Successfully.</div>";
		//redirect to category page
		header('location:'.SITEURL.'Admin/manage-category.php');
	}
	else
	{
		//set fail message and redirects
		$_SESSION['delete']="<div class='error'>Failed to Deleted Category.</div>";
		//redirect to category page
		header('location:'.SITEURL.'Admin/manage-category.php');

	}

	//redirect to category page with message
}
else
{
	//redirect to category page
	header('location:'.SITEURL.'Admin/manage-category.php');
}

?>