<?php 
include ('menu.php');
include ('header.php'); 
 ?>

<div class="Main">
	<div class="wrapper">
		<h1>Add Category</h1>

		<br><br>

		<?php

		if (isset($_SESSION['add']))
		 {
			# code...
			echo $_SESSION['add'];
			unset($_SESSION['add']);
		}


		?>

		<br><br>

		<!-- Add Category form starts-->
		<form action="" method="POST" enctype="multipart/form-data">

			<table class='tbl-30'>
				<tr>
					<td>Name: </td>
					<td>
					<input type="text" name="name" placeholder="Category Name" required>
				    </td>
                </tr>
			<tr>
				<td>Description: </td>
					<td>
						<textarea name="description" cols="30" rows="5" required></textarea>
					</td>
			</tr>
				<td colspan="2">
					<input type="submit" name="submit" value="Add Category" class="btn-secondary">
				</td>
			</tr>
				
			</table>
			
		</form>
		<!-- Add Category form ends-->
        
		<?php

		//check whether the submit button is cliked or not
		if (isset($_POST['submit']))
		{
			# code...
			//echo "clicked";

			//get the values from our Category form
			$name=$_POST['name'];
			$description=$_POST['description'];
			
			//create SQL query to insert Category into Database
			$sql = "INSERT INTO tbl_category SET
			name='$name',
            description='$description'
			";

			//execute the query and save in Database
			$res=mysqli_query($conn, $sql);

			//check whether the query executed or not and data is added on a database or not
			if ($res==true)
			 {
				# code...query executed and category added
				$_SESSION['add']="<div class='success'>Category Added Successfully.</div>";
				//redirect to Manage Category page
				header('location:'.SITEURL.'Admin/manage-category.php');
			}
			else
			{
				//Failed to add Category
				$_SESSION['add']="<div class='error'>Category Failed to Add Category.</div>";
				//redirect to Manage Category page
				header('location:'.SITEURL.'Admin/add-category.php');
			}
		}

		?>
		
	</div>
	
    </div>