<?php
    $id = $session_id;
?>
<div class="span3" id="">
	<div class="row-fluid">
	  <!-- block -->
		<div id="block_bg" class="block">
			<div class="navbar navbar-inner block-header">
				<div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Add Diary</h4></div>
			</div>
            
            <div class="block-content collapse in">
                <form id="add_event_" class="form-addEvent" method="post" enctype="multipart/form-data" >
                        <br/>
                        <textarea class="input-block-level" id="note" name="note" placeholder="Note about the Person or Today events " required><?php if(isset($note)){echo $note;}?></textarea>
                        <div class="control-group">
								<div class="controls">
					
										
									<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" required>
							
									<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
									<input type="hidden" name="id" value="<?php echo $session_id ?>"/>
								</div>
							</div>
                        <br/>
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
				url: "add_diary.php",
				data: formData,
				success: function(html){
					$.jGrowl("Added To Diary", { header: 'Event Added' });
					window.location = 'diary.php<?php echo '?id='.$get_id; ?>';
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
	});
	</script>	

		