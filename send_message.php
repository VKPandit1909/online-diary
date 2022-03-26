<?php
include('admin/dbcon.php');
include('session.php');
$friend_id = $_POST['friend_id'];
$my_message = $_POST['my_message'];


$query1 = mysqli_query($dbhandle,"select * from tbluser where user_id = '$session_id'");
$row1 = mysqli_fetch_assoc($query1);
$name1 = $row1['firstname']." ".$row1['lastname'];

mysqli_query($dbhandle,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$friend_id','$my_message',NOW(),'$session_id','$friend_id','$name1')");
mysqli_query($dbhandle,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$friend_id','$my_message',NOW(),'$session_id','$friend_id','$name1')");
// echo "insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$friend_id','$my_message',NOW(),'$session_id','$friend_id','$name1')";
?>