<?php
require './vendor/autoload.php';
// $fb = new \Facebook\Facebook([
//     'app_id' => '302836271512681',
//     'app_secret' => '57f2d90659d24192ffc3fa2bbd994e62',
//     'default_graph_version' => 'v2.5'
// ]);
$fb = new \Facebook\Facebook([
    'app_id' => '1005054260304456',
    'app_secret' => 'd2b08dbd031ff074cc7b5cba32439924',
    'default_graph_version' => 'v2.5'
]);
$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost:8080/WebFilmFast/");
try {
    $accessToken = $helper->getAccessToken();
    if(isset($accessToken)){
        $_SESSION['access_token'] = (string)$accessToken;
        header('location: index.php');
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}
if(isset($_SESSION['access_token'])){
    try {
        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('/me?fields=id,name');
        $user = $res->getGraphUser();

        $respic = $fb->get('me/picture?redirect=false');
        $userpic = $respic->getGraphUser();
        // echo "Hello, " , $user->getField('name');
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
?>