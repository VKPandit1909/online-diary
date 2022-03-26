<?php
    // mysqli_select_db(mysqli_connect('localhost','root',''),'diary')or die(mysqli_error());
    $username="root";  
    $password="";  
    $hostname = "localhost";  
    //connection string with database  
    $dbhandle = mysqli_connect($hostname, $username, $password)  
    or die("Unable to connect to MySQL");  
    echo "";  
    // connect with database  
    $selected = mysqli_select_db($dbhandle, "diary")  
    or die("Could not select examples");

?>