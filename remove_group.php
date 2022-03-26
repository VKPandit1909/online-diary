<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($dbhandle,"DELETE FROM `group` WHERE id = '$id'");
echo "done";
?>

