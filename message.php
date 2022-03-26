<?php include('header_dashboard.php'); ?>
<body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('calendar_sidebar.php'); ?>
               <div class="span6" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<li><a href="#">User</a><span class="divider">/</span></li>
								<li><a href="#">Message</a><span class="divider">/</span></li>
								<li><a href="#"><b>Inbox</b></a></li>
						</ul>
						
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <!-- <div id="" class="muted pull-left"></div> -->
								<div id="" class="muted"><span class="muted pull-left">ALL MESSAGES IN RECORDS </span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<!-- <form action="read_message.php" method="post"> -->
								<form action="#" method="post">
										<!-- <div class="pull-right">
											<button class="btn btn-info" name="read"><i class="icon-check"></i> Read</button>
											Check All <input type="checkbox"  name="selectAll" id="checkAll" />
											<script>
											$("#checkAll").click(function () {
												$('input:checkbox').not(this).prop('checked', this.checked);
											});
											</script>					
										</div> -->
										
										<ul class="nav nav-pills">
										<li class="active"><a href="message.php"><i class="icon-envelope-alt"></i>inbox</a></li>
										<li class=""><a href="sent_message.php"><i class="icon-envelope-alt"></i>Sent messages</a></li>
										</ul>
									
									<?php
								 $query_announcement = mysqli_query($dbhandle,"select * from message
																	LEFT JOIN tbluser ON tbluser.user_id = message.sender_id
																	where  message.reciever_id = '$session_id' order by date_sended DESC
																	");
								$count_my_message = mysqli_num_rows($query_announcement);	
								if ($count_my_message != '0'){
								 while($row = mysqli_fetch_assoc($query_announcement)){	
								 $id = $row['user_id'];
								 $message_id = $row['message_id'];
								 $status = $row['message_status'];
								 $sender_id = $row['sender_id'];
								 $sender_name = $row['sender_name'];
								 $reciever_name = $row['reciever_name'];
								 ?>
											<div class="post"  id="del<?php echo $message_id; ?>">
											<div class="message_content">
											<?php echo $row['content']; ?>
											</div>
											<div class="pull-right">
											<?php if ($status == 'read'){
											}else{ ?>
											<!-- <input id="" class="" name="selector[]" type="checkbox" value="<?php echo $message_id; ?>"> -->
											<?php } ?>
											</div>
													<hr>
											Send by: <strong><?php echo $row['sender_name']; ?></strong>
											<i class="icon-calendar"></i> <?php echo $row['date_sended']; ?>
														<div class="pull-right">
															<a id="reply_msg" class="btn btn-link" data-id="<?php echo $id; ?>"  href="#reply<?php echo $message_id; ?>" data-toggle="modal" ><i class="icon-reply"></i> Reply </a>
														</div>
													<div class="pull-right">
													<a class="remove_msg btn btn-link" id="<?php echo $message_id; ?>" href="#<?php echo $message_id; ?>" data-toggle="modal" ><i class="icon-remove"></i> Remove </a>
													</div>
											</div>
											
								<?php }}else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> No Message Inbox</div>
								<?php } ?>		
								</form>		
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
<script type="text/javascript">
	$(document).ready( function() {
		$('.remove_msg').click( function() {
		var id = $(this).attr("id");
			$.ajax({
			type: "POST",
			url: "remove_inbox_message.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
			$('#'+id).modal('hide');
			$.jGrowl("Your message is Successfully Deleted", { header: 'Data Delete' });	
			}
			}); 		
			return false;
		});				
	});
</script>
			<script>
			jQuery(document).ready(function(){
			jQuery("#reply_msg").click(function(e){
					e.preventDefault();
					var id = $('#reply_msg').attr("data-id");
					var _this = $(e.target);
					var msg = prompt("Enter Your Msg","write here ..");
					$.ajax({
						type: "POST",
						url: "reply.php",
						data: ({msg:msg, id:id}),
						success: function(html){
						$.jGrowl("Message Successfully Sent", { header: 'Message Sent' });
						$('#reply'+id).modal('hide');
						}
						
					});
					return false;
				});
			}); 
			</script>
	

                </div>
				<?php include('create_message_form.php') ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>