<?php
include ('menu.php');
include ('header.php');
?>
<?php
		  if (isset($_SESSION['login']))
		 {
			# code...
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		   }
		?>
		<br><br>

				<div class="cards">
				<div class="card-single">
					<div>
						<?php
				//sql query to display complaints in process
				$sql4="SELECT * FROM tbl_category";
				//execute query
				$res4=mysqli_query($conn, $sql4);
				//count rows
				$count4=mysqli_num_rows($res4);
				?>

						<h1><?php echo $count4; ?></h1>
						<span>Categories</span>
					</div>
					<div>
						<span class="las la-folder"></span>
					</div>
				</div>

				<div class="card-single">
				<div>
						<?php
				//sql query to display unprocessed complaints
				$sql="SELECT * FROM tbl_complaints WHERE status='Not processed'";
				//execute query
				$res=mysqli_query($conn, $sql);
				//count rows
				$count=mysqli_num_rows($res);
				?>

						<h1><?php echo $count; ?></h1>
						<span>Complaints Not processed yet</span>
					</div>
					<div>
						<span class="las la-briefcase"></span>
					</div>
				</div>

				<div class="card-single">
					<div>

						<?php
				//sql query to display complaints in process
				$sql2="SELECT * FROM tbl_complaints WHERE status='pending'";
				//execute query
				$res2=mysqli_query($conn, $sql2);
				//count rows
				$count2=mysqli_num_rows($res2);
				?>

						<h1><?php echo $count2; ?></h1>
						<span>Complaints Status in process</span>
					</div>
					<div>
						<span class="las la-folder"></span>
					</div>
				</div>

				<div class="card-single">
					<div>

						<?php
				//sql query to display complaints in process
				$sql5="SELECT * FROM tbl_users";
				//execute query
				$res5=mysqli_query($conn, $sql5);
				//count rows
				$count5=mysqli_num_rows($res5);
				?>

						<h1><?php echo $count5; ?></h1>
						<span>Registered Users</span>
					</div>
					<div>
						<span class="las la-users"></span>
					</div>
				</div>
                </div>
				<?php include ('footer.php'); ?>
