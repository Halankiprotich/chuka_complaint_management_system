<?php 
include ('menu.php');
include ('header.php'); 
 ?>

<div class="Main">
	<div class="wrapper">
		<h1>Change Password</h1>
		<br><br>

		<?php 
		if (isset($_GET['Uid']))
		 {
			# code...
			$Uid=$_GET['Uid'];
		 }


		 ?>

		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td class="table-col">Current Password: </td>
					<td class="table-col">
						<input type="password" name="current_password" placeholder="Current Password">
					</td>
				</tr>
				<tr>
					<td class="table-col">New Password: </td>
					<td class="table-col">
						<input type="password" name="new_password" placeholder="New Password">
					</td>
				</tr>
				<tr>
					<td class="table-col">Confirm Password: </td>
					<td class="table-col">
						<input type="password" name="confirm_password" placeholder="Confirm Password">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="Uid" value="<?php echo $Uid; ?>">
						<input type="submit" name="submit" value="Change Password" class="btn-secondary">
						
					</td>
				</tr>
				
			</table>
			
		</form>
		
	</div>
	
</div>

<?php
//check whether the submit button is clicked or not
if (isset($_POST['submit']))  
{
	# code...
	//echo " clicked";

	//1. get data from the form
	$Uid=$_POST['Uid'];
	$current_password=md5($_POST['current_password']);
	$new_password=md5($_POST['new_password']);
	$confirm_password=md5($_POST['confirm_password']);

	//2. check whether the current ID and old password exists/match or not
	//create sql query
	$sql="SELECT * FROM tbl_admin WHERE Uid=$Uid AND password='$current_password'";
	//execute query
	$res=mysqli_query($conn, $sql);

	if ($res==true)
	 {
		# code...
		//check whether data is available or not
		$count=mysqli_num_rows($res);

		if ($count==1)
		 {
			# code...
			//admin exists
			//echo "admin found";
			//check whether new and confirm password match or not
		
			if ($new_password==$confirm_password)
			 {
				# code...
				//update the password
				//echo "password matched";
				//check whether the new password and confirm password match or not
				//create sql query
				$sql2 = "UPDATE tbl_admin SET
				password='new_password'
				WHERE Uid=$Uid
				";

				//3. change password if all above is true
				//excecute the query

				$res2 = mysqli_query($conn, $sql2);
				//check whether the query is executed or not
				if ($res2==true)
				 {
					# code...dissplay success
						$_SESSION['change-pass'] ="<div class='success'>Password changed successfully. </div>";
		        //redirect the admin
		        header('location:'.SITEURL.'Admin/manage-admin.php');
				}
				else
				{
					//display error message
					$_SESSION['change-pass'] ="<div class='error'>Failed to change password. </div>";
		        //redirect the admin
		        header('location:'.SITEURL.'Admin/manage-admin.php');
				}

			}
			else
			{
				// redirect to manage admin with error message
				$_SESSION['pass-not-match'] ="<div class='error'>Password do not match. </div>";
		        //redirect the admin
		        header('location:'.SITEURL.'Admin/manage-admin.php');

			}
		}
		else
	    {
		//admin does not exists set the message and redirect 
		$_SESSION['admin-not-found'] ="<div class='error'>Admin Not Found. </div>";
		//redirect the admin
		header('location:'.SITEURL.'Admin/manage-admin.php');
	}
}
}
?>



