<?php

include ('../database/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<div class="Main">
<div class="logo">
<div class="container">
		<img src="../images/logo.png" alt="logo" class="images">
</div>
</div>
		
         <h1>CHUKA COMPLAINT MANAGEMENT SYSTEM</h1>

</div>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Admin.css">
    
</head>
<body>


<div class="login">
		<h1 class="text-center">Login</h1>
		<br><br>
		<?php
		if (isset($_SESSION['login']))
		 {
			# code...
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}
		if (isset($_SESSION['no-login-message'])) 
		{
			# code...
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);
		}
		?>
		<br><br>

    <!-- Login form starts here-->
    <form action="" method="POST" class="text-center">
			Username:<br>
			<input type="text" name="username" placeholder="Enter Username" required="please enter username"><br><br>

			Password:<br>
			<input type="password" name="password" placeholder="Enter Password" required="password required"><br><br>

			<input type="submit" name="submit" value="Login" class="btn-primary">
			
		</form>
		<!--Login form ends here-->
</div>

<?php

//check whether submit button is clicked or not
if (isset($_POST['submit'])) 
{ 
	# code...get data from login form
	$username=$_POST['username'];
	$password=($_POST['password']);

	//check whether the Admin with username and password exists
	$sql= "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

	//execute query
	$res=mysqli_query($conn, $sql);

	// count rows to check whether the Admin exists or not
	$count=mysqli_num_rows($res);

	if($count==1)
	 {
		# code...admin available and login success
		$_SESSION['login']= "<div class='success'>Login Successfully.</div>";
		$_SESSION['admin']=$username;

		//redirect to Home page
		header('location:'.SITEURL.'Admin/index.php');
	}
	else
	{
		//Admin not available and login failed
		$_SESSION['login']="<div class='error text-center'>Username or Password do not match.</div>";
		//redirect to Home page with an error
		header('location:'.SITEURL.'Admin/login.php');
	}


}
?>
	<?php include ('footer.php'); ?>