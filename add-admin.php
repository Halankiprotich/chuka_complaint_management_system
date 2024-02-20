<?php 
include ('menu.php');
include ('header.php'); 
 ?>

<div class="Main">
	<div class="wrapper">
		<h1>Add Admin</h1>
		<br><br>

		<?php
		if (isset($_SESSION['add']))
		 {
			echo $_SESSION['add'];
			unset($_SESSION['add']);
		}
		?>
	</div>
	
	<form action="" method="POST">

		<table class="tbl-30">
			<tr>
				<td>Full Name:</td>
				<td>
					<input type="text" name="full_name" placeholder="Enter Your Name">
				</td>
			</tr>

			<tr>
				<td>Username:</td>
                <td>
                	<input type="text" name="username" placeholder="Your Username">
                </td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					<input type="password" name="password" placeholder="Your Password">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
				</td>
			</tr>
			
		</table>
		
	</form>
</div>



<?php

if (isset($_POST['submit'])) 
{
   //echo "button clicked";
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//create sql query to insert admin details into the database
    $sql= "INSERT INTO tbl_admin SET
     full_name='$full_name',
     username='$username',
     password='$password'
    ";

	//execute query
   $res= mysqli_query($conn, $sql) or die(mysqli_error());
   if ($res==TRUE)
    {
   	//echo "Data inserted";
    	$_SESSION['add']= "<div class='success'>Admin Added Successfully.</div>";

    	header("location:".SITEURL.'Admin/manage-admin.php');
   }
   else
   {
   	//echo "Failed to insert data";
   		$_SESSION['add']= "<div class='error'>Failed to Add Admin.</div>";

    	header("location:".SITEURL.'Admin/add-admin.php');
   }
}

 ?>
