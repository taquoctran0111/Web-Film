<?php
require_once('../../autoload/Autoload.php');
Session::forget('user');
Redirect::url('admin/index.php');