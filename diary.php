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
							<li><a href="#">Event:</a> <span class="divider">/</span></li>
							<li><a href="#"><b>Add</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
								<?php
								$query = mysqli_query($dbhandle,"select * from tbldiary where user_id = '$id'");
								$count = mysqli_num_rows($query);
								?>
                                <div id="" class="muted"><span class="muted pull-left">ALL DIARY IN RECORDS </span><span class="muted  pull-right badge badge-info"><?php echo $count; ?></span></div>
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
											<?php echo $row['diary_desc']; ?>
											</div>
													<hr>
											<i class="icon-calendar"></i> <?php echo $row['time_add']; ?>
                                                    <div class="pull-right">
                                                    <a  data-placement="bottom" title="Download" id="<?php echo $id; ?>Download" href="<?php echo $row['file_loc']; ?>"><i class="icon-download icon-large"></i></a>          
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>Download').tooltip('show');
															$('#<?php echo $id; ?>Download').tooltip('hide');
														});
														</script>	
                                                    </div>
													<div class="pull-right">
													<a class="remove_diary_desc btn btn-link" id="<?php echo $desc_id; ?>" href="#<?php echo $desc_id; ?>" data-toggle="modal" ><i class="icon-remove"></i> Remove </a>
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
				<?php include('add_diary_details.php'); ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>

    <script type="text/javascript">
        $(document).ready( function() {
            $('.remove_diary_desc').click( function() {
            var id = $(this).attr("id");
                $.ajax({
                    type: "POST",
                    url: "remove_diary.php",
                    data: ({id: id}),
                    cache: false,
                    success: function(html){
                        $("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
                        $('#'+id).modal('hide');
                        $.jGrowl("Your diary is Successfully Deleted", { header: 'Data Delete' });	
                    }
                }); 		
                return false;
            });				
        });
    </script>

    </body>
</html>