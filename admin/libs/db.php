<?php
	$host='localhost';
	$user='root';
	$pass='123456';
	$db='webfilm';
	//error_reporting(0);//Chan thong bao loi

	$link=mysqli_connect($host,$user,$pass,$db) or die('Lỗi kết nối');
	//Dong bo charset (collation)
	mysqli_query($link,'set names utf8');
?>
