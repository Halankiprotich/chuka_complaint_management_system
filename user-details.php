<?php 
i  nclude ('menu.php');
include ('header.php');
 ?>

<div class="Main">
	<div class="wrapper">
		<h1>User Details</h1>
		<br><br>

		<?php
            	if (isset($_GET['id'])) 
                {
                    # code...Get order details ,
                    $id=$_GET['id'];
			//get all details based on this id
			//sql query to get the complaint deatils
			$sql="SELECT * FROM tbl_users WHERE id=$id";
			//execute query
			$res=mysqli_query($conn, $sql);
			//count rows
			$count=mysqli_num_rows($res);
            
            if ($count==1) 
			{
            $row=mysqli_fetch_assoc($res);
            $id=$row['id'];
            $full_name=$row['full_name'];
            $email=$row['email'];
            $username=$row['username'];
            $contact=$row['contact'];
            $Reg_date=$row['Reg_date'];
            }
        }
		?>

		<form action="" method="POST">

			<table class="tbl-30">
                <tr>
					<td>User ID: </td>
					<td><b><?php echo $id; ?></b></td>
				</tr>
				<tr>
					<td>Full Name: </td>
					<td><b><?php echo $full_name; ?></b></td>
				</tr>
                <tr>
					<td>Email: </td>
					<td>
                    <?php echo $email; ?>
                    </td>
				</tr>

				<tr>
					<td>Username: </td>
					<td>
						<b><?php echo $username; ?></b>
					</td>
				</tr>

				<tr>
					<td>Contact: </td>
					<td>
						<?php echo $contact; ?>
					</td>
				</tr>

				<tr>
					<td>Registration Date: </td>
					<td>
						<?php echo $Reg_date; ?>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
						<input type="hidden" name="full_name" value="<?php echo $full_name; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" name="contact" value="<?php echo $contact; ?>">
                        <input type="hidden" name="Reg_date" value="<?php echo $Reg_date; ?>">
						
					</td>
				</tr>
				
			</table>
			
		</form>
    </div>
</div>

<?php include ('footer.php'); ?>