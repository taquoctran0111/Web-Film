<?php
include_once("../config/config2.php");
if(isset($_POST['filmid'])){
	$filmid = $_POST['filmid'];
}
$commentQuery = "SELECT * FROM tbl_comments WHERE parent_comment_id = '0' AND film_id = '$filmid' ORDER BY comment_id DESC";
$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$commentHTML = '';
while($comment = mysqli_fetch_assoc($commentsResult)){
	$commentHTML .= '
	<div class="comment">
	<div class="img-user" style="width: 9%;">
		<img src="assets/images/user.png" alt="" style="width: 100%;">
	</div>
	<div class="user-comment">
		<div class="infor-user">
			<p style="color: #03a9f4">'.$comment["comment_sender_name"].'</p>
			<p style="margin-left: 8px; font-size: 12px">'.$comment["date"].'</p>
		</div>
		<p>'.$comment["comment"].'</p>
	</div>
	</div>';
	$commentHTML .= getCommentReply($conn, $comment["comment_id"]);
}
echo $commentHTML;

function getCommentReply($conn, $parentId = 0, $marginLeft = 0) {
	$commentHTML = '';
	$commentQuery = "SELECT * FROM tbl_comments WHERE parent_comment_id = '".$parentId."'";	
	$commentsResult = mysqli_query($conn, $commentQuery);
	$commentsCount = mysqli_num_rows($commentsResult);
	if($parentId == 0) {
		$marginLeft = 0;
	} else {
		$marginLeft = $marginLeft + 48;
	}
	if($commentsCount > 0) {
		while($comment = mysqli_fetch_assoc($commentsResult)){  
			$commentHTML .= '
				<div class="panel panel-primary" style="margin-left:'.$marginLeft.'px">
				<div class="panel-heading">By <b>'.$comment["comment_sender_name"].'</b> on <i>'.$comment["date"].'</i></div>
				<div class="panel-body">'.$comment["comment"].'</div>
				<div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$comment["comment_id"].'">Reply</button></div>
				</div>
				';
			$commentHTML .= getCommentReply($conn, $comment["comment_id"], $marginLeft);
		}
	}
	return $commentHTML;
}
