<?php include('header_dashboard.php'); ?>
<?php
if (isset($_GET['event'])){
$event_id = $_GET['event'];
	$query = mysqli_query($dbhandle,"select * from  event where event_id=$event_id");
	$row = mysqli_fetch_assoc($query);
	$date_start = $row['date_start'];
	$date_end = $row['date_end'];
	$title = $row['event_title'];
	$note = mysqli_real_escape_string($dbhandle,$row['note']);
	
	$n = explode("VENUE::",$note);
	$venue = $n[1];
}
?>


<?php $id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('calendar_sidebar.php'); ?>
                <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->
				
				
					     <ul class="breadcrumb">
							<li><a href="#">User:</a> <span class="divider">/</span></li>
							<li><a href="#">Event:</a> <span class="divider">/</span></li>
							<li><a href="#"><b>Edit</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
								<?php
								$query = mysqli_query($dbhandle,"select * from event where user_id = '$id'");
									$count = mysqli_num_rows($query);
								?>
                                <div id="" class="muted"><span class="muted pull-left">ALL EVENT IN RECORDES </span><span class="muted  pull-right badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<div class="pull-left">
								<?php
									while($row = mysqli_fetch_assoc($query)){
								?>
									<div id="del<?php echo $row['event_id'];?>" class="alert"><i class="icon-list"></i> <?php echo strtoupper(substr($row['event_title'], 0, 20-2) . '&#133'); ?> 
									<i class="alert alert-info">
										<span class="icon-edit icon-small" > <a id="edit_event" href="edit-event.php?id=<?php echo $session_id;?>&event=<?php echo $row['event_id'];?>">EDIT</a></span> | 
										<span class="icon-remove icon-small"> <a class="delete_event" id="<?php echo $row['event_id'];?>" href="<?php echo $row['event_id'];?>">DELETE</a></span> | 
										<span> <a onClick="return false;"id="cancel_event" href="<?php echo $row['event_id'];?>">CANCEL</a></span>
									</i></div>
								<?php } ?>
									</div>
                                </div>
                            </div>
                        </div>
<script type="text/javascript">
	$(document).ready( function() {
		$('.delete_event').click( function() {
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_event.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
				if(html == "done"){
					$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
					$('#'+id).modal('hide');
					$.jGrowl("Your Event is Successfully Deleted", { header: 'Data Delete' });	
				}else{
					$.jGrowl("ERROR EVENT DID NOT DELETE", { header: 'Data Delete' });	
				}
			}
			}); 		
			return false;
		});				
	});
</script>
                        <!-- /block -->
                    </div>
                </div>
				<?php include('Add_event.php'); ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>