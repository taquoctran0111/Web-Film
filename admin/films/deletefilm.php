<?php
require_once '../../autoload/Autoload.php';

//================== check login

if (!Auth::user()) {
    Redirect::url('admin/account/login.php');
}


$id   = Input::get('id');

$data = $DB->find('tbl_films', $id);

if (!is_object($data)) {
    die('Không tồn tại phim');
}

$deleted = $DB->delete('tbl_films', $id);

if ($deleted === true) {
    Redirect::url('admin/films/films.php');
}

die('Vui lòng thử lại');
