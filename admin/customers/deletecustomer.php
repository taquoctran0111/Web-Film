<?php
require_once '../../autoload/Autoload.php';

//================== check login

if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}


$id   = Input::get('id');

$data = $DB->find('tbl_users', $id);

if (!is_object($data)) {
    die('Không tồn tại người dùng');
}

$deleted = $DB->delete('tbl_users', $id);

if ($deleted === true) {
    Redirect::url('admin/customers/customers.php');
}

die('Vui lòng thử lại');
