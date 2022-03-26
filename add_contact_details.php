<?php
	$id = $session_id;
?>
<div class="span3" id="">
	<div class="row-fluid">
	  <!-- block -->
		<div id="block_bg" class="block">
			<div class="navbar navbar-inner block-header">
				<div id="" class="muted pull-left"><h4><i class="icon-plus-sign"></i> Add Contact Diary</h4></div>
			</div>
			<div class="block-content collapse in">
				<form id="add_event_" class="form-addEvent" method="post" enctype="multipart/form-data" >
						<input type="text" class="input-block-level" <?php if(isset($name)){echo "value=\"$name\"";}?> name="name" id="name" placeholder="Contact Name" required/>
						<input type="text" class="input-block-level" <?php if(isset($number)){echo "value=\"$number\"";}?>  name="number" id="number" placeholder="Contact Number" required/>
						<input type="text" class="input-block-level" id="username" <?php if(isset($mobile)){echo "value=\"$mobile\"";}?> name="mobile" placeholder="Contact Mobile Number" required/>
						<input type="text" class="input-block-level" id="venue" <?php if(isset($email)){echo "value=\"$email\"";}?> name="email" placeholder="Contact Email" required/>
						<input type="text" class="input-block-level" id="venue" <?php if(isset($work)){echo "value=\"$work\"";}?> name="work" placeholder="Contact Work" required/>
						<input type="text" class="input-block-level" id="venue" <?php if(isset($address)){echo "value=\"$address\"";}?> name="address" placeholder="Contact Address" required/>
						<input type="text" class="input-block-level" id="venue" <?php if(isset($school)){echo "value=\"$school\"";}?> name="school" placeholder="Contact School" required/>

						<div class="control-group">
								<div class="controls">
					
										
									<input name="uploaded_file"  class="input-file uniform_on" id="fileInput" type="file" required>
							
									<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
									<input type="hidden" name="id" value="<?php echo $session_id ?>"/>
								</div>
							</div>
						
						<textarea class="input-block-level" id="note" name="note" placeholder="Note about the Person" required><?php if(isset($note)){echo $note;}?></textarea>
						<select name="group" class="chzn-select" required>
							<option></option>
									<?php
									$query = mysqli_query($dbhandle,"select * from `group` order by name");
									while($row = mysqli_fetch_assoc($query)){
									
									?>
									
									<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?> </option>
									
									<?php } ?>
						</select>
						<br/><br />
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
				url: "add_contact.php",
				data: formData,
				success: function(html){
					$.jGrowl("Contact Successfully  Added To Diary", { header: 'Event Added' });
					window.location = 'contact.php<?php echo '?id='.$get_id; ?>';
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
	});
	</script>	

		