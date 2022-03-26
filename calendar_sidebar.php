<div class="span3" id="sidebar">
	<img id="avatar" src="admin/<?php echo $row['location']; ?>" class="img-polaroid">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
				<li class=""><a href="dasboard.php"><i class="icon-chevron-right"></i><i class="icon-chevron-left"></i>&nbsp;Back</a></li>
				<li class=""><a href="contact.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Contact</a></li>
				<li class=""><a href="manage_contacts.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Manage Contacts</a></li>
				<li class=""><a href="diary.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Diary</a></li>
				<li class=""><a href="message.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Messages</a></li>
				<li class=""><a href="uploads.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-upload"></i>&nbsp;Photos Gallery</a></li>
				<li class=""><a href="groups.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Groups</a></li>
				<li class=""><a href="add-event.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-book"></i>&nbsp;Add Events</a></li>
				<li class=""><a href="manage.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Manage Events</a></li>
				<li class=""><a href="notification.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Notification</a></li>
				<li class=""><a href="myevents.php<?php echo '?id='.$get_id; ?>"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;My Events</a></li>
		</ul>
</div>