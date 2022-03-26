<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($dbhandle,"delete from message where message_id = '$id'");
?>

