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
								$query = mysqli_query($dbhandle,"select * from contact where user_id = '$id'");
									$count = mysqli_num_rows($query);
								?>
                                <div id="" class="muted"><span class="muted pull-left">ALL CONTACT IN RECORDS </span><span class="muted  pull-right badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<div class="pull-left">
									<?php
									while($row = mysqli_fetch_assoc($query)){
									?>
									<div class="alert"><i class="icon-list"></i> <?php echo strtoupper($row['name']); ?><i class="icon-list"><?php echo strtoupper($row['mobile']); ?></i><i class="icon-list"><?php echo strtoupper($row['email']); ?></i> </div>
									<?php } ?>
									</div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php include('add_contact_details.php'); ?>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>