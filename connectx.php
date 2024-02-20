
<?php

// start session
session_start();


define('SITEURL', 'http://localhost/cms/');
 define('LOCALHOST', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_NAME', 'car');

 $conn= mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die("Couldn't connect");
    $db_select= mysqli_select_db($conn, DB_NAME) or die("couldn't find"); 

    ?>