<?php 
include ('menu.php');
include ('header.php');
 ?>

<div class="Main">
	<div class="wrapper">
		<h1>Complaint Details</h1>
		<br><br>

		<?php

		//check whether the id is set or not
		if (isset($_GET['complaint_id'])) 
		{
			# code...Get order details
			$complaint_id=$_GET['complaint_id'];

			//get all details based on this id
			//sql query to get the complaint deatils
			$sql="SELECT * FROM tbl_complaints WHERE complaint_id=$complaint_id";
			//execute query
			$res=mysqli_query($conn, $sql);
			//count rows
			$count=mysqli_num_rows($res);

			if ($count==1) 
			{
				# code...detail available
				$row=mysqli_fetch_assoc($res);

				$nature=$row['nature'];
                $complaint_details=$row['complaint_details'];
				$status=$row['status'];
                $category_id=$row['category_id'];
                $remarks=$row['remarks'];
			}
			else
			{
				//detail not available
				//redirect to manage complaint page
				header('location:'.SITEURL.'Admin/manage-complaints.php');
			}

		}
		else
		{
			//redirect to manage complaint page
			header('location:'.SITEURL.'Admin/manage-complaints.php');
		}
		?>

		<form action="" method="POST">

			<table class="tbl-30">
				<tr>
					<td>Nature: </td>
					<td><b><?php echo $nature; ?></b></td>
				</tr>
                <tr>
					<td>Complaint Details: </td>
					<td>
                    <?php echo $complaint_details; ?>
                    </td>
				</tr>

				<tr>
					<td>Category</td>
					<td>
						<b><?php echo $category_id; ?></b>
					</td>
				</tr>

				<tr>
					<td>Final Status</td>
					<td>
						<select name="status">
							<option <?php if ($status=="Not Processed"){echo "selected";} ?> value="Not Processed">Not Processed</option>
							<option <?php if ($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
							<option <?php if ($status=="Addressed"){echo "selected";} ?> value="Addressed">Addressed</option>
							
						</select>
					</td>
				</tr>

				<tr>
					<td>Remarks: </td>
					<td>
						<textarea name="remarks" cols="30" rows="5"><?php echo $remarks; ?></textarea>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="complaint_id" value="<?php echo $complaint_id; ?>">
						<input type="hidden" name="nature" value="<?php echo $nature; ?>">
                        <input type="hidden" name="complaint_details" cols="30" rows="5" value="<?php echo $complaint_details; ?>">

						<input type="submit" name="submit" value="Update Complaint" class="btn-secondary">
						
					</td>
				</tr>
				
			</table>
			
		</form>

		<?php
		//check whether update button is clicked or not
		if (isset($_POST['submit'])) 
		{
			# code...
			//echo "clicked";
			//get all the values from form
			$complaint_id=$_POST['complaint_id'];
			$nature=$_POST['nature'];
			$complaint_details=$_POST['complaint_details'];
			$status=$_POST['status'];
			$remarks=$_POST['remarks'];
            $update_date=date('Y-m-d h:i:sa');//date/time of updating the complaint

			//update the values
			//create sql query to update
			$sql2="UPDATE tbl_complaints SET
			status='$status',
			remarks='$remarks'
			WHERE complaint_id=$complaint_id
			";

			//excute the query
			$res2=mysqli_query($conn, $sql2);

			//check whether it is updated or not
			//and redirect to manage complaint with a message
			if ($res2==true) 
			{
				# code...Updated
				$_SESSION['update']="<div class='success'>Complaint Updated Successfully.</div>";
				header('location:'.SITEURL.'Admin/manage-complaint.php');
			}
			else
			{
				//failed to update
				$_SESSION['update']="<div class='error'>Failed to Update Complaint.</div>";
				header('location:'.SITEURL.'Admin/manage-complaint.php');
			}
		}

		?>
		
	</div>
	
</div>


<?php include ('footer.php'); ?>