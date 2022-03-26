<?php
	$id = $session_id;
?>
<div class="span3" id="">
	<div class="row-fluid">
	  <!-- block -->
		<div id="block_bg" class="block">
			<div class="navbar navbar-inner block-header">
				<div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Add Event</h4></div>
			</div>
			<div class="block-content collapse in">
				<form id="add_event_" class="form-addEvent" method="post">
						<input type="text" class="input-block-level datepicker" <?php if(isset($date_start)){echo "value=\"$date_start\"";}?> name="date_start" id="date01" placeholder="Date Start" required/>
						<input type="text" class="input-block-level datepicker" <?php if(isset($date_end)){echo "value=\"$date_end\"";}?>  name="date_end" id="date01" placeholder="Date End" required/>
						<input type="text" class="input-block-level" id="username" <?php if(isset($title)){echo "value=\"$title\"";}?> name="title" placeholder="Title" required/>
						<input type="text" class="input-block-level" id="venue" <?php if(isset($venue)){echo "value=\"$venue\"";}?> name="venue" placeholder="venue" required/>
						<textarea class="input-block-level" id="note" name="note" placeholder="Note about the event" required><?php if(isset($note)){echo $note;}?></textarea>
					<button id="signin" name="add" class="btn btn-info" type="submit"><i class="icon-save"></i> Save</button>
				</form>
			</div>

		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function($){
		$("#add_event_").submit(function(e){
			$.jGrowl("Please Wait......", { sticky: false });
			e.preventDefault();
			var _this = $(e.target);
			var formData = new FormData($(this)[0]);
			$.ajax({
				type: "POST",
				url: "add_event_data.php",
				data: formData,
				success: function(html){
					console.log(html);
					$.jGrowl("Event Successfully  Added To Diary", { header: 'Event Added' });
					window.location = 'add-event.php<?php echo '?id='.$get_id; ?>';
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
	});
	</script>	

		