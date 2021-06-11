<?php
$server = "localhost";
$username = "root";
$password = "123456";
$dbname = "db_movies";

$conn = mysqli_connect($server, $username, $password, $dbname);


if (isset($_SESSION['customer'])) {
    $user = $_SESSION['customer'];
    $user_id = $user[0]->id;
}
echo $user_id;
if (isset($_POST['action'])) {
    $film_id = $_POST['film_id'];
    $action = $_POST['action'];
    switch ($action) {
        case 'like':
            $sql = "INSERT INTO tbl_rating (user_id, film_id, rating_action) 
         	   VALUES ($user_id, $film_id, 'like') 
         	   ON DUPLICATE KEY UPDATE rating_action='like'";
            break;
        case 'unlike':
            $sql = "DELETE FROM tbl_rating WHERE user_id=$user_id AND film_id=$film_id";
            break;
        default:
            break;
    }
    // echo $sql;
    mysqli_query($conn, $sql);
    echo getRating($film_id);
    exit(0);
}

function getLikes($id)
{
    global $conn;
    $sql = "SELECT COUNT(*) FROM tbl_rating 
  		  WHERE film_id = $id AND rating_action='like'";
    $rs = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($rs);
    return $result[0];
}
function getRating($id)
{
    global $conn;
    $rating = array();
    $likes_query = "SELECT COUNT(*) FROM tbl_rating WHERE film_id = $id AND rating_action='like'";
    $likes_rs = mysqli_query($conn, $likes_query);
    $likes = mysqli_fetch_array($likes_rs);
    $rating = [
        'likes' => $likes[0],
    ];
    return json_encode($rating);
}

function userLiked($film_id)
{
    global $conn;
    global $user_id;
    $sql = "SELECT * FROM tbl_rating WHERE user_id=$user_id 
  		  AND film_id=$film_id AND rating_action='like'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

