<?php
include_once("../config/config2.php");
if(isset($_POST['filmid'])){
	$filmid = $_POST['filmid'];
}

// if($_POST['userid'] != '99'){
// 	$userid = $_POST['userid'];
// 	$query_avatar = "SELECT * FROM tbl_users WHERE id = $userid";
// 	$run_avatar = mysqli_query($conn, $query_avatar);
// 	$result_avatar = mysqli_fetch_array($run_avatar);
// 	$avatar = $result_avatar['avatar'];
// }
// else{
// 	$userid = '99';
// 	$avatar = "assets/images/user.png";
// }


$commentQuery = "SELECT * FROM tbl_comments WHERE parent_comment_id = '0' AND film_id = '$filmid' ORDER BY comment_id DESC";
$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$commentHTML = '';

while($comment = mysqli_fetch_assoc($commentsResult)){
	$commentHTML .= '
	<div class="comment">
		<div class="img-user" style="width: 6%; height: 6%; display: flex; justify-content: center; align-item: center;">
			<img src="'.$comment["user_avatar"].'" style="width: 100%; border-radius: 50%;">
		</div>
		<div class="user-comment">
			<div class="infor-user">
				<p style="color: #03a9f4">'.$comment["comment_sender_name"].'</p>
				<p style="margin-left: 8px; font-size: 12px">'.$comment["date"].'</p>
			</div>
			<p>'.$comment["comment"].'</p>
			<button type="button" class="reply" id="'.$comment["comment_id"].'">Trả lời</button>
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
			<div class="comment" style = "margin-left: '.$marginLeft.'px">
				<div class="img-user" style="width: 6%; height: 6%; ">
					<img src="'.$comment["user_avatar"].'" alt="" style="width: 100%;border-radius: 50%">
				</div>
				<div class="user-comment">
					<div class="infor-user">
						<p style="color: #03a9f4">'.$comment["comment_sender_name"].'</p>
						<p style="margin-left: 8px; font-size: 12px">'.$comment["date"].'</p>
					</div>
					<p>'.$comment["comment"].'</p>
					<button type="button" class="reply" id="'.$comment["comment_id"].'">Trả lời</button>
				</div>
			</div>';
			$commentHTML .= getCommentReply($conn, $comment["comment_id"], $marginLeft);
		}
	}
	return $commentHTML;
}
