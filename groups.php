<?php include('header_dashboard.php'); ?>
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
							<li><a href="#">Groups:</a> <span class="divider">/</span></li>
							<li><a href="#"><b>Add</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
								<?php
								$query = mysqli_query($dbhandle,"SELECT * FROM `group`");
								$count = mysqli_num_rows($query);
								?>
                                <div id="" class="muted"><span class="muted pull-left">ALL GROUPS IN RECORDS </span><span class="muted  pull-right badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<div class="pull-left">
									<?php
									while($row = mysqli_fetch_assoc($query)){
                                        $desc_id = $row['id'];
									?>
									<div class="post"  id="del<?php echo $desc_id; ?>">
											<div class="message_content">
											<?php echo $row['name']; ?>
											</div>
													<hr>
										
													<div class="pull-right">
													<a class="remove_group btn btn-link" id="<?php echo $desc_id; ?>" href="#<?php echo $desc_id; ?>" data-toggle="modal" ><i class="icon-remove"></i> Remove </a>
													</div>
											</div>
									<?php } ?>
									</div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php include('add_group_details.php'); ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>

    <script type="text/javascript">
        $(document).ready( function() {
            $('.remove_group').click( function() {
            var id = $(this).attr("id");
                $.ajax({
                    type: "POST",
                    url: "remove_group.php",
                    data: ({id: id}),
                    cache: false,
                    success: function(html){
                        $("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
                        $('#'+id).modal('hide');
                        $.jGrowl("Your group is Successfully Deleted", { header: 'Data Delete' });	
                    }
                }); 		
                return false;
            });				
        });
    </script>

    </body>
</html>