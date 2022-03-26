<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($dbhandle,"delete from tbldiary where id = '$id'");
echo "done";
?>

