<?php
include_once("../config/config2.php");
if(!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["filmid"])){
	$insertComments = "INSERT INTO tbl_comments (film_id, parent_comment_id, comment, comment_sender_name, date) VALUES ('".$_POST["filmid"]."','".$_POST["commentId"]."', '".$_POST["comment"]."', '".$_POST["name"]."', NOW())";
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