<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($dbhandle,"delete from contact where id = '$id'");
echo "done";
?>

