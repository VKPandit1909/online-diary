<?php
include('session.php');
include('admin/dbcon.php');
//Include database connection details

    $id = $session_id;
    $g_name = mysqli_real_escape_string($dbhandle,$_POST['group_name']);

    $time = date("Y-m_d : h:i");
    $query = "INSERT INTO `group`(`name`) VALUES ('$g_name')";
    $result2 = mysqli_query($dbhandle, $query);
    if ($result2) {
        echo "inserted";
    } else {
        echo "error occurred";
    }
            
mysqli_close();
?>
