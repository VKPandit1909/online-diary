 <?php
 include('admin/dbcon.php');
 include('session.php');
 $new_password  = $_POST['new_password'];
 mysqli_query($dbhandle,"update tbluser set password = '$new_password' where user_id = '$session_id'");
 ?>