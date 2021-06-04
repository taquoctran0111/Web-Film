<?php
require_once ("config/config2.php");
// $commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$filmId = isset($_POST['filmid']) ? $_POST['filmid'] : "";
$contentComment = isset($_POST['contentComment']) ? $_POST['contentComment'] : "";
$username = isset($_POST['username']) ? $_POST['username'] : "";
$date = date("d-m-Y H:i");

$sql = "INSERT INTO tbl_comments(film_id,user_name,content,time_comment) VALUES ('" . $filmId . "','" . $username . "','" . $contentComment . "','" . $date . "')";

$result = mysqli_query($conn, $sql);

if (! $result) {
    $result = mysqli_error($conn);
}
echo $result;
?>
