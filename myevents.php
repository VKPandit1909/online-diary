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
								<li><a href="#">My Events: </a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <!-- <div id="" class="muted pull-left"></div> -->
								<div id="" class="muted"><span class="muted pull-left">MY EVENTS </span></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								<div class="alert alert-info"><i class="icon-info"></i> LIST OF EVENTS CAPTION </div>
								<?php
								$query = mysqli_query($dbhandle,"select * from event where user_id = '$session_id'");
									while($row = mysqli_fetch_assoc($query)){
								?>
									<a href="read.php?id=<?php echo  $row["event_id"] ?>"><div class="alert"><i class="icon-list"></i> <?php echo $row['event_title']; ?> <i  class="alert alert-info"><?php echo $row['date_start']; ?></i></div></a>
								<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                </div>
	
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>