<?php
include('session.php');
include('admin/dbcon.php');
//Include database connection details
require("opener_db.php");
$errmsg_arr = array();
//Validation error flag
$errflag = false;
$id = $session_id;
$name = $_POST['name'];
if ($_FILES['uploaded_file']['size'] >= 1048576 * 5) {
    $errmsg_arr[] = 'file selected exceeds 5MB size limit';
    $errflag = true;
}


$rd2 = mt_rand(1000, 9999) . "_File";

//Check that we have a file
if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
    //Check if the file is JPEG image and it's size is less than 350Kb
    $filename = basename($_FILES['uploaded_file']['name']);

    $ext = substr($filename, strrpos($filename, '.') + 1);

    if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload")) {
        //Determine the path to which we want to save this file      
        //$newname = dirname(__FILE__).'/upload/'.$filename;
        $newname = "admin/uploads/" . $rd2 . "_" . $filename;
		$name_notification  = 'Add uploads Materials file name'." ".'<b>'.$name.'</b>';
        //Check if the file with the same name is already exists on the server
        if (!file_exists($newname)) {
            //Attempt to move the uploaded file to it's new place
            if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname))) {
                //successful upload
                // echo "It's done! The file has been saved as: ".$newname;		   

				// if (isset($_POST['add'])){
					$user_id  = $_POST['id'];
//					$name  = mysql_real_escape_string($_POST['name']);
					$number   = $_POST['number'];
					$mobile   = $_POST['mobile'];
					$email  = mysqli_real_escape_string($dbhandle,$_POST['email']);
					$work  = $_POST['work'];
					$address  = mysqli_real_escape_string($dbhandle,$_POST['address']);
					$school  = $_POST['school'];
//					$pix  = $_POST['pix'];
					$group  = $_POST['group'];
					$note = mysqli_real_escape_string($dbhandle,$_POST['note']);
				// }
				echo $time = date("Y-m_d : h:i");
				$qry2 = "INSERT INTO `contact` (`id`, `user_id`, `name`, `number`, `mobile`, `email`, `work`, `address`, `school`, `pix`, `group`, `note`,`time_add`) VALUES (NULL, $user_id, '$name', '$number', '$mobile', '$email', '$work', '$address', '$school', '$newname', '$group','$note','$time')";
                $result2 = $connector->query($qry2);
                if ($result2) {
					echo "inserted";
                    $errmsg_arr[] = 'record was saved in the database and the file was uploaded';
                    $errflag = true;
                    if ($errflag) {
                        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                        session_write_close();
                        ?>

                        <?php

                        exit();
                    }
                } else {
                    $errmsg_arr[] = 'record was not saved in the database but file was uploaded';
                    $errflag = true;
                    if ($errflag) {
                        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                        session_write_close(); 
						echo "uploaded";
						?>
						
                           <script>
   window.location = 'uploads.php<?php echo '?id='.$id;  ?>';
   </script>
   <?php
                        exit();
                    }
                }
            } else {
                //unsuccessful upload
                //echo "Error: A problem occurred during file upload!";
                $errmsg_arr[] = 'upload of file ' . $filename . ' was unsuccessful';
                $errflag = true;
                if ($errflag) {
                    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                    session_write_close(); ?>
       <script>
   window.location = 'uploads.php<?php echo '?id='.$get_id;  ?>';
   </script>
   
   
   <?php
                    exit();
                }
            }
        } else {
            //existing upload
            // echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
            $errmsg_arr[] = 'Error: File >>' . $_FILES["uploaded_file"]["name"] . '<< already exists';
            $errflag = true;
            if ($errflag) {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close(); ?>
       <script>
   window.location = 'uploads.php<?php echo '?id='.$get_id;  ?>';
   </script>
   <?php
   
                exit();
            }
        }
    } else {
        //wrong file upload
        //echo "Error: Only .jpg images under 350Kb are accepted for upload";
        $errmsg_arr[] = 'Error: All file types except .exe file under 5 Mb are not accepted for upload';
        $errflag = true;
        if ($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close(); ?>
            <script>
   window.location = 'uploads.php<?php echo '?id='.$get_id;  ?>';
   </script>
   <?php
            exit();
        }
    }
} else {
    //no file to upload
    //echo "Error: No file uploaded";

    $errmsg_arr[] = 'Error: No file uploaded';
    $errflag = true;
    if ($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close(); ?>
       <script>
   window.location = 'uploads.php<?php echo '?id='.$get_id;  ?>';
   </script>
   <?php
        exit();
    }
}

mysqli_close();
?>
