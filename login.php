<?php
		include('admin/dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* user */
			$query = "SELECT * FROM tbluser WHERE username='$username' AND password='$password'";
			$result = mysqli_query($dbhandle,$query);
			$row = mysqli_fetch_assoc($result);
			$num_row = mysqli_num_rows($result);
		if( $num_row > 0 ) { 
			$_SESSION['id']=$row['user_id'];
			echo 'true';	
		}else{ 
			echo 'false';
		}
?>