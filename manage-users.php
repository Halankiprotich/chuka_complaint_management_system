<?php 
include ('menu.php');
include ('header.php'); 
?>

	<!--Main content begins here-->
	<div class="Main">
		<div class="wrapper">
			<h1>Manage Users</h1>
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
			if (isset($_SESSION['user-not-found'])) 
			{
				# code...
				echo $_SESSION['user-not-found'];
				unset($_SESSION['user-not-found']);
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
			<br><br>
			
			<table class="tbl-full">
				
				<tr class="table-row">
					<th class="table-col">S.N.</th>
					<th class="table-col">Full Name</th>
                    <th class="table-col">Email</th>
					<th class="table-col">Contact</th>
                    <th class="table-col">Reg Date</th>
					<th class="table-col">Actions</th>
				</tr>

				<?php
				$sql="SELECT * FROM tbl_users";
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
							$id=$rows['id'];
							$full_name=$rows['full_name'];
                            $email=$rows['email'];
                            $contact=$rows['contact'];
                            $Reg_date=$rows['Reg_date'];

							?>

							<tr class="table-col">
					<td class="table-col"><?php echo $sn++; ?></td>
					<td class="table-col"><?php echo $full_name; ?></td>
                    <td class="table-col"><?php echo $email; ?></td>
                    <td class="table-col"><?php echo $contact; ?></td>
                    <td class="table-col"><?php echo $Reg_date; ?></td>
					<td class="table-col">

						<a href="<?php echo SITEURL; ?>Admin/user-details.php?id=<?php echo $id; ?>" class="btn-secondary">View Details</a>
						
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