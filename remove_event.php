<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
$delete = mysqli_query($dbhandle,"delete from event where event_id = '$id'");
if($delete){
	echo "done";
}else{
	echo "error";
}
?>

