<?php 
include ('menu.php');
include ('header.php');
 ?>

<div class="Main">
	<div class="wrapper">
		<h1>Manage Complaints</h1>

		<br>

		<?php
		if (isset($_SESSION['update'])) 
		{
			# code...
			echo $_SESSION['update'];
			unset($_SESSION['update']);
		}
		?>
		<br><br>
			
			<table class="tbl-full">
				
				<tr class="table-row">
					<th class="table-col">S.N.</th>
					<th class="table-col">Complainant Name</th>
					<th class="table-col">Reg Date</th>
					<th class="table-col">Status</th>
					<th class="table-col">Actions</th>
				</tr>

				<?php
				//get all details from all the complaints in our database
				$sql="SELECT * FROM tbl_complaints ORDER BY complaint_id DESC";
				//execute qury
				$res=mysqli_query($conn, $sql);
				//count rows
				$count=mysqli_num_rows($res);
				//create a serial number variable and set it as 1
				$sn=1;

				if ($count>0) {

				 	# code...complaint Available
				 	while ($row=mysqli_fetch_assoc($res)) 
				 	{
				 		# code...Get the complaint details
						 $complaint_id=$row['complaint_id'];
						 $complainant_name=$row['complainant_name'];
						 $Reg_date=$row['Reg_date'];
						 $status=$row['status'];
				 		?>

				 		<tr class="table-col">
					<td class="table-col"><?php echo $sn++; ?>.</td>
					<td class="table-col"><?php echo $complainant_name; ?>.</td>
					<td class="table-col"><?php echo $Reg_date; ?></td>

					<td class="table-col">
						<?php

						//Not processed yet, pending, addressed,

						if ($status=="Not processed") 
						{
							# code...
							echo "<label>$status</label>";
						}
						elseif ($status=="Pending") 
						{
							# code...
							echo "<label style='color: orange;'>$status</label>";
						}
						elseif ($status=="Addressed") 
						{
							# code...
							echo "<label style='color: green;'>$status</label>";
						}
						
						?> 
							
						</td>

					<td class="table-col">
						<a href="<?php echo SITEURL; ?>Admin/update-complaint.php?complaint_id=<?php echo $complaint_id; ?>" class="btn-secondary">Update Complaint</a>
					</td>
				</tr>

				 		<?php
				 	}
				}
				else
				{
					//Complaint not available
					echo "<tr><td colspan='12' class='error'>Complaint not available</td><tr> ";
				} 
				?>

			</table>
	</div>

	
</div>

<?php include ('footer.php'); ?>