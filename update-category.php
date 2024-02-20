<?php 
include ('menu.php');
include ('header.php'); 
 ?>

<div class="Main">
	<div class="wrapper">
		<h1>Update Category</h1>

		<br><br>

		<?php
		//check whether the id is set opr not
		if (isset($_GET['Uid'])) 
		{
			# code...get the id and all other details
			//echo "getting the data";
			$Uid=$_GET['Uid'];
			//create sql query to get all the details
			$sql="SELECT * FROM tbl_category WHERE Uid=$Uid";

			//excute the query
			$res=mysqli_query($conn, $sql);

			//count the rows to check whether the id is valid or not
			$count=mysqli_num_rows($res);

			if ($count==1) 
			{
				# code...get all the data
				$row=mysqli_fetch_assoc($res);
				$name=$row['name'];
				$description=$row['description'];
			}
			else
			{
				//redirect to category page with session message
				$_SESSION['no-category-found']="<div class'error'>Category not Found</div>";
				header('location:'.SITEURL.'Admin/manage-category.php');
			}
		}
		else
		{
			//redirect to category page
			header('location:'.SITEURL.'Admin/manage-category.php');
		}

		?>
		<form action="" method="POST" enctype="multipart/form-data">
		<table class="tbl-30">
			<tr>
				<td>Name: </td>
				<td>
					<input type="text" name="name" value="<?php echo $name; ?>">
				</td>
			</tr>
            
            <tr>
				<td>Description: </td>
					<td>
						<textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
					</td>
			</tr>

			<td>
				<input type="hidden" name="Uid" value="<?php echo $Uid; ?>">
				<input type="submit" name="submit" value="Update Category" class="btn-secondary">
			</td>


			
		</table>
		</form>

		<?php

		if (isset($_POST['submit'])) 
		{
			# code...
			//echo "cliked";
			//get all the values from our form
			$Uid=$_POST['Uid'];
			$name=$_POST['name'];
            $description=$_POST['description'];

		
			//update the database
			$sql2="UPDATE tbl_category SET
			name='$name',
            description='$description'
			WHERE Uid=$Uid
			";

			//execute the query
			$res2=mysqli_query($conn, $sql2);
			//redirect to manage category with message
			//check whether executed or not
			if ($res2==true) 
			{
				# code...Category Updated
				$_SESSION['update']="<div class='success'>Category Updated Successfully.</div>";
				header('location:'.SITEURL.'Admin/manage-category.php');
			}
			else
			{
				//failed to update category
				$_SESSION['update']="<div class='error'>Failed to Update Category.</div>";
				header('location:'.SITEURL.'Admin/manage-category.php');
			}
		}

		?>
		
	</div>
	
</div>

