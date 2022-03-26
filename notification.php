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
                <div class="span6" id="content">
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
                                <div id="" class="muted pull-left">UPCOMING EVENTS</div>
                            </div>
                            <div class="block-content collapse in">
								<?php
								$query = mysqli_query($dbhandle,"select * from event where user_id = '$session_id'");
								?>
                                <div class="span12"  style="width:auto">
									<?php while($row = mysqli_fetch_assoc($query)){ 
									$notes = $row['note'];
									$n = explode("VENUE::",$notes);
									$msg = $n[1];
									?>
  								<div class="alert alert-info">
								<i class="icon-info"> <?php echo  $row["event_title"] ?></i><br/>
								<i><?php strtoupper(substr($notes, 0, 30-2) . '&#133'); ?></i>
								<i>VENUE: <?php echo $msg?></i><br/>
								<i>DATE: <?php echo $row['date_start']?></i>
								</div>
									
								<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                </div>
				<?php include('space_bar.php') ?>
	
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>