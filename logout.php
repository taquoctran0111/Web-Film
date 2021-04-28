<?php
include('./autoload/Autoload.php');
include './config/config_login_fb.php';
Session::forget('customer');
Session::forget('access_token');
Redirect::url('');