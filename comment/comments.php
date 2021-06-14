<?php
include_once("../config/config2.php");
// require_once("../autoload/Autoload.php");
// if(Auth::customer()){
// 	$userid = Auth::customer()->id;
// }
// else{
// 	$userid = '99';
// }

if(!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["filmid"]) && !empty($_POST["useravatar"])){
	$insertComments = "INSERT INTO tbl_comments (film_id, parent_comment_id, comment, comment_sender_name, date, user_avatar) VALUES ('".$_POST["filmid"]."','".$_POST["commentId"]."', '".$_POST["comment"]."', '".$_POST["name"]."', NOW(), '".$_POST["useravatar"]."')";
	mysqli_query($conn, $insertComments) or die("database error: ". mysqli_error($conn));	
	$message = '<label class="text-success">Comment posted Successfully.</label>';
	$status = array(
		'error'  => 0,
		'message' => $message
	);	
} else {
	$message = '<label class="text-danger">Error: Comment not posted.</label>';
	$status = array(
		'error'  => 1,
		'message' => $message
	);		
}
echo json_encode($status);
?>