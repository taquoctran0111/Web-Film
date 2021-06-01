<?php
    if(isset($_POST['uploadHorizontal'])){
        $filename = $_FILES['imagehorizontal']['name'];
        $filetmpname = $_FILES['imagehorizontal']['tmp_name'];
        $folder = $_SERVER['DOCUMENT_ROOT'] . '/WebFilmFast/assets/images/image-horizontal/';
        move_uploaded_file($filetmpname, $folder.$filename);
    }
?>