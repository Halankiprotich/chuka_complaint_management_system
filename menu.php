<?php

include ('../database/connect.php');
include ('login-check.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/line-awesome.css">
	<link rel="stylesheet" href="../css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="Admin.css">
</head>
<body>
<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<h2><span class="ti-user"></span><span><sub>Admin </sub></span></h2>
			
		</div>
        <div class="sidebar-menu">
		<div class="span3">
			<ul>
			    <li>
					<a href="index.php" class="active"><span class="ti-dashboard"></span>
						<span>DashBoard</a></span>
				</li>
				<li>
					<a href="manage-complaint.php"><span class="ti-folder"></span>
						<span>Manage Complaint </a></span>
				</li>
				<li>
					<a href="manage-admin.php"><span class="ti-user"></span>
						<span>Manage Admin</a></span>
				</li>

				<li>
					<a href="manage-users.php"><span class="las la-users"></span>
						<span>View Users</span></a>
				</li>
				<li>
					<a href="manage-category.php"><span class="las la-clipboard-list"></span>
						<span>Manage Categories</span></a>
				</li>
                <li>
					<a href="logout.php"><span class="las la-arrow-circle-right"></span>
						<span>Logout</span></a>
				</li>
                </ul>

			
							
    </div>
        
        </div>

         </div>
    
</body>
</html>