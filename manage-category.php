<?php
 include ('menu.php');
 include ('header.php');  
 ?>

<div class="Main">
	<div class="wrapper">
		<h1>Manage Category</h1>

		<br><br>
		<?php

		if (isset($_SESSION['add']))
		 {
			# code...
			echo $_SESSION['add'];
			unset($_SESSION['add']);
		}
		if (isset($_SESSION['add'])) 
		{
			# code...
			echo $_SESSION['remove'];
			unset($_SESSION['remove']);
		}
		if (isset($_SESSION['delete'])) 
		{
			# code...
			echo $_SESSION['delete'];
			unset($_SESSION['delete']);
		}
		if (isset($_SESSION['no-category-found'])) 
		{
			# code...
			echo $_SESSION['no-category-found'];
			unset($_SESSION['no-category-found']);
		}
		if (isset($_SESSION['update'])) 
		{
			# code...
			echo $_SESSION['update'];
			unset($_SESSION['update']);
		}
		
		if (isset($_SESSION['failed-remove'])) 
		{
			# code...
			echo $_SESSION['failed-remove'];
			unset($_SESSION['failed-remove']);
		}
		
		?>
		<br><br>

			<!--Button to add Category-->

			<a href="<?php echo SITEURL;?>Admin/add-category.php" class="btn-primary">Add Category</a>
			<br><br>
			
			<table class="tbl-full">
				
				<tr class="table-row">
					<th class="table-col">S.N.</th>
					<th class="table-col">Name</th>
					<th class="table-col">Description</th>
					<th class="table-col">Actions</th>
				</tr>

				<?php

				//query to get all categories from the database
				$sql="SELECT * FROM tbl_category";

				//execute the query
				$res=mysqli_query($conn, $sql);

				//count the rows
				$count=mysqli_num_rows($res);

				//Create Serial Number variable and assign value as 1
				$sn=1;

				//check whether we have data in our database or not
				if ($count>0)
				 {
					# code...we have data in Database
					//get the data and display
					while ($row=mysqli_fetch_assoc($res))
					 {
						# code...get individual data
						$Uid=$row['Uid'];
						$name=$row['name'];
						$description=$row['description'];

						?>
						<tr class="table-col">
					<td class="table-col"><?php echo $sn++;?>. </td>
					<td class="table-col"><?php echo $name; ?></td>
					<td class="table-col"><?php echo $description; ?></td>

					
					<td class="table-col">
					<a href="<?php echo SITEURL; ?>Admin/update-category.php?Uid=<?php echo $Uid; ?>" class="btn-secondary">Update Category</a>
						<a href="<?php echo SITEURL; ?>Admin/delete-category.php?Uid=<?php echo $Uid; ?>" class="btn-danger">Delete Category</a>
					</td>
				</tr>


						<?php
					}
				}
				else
				{
					//we do not have data in our Database
					//we'll display the message inside the table
					?>
					<tr>
						<td colspan="6"><div class="error">No Category Added</div></td>
					</tr>

					<?php
				}



				?> 

				

				
			</table>
	</div>

	
</div>
