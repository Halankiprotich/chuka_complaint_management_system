<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IF-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with login and registration</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
    <h2 class ="logo">Car Rental</h2>
    <nav class="navigation">
          <a href="#">Home</a>
          <a href="#">About us</a>
          <a href="#">Our Services</a>
          <a href="#">Contact us</a>
          <button class="btnlogin-popup">Login</button>
        </nav>
</header>   
<div class="wrapper">`
    <div class="form-box login">
        <h2>Login</h2>
        
    <form action=" ">
        <div class="input-box">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        <div class="input-box">
            <input type="text"  name="password" required>
            <label>Password</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">Remember me</label>
            <a href="#">Forgot Password?</a>
        </div>
        <input type="submit" name="submit" value="Login" class="btn">
        <div class="login-register">
                <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
            </div>
        </form>
    </div>
    <div class="form-box register">
        <h2>Registration</h2>
    <form action="#">
        <div class="input-box">
            <input type="text" required>
            <label>Username</label>
        </div>
        <div class="input-box">
            <input type="email" required>
            <label>Email</label>
        </div>
        <div class="input-box">
            <input type="Password" required>
            <label>Password</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">Agree terms and conditions</label>
        </div>
        <button type="submit" name="submit" class="btn">Register</button>
        <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
        </form>
    </div>
        
<?php

//check whether submit button is clicked or not
if (isset($_POST['submit'])) 
{
	# code...get data from login form
	$email=$_POST['email'];
	$password=($_POST['password']);

	//check whether the Admin with username and password exists
	$sql= "SELECT * FROM hello WHERE email='$email' AND password='$password'";

	//execute query
	$res=mysqli_query($conn, $sql);

	// count rows to check whether the Admin exists or not
	$count=mysqli_num_rows($res);

	if($count==1)
	 {
		# code...admin available and login success
		$_SESSION['wrapper']= "<div class='success'>Login Successfully.</div>";
		$_SESSION['admin']=$email;

		//redirect to Home page
		header('location:'.SITEURL.'Admin/index.php');
	}
	else
	{
		//Admin not available and login failed
		$_SESSION['wrapper']="<div class='error text-center'>Username or Password do not match.</div>";
		//redirect to Home page with an error
		header('location:'.SITEURL.'Admin/login.php');
	}


}
?>
</body>
</html>    
   