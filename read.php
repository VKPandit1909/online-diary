<?php include('header_dashboard.php');
if(isset($_GET["id"])){
	$id = $_GET["id"];
}else{
	$id = 0;
}
 ?>

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
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
								<?php
								$query = mysqli_query($dbhandle,"select * from event where event_id = '$id'");
									$row = mysqli_fetch_assoc($query);
								?>
                                <div class="span12">
  								<div class="alert alert-info"><i class="icon-info"></i> <?php echo  $row["event_title"] ?></div>
									
									<div class="alert"><i class="icon-read"></i> <?php echo $row['note']; ?></div>
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