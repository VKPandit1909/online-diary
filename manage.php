<?php include('header_dashboard.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('calendar_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<li><a href="#"><b>User</b></a><span class="divider">/</span></li>
								<li><a href="#"><b>Events</b></a><span class="divider">/</span></li>
								<li><a href="#">Manager: </a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <!-- <div id="" class="muted pull-left"></div> -->
								<div id="" class="muted"><span class="muted pull-left">MANAGE EVENTS </span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								<div class="alert alert-info"><i class="icon-info"></i> EVENTS MANAGEMENT PAGE </div>
								<?php
								$query = mysqli_query($dbhandle,"select * from event where user_id = '$session_id'");
									while($row = mysqli_fetch_assoc($query)){
								?>
									<div id="del<?php echo $row['event_id'];?>" class="alert"><i class="icon-list"></i> <?php echo strtoupper(substr($row['event_title'], 0, 30-2) . '&#133'); ?> 
									<i class="alert alert-info">
										<span class="icon-edit icon-small" > <a id="edit_event" href="edit-event.php?id=<?php echo $session_id;?>&event=<?php echo $row['event_id'];?>">EDIT</a></span> | 
										<span class="icon-remove icon-small"> <a class="delete_event" id="<?php echo $row['event_id'];?>" href="<?php echo $row['event_id'];?>">DELETE</a></span> | 
										<span> <a onClick="return false;"id="cancel_event" href="<?php echo $row['event_id'];?>">CANCEL</a></span>
									</i></div>
								<?php } ?>
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
			alert(html);
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your Event is Successfully Deleted", { header: 'Data Delete' });	
			}
			}); 		
			return false;
		});				
	});
</script>
                        <!-- /block -->
                    </div>

                </div>
	
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
		
    </body>
</html>
