<?php 
include ('menu.php');
include ('header.php'); 
?>

	<!--Main content begins here-->
	<div class="Main">
		<div class="wrapper">
			<h1>Manage Admin</h1>
			<br>

			<?php
			if (isset($_SESSION['add']))
			 {
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}

			if (isset($_SESSION['delete']))
			 {
				# code...
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);
			}
			if (isset($_SESSION['Update']))
			 {
				# code...
				echo $_SESSION['update'];
				unset($_SESSION['update']);
			}
			if (isset($_SESSION['admin-not-found'])) 
			{
				# code...
				echo $_SESSION['admin-not-found'];
				unset($_SESSION['admin-not-found']);
			}
			if (isset($_SESSION['pass-not-match']))
			 {
				# code...
				echo $_SESSION['pass-not-match'];
				unset($_SESSION['pass-not-match']);
			}
			if (isset($_SESSION['change-pass']))
			 {
				# code...
				echo $_SESSION['change-pass'];
				unset($_SESSION['change-pass']);
			}


			?>
			<br><br><br>

			<!--Button to add admin-->

			<a href="Add-Admin.php" class="btn-primary">Add Admin</a>
			<br><br>
			
			<table class="tbl-full">
				
				<tr class="table-row">
					<th class="table-col">S.N.</th>
					<th class="table-col">Full Name</th>
					<th class="table-col">Username</th>
					<th class="table-col">Actions</th>
				</tr>
				
				<?php
				//create sql query to show all admins
				$sql="SELECT * FROM tbl_admin";
				//execute the query
				$res= mysqli_query($conn, $sql);

				if ($res == TRUE)
				 {
					//count rows
					$count = mysqli_num_rows($res);

					$sn=1; 

					if ($count>0)
					 {
						while ($rows=mysqli_fetch_assoc($res))
						 {
							# code...
							$Uid=$rows['Uid'];
							$full_name=$rows['full_name'];
							$username=$rows['username'];

							?>

							<tr class="table-col">
					<td class="table-col"><?php echo $sn++; ?></td>
					<td class="table-col"><?php echo $full_name; ?></td>
					<td class="table-col"><?php echo $username; ?></td>
					<td class="table-col">
						<a href="<?php echo SITEURL;?>admin/change-password.php?Uid=<?php echo $Uid; ?>" class="btn-primary">Change Password</a>
						<a href="<?php echo SITEURL;?>admin/update-admin.php?Uid=<?php echo $Uid; ?>" class="btn-secondary">Update Admin</a>
						<a href="<?php echo SITEURL;?>admin/delete-admin.php?Uid=<?php echo $Uid; ?>" class="btn-danger">Delete Admin</a>
					</td>
				</tr>

							<?php

						}
					}
				}

				?>

				
				</tr>

			</table>
			</div>
		
	<!--Main content ends here-->